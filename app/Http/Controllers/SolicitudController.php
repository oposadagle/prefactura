<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exports\DiariosExport;
use App\Exports\DiariasExport;
use App\Exports\AnticiposExport;
use App\Exports\EstatusExport;
use App\Exports\PrefacturasExport;
use App\Exports\HistoricosExport;
use App\Exports\MastotalesExport;
use App\Exports\PaqtotalesExport;
use App\Exports\TransitosExport;
use App\Exports\ServiciosExport;
use App\Exports\LogsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;


class SolicitudController extends Controller
{
    public function index()
    {
        $userName = Auth::user()->name;
        $actual = Carbon::now('America/Bogota');
        $vehiculos = DB::table('vehiculares')->where('estado', 'ACTIVO')->get();
        $placas = $vehiculos->sortBy('placa')->map(function ($vehiculo) {
            return ['value' => $vehiculo->placa, 'text' => $vehiculo->placa];
        })->prepend(['value' => '', 'text' => '']);
        $licencias = DB::table('matriculas')->get();
        $pagos = DB::table('medios')->orderBy('medio')->get();
        $medios = $pagos->map(function ($pago) {
            return ['value' => $pago->medio, 'text' => $pago->medio];
        });
        $municipios = DB::table('municipios')->selectRaw('UPPER(municipio) as municipio')->orderBy('municipio')->get();
        $places = $municipios->map(function ($municipio) {
            return ['value' => $municipio->municipio, 'text' => $municipio->municipio];
        });
        $ciudades = $municipios->map(function ($municipio) {
            return ['value' => $municipio->municipio, 'text' => $municipio->municipio];
        });
        $excluidos = ['Servicio finalizado', 'Servicio cancelado'];

        $clientes = DB::table('peticiones')->select('cliente')->distinct()->whereNotIn('states', $excluidos)->orderBy('cliente')->get();
        $estados = DB::table('peticiones')->select('states')->distinct()->whereNotIn('states', $excluidos)->get();
        $radicados = DB::table('peticiones')->select(DB::raw("COALESCE(radicado, 'Sin asignar') as radicado"))->distinct()->whereNotIn('states', $excluidos)->get();
        $pagos = DB::table('peticiones')->select('paytype')->where('paytype', '<>', '""')->distinct()->whereNotIn('states', $excluidos)->get();
        $cargues = DB::table('peticiones')->select('fecha_cargue')->distinct()->whereNotIn('states', $excluidos)->orderBy('fecha_cargue', 'desc')->get();
        $descargues = DB::table('peticiones')->select('fecha_descargue')->distinct()->whereNotIn('states', $excluidos)->orderBy('fecha_descargue', 'desc')->get();
        $matriculas = DB::table('peticiones')->select('placa')->distinct()->whereNotIn('states', $excluidos)->orderBy('placa')->get();
        $manifiestos = DB::table('peticiones')->select(DB::raw("COALESCE(razon, 'Sin asignar') as razon"))->distinct()->whereNotIn('states', $excluidos)->get();
        $sucursales = DB::table('peticiones')->select('sucursal')->distinct()->whereNotIn('states', $excluidos)->get();
        $trayectos = DB::table('peticiones')->select('tipo_trayecto')->distinct()->whereNotIn('states', $excluidos)->get();
        $tipos = DB::table('tipo_vehiculos')->select('tipo')->get();
        $types = $tipos->map(function ($tipo) {
            return ['value' => $tipo->tipo, 'text' => $tipo->tipo];
        });

        $diario = DB::table('solicitudes')->where('id', $id)->first();
            if (!$diario) {
                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
            }

            $diario = DB::table('solicitudes')->where('id', $id)->first();
            if (!$diario) {
                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
            }

            // Validar que los campos de anticipo estén completos
            if (empty($diario->pagant) || empty($diario->cpagant) || empty($diario->tpagant)) {
                return response()->json(['success' => false, 'message' => 'datos incompletos del receptor del anticipo'], 400);
            }


            // Actualizar el campo confirmado
            $nuevoValor = $request->input('confirmado', 'SI');
            DB::table('solicitudes')
                ->where('id', $id)
                ->update(['confirmado' => $nuevoValor]);

            // Registrar el cambio en solicitudes_logs
            DB::table('solicitudes_logs')->insert([
                'solicitud_id' => $id,
                'user_id' => auth()->id(), // Usuario autenticado
                'campo' => 'confirmado', // Campo modificado
                'razon' => $diario->razon, // Razón asociada al registro original
                'ip_address' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Registrar cualquier error en los logs
            Log::error('Error actualizando el registro: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update17(Request $request, $id)
    {
        $request->validate([
            'placa' => 'required',
            'lpo' => 'required'
        ], [
            'placa.required' => 'El campo placa es obligatorio.',
            'lpo.required' => 'La calificación del listado pre-operacional es obligatoria.'
        ]);

        $dataFinal17 = request()->only(['plauser', 'placa', 'lpo', 'nota_lpo']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal17);
        return back()->with('success', 'ok');
    }

    public function toggleTrafico($id)
    {
        $solicitud = DB::table('solicitudes')->where('id', $id)->first();
        if ($solicitud) {
            $nuevoValor = $solicitud->trafico == 1 ? 0 : 1;
            DB::table('solicitudes')->where('id', $id)->update(['trafico' => $nuevoValor]);
            return redirect()->back()->with('success', 'El valor del campo trafico ha sido actualizado.');
        }
        return redirect()->back()->with('error', 'Solicitud no encontrada.');
    }

    public function generarPrefacturas(Request $request)
    {
        $mmsIds = explode(',', $request->input('guia'));
        $datos = DB::table('infoestatus')->whereIn('guia', $mmsIds)
            ->select('cliente', 'guia', 'fecha_cargue', 'destinatario', 'direccion', 'remesa', 'origen', 'destino', 'valor_cobrar')->get();
        $cliente = $datos->first() ? $datos->first()->cliente : null;
        $total = $datos->sum('valor_cobrar');
        $fecha = Carbon::now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY');
        $primero = Carbon::now()->startOfMonth()->format('j/n/Y');
        $ultimo = Carbon::now()->endOfMonth()->format('d/m/Y');
        return view('Generar.prefacturas', compact('datos', 'cliente', 'fecha', 'primero', 'ultimo', 'total'));
    }

    public function generarFacturas(Request $request)
    {
        $mmsIds = explode(',', $request->input('guia'));
        $datos = DB::table('infoestatus')->whereIn('guia', $mmsIds)
            ->select('cliente', 'guia', 'fecha_cargue', 'destinatario', 'direccion', 'remesa', 'origen', 'destino', 'valor_cobrar', 'documento_cliente', 'peso', 'factura_siigo')->get();
        $cliente = $datos->first() ? $datos->first()->cliente : null;
        $total = $datos->sum('valor_cobrar');
        $fecha = Carbon::now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY');
        $primero = Carbon::now()->startOfMonth()->format('j/n/Y');
        $ultimo = Carbon::now()->endOfMonth()->format('d/m/Y');
        return view('Generar.facturas', compact('datos', 'cliente', 'fecha', 'primero', 'ultimo', 'total'));
    }

    public function logs(Request $request)
    {
        $year  = (int) $request->input('year', Carbon::now()->year);
        $month = (int) $request->input('month', Carbon::now()->month);

        $diarias = DB::table('logs')
            ->whereRaw("EXTRACT(YEAR FROM fecha_evento::timestamp) = ?", [$year])
            ->whereRaw("EXTRACT(MONTH FROM fecha_evento::timestamp) = ?", [$month])
            ->orderBy('fecha_evento', 'desc')
            ->get();

        $years = DB::table('logs')
            ->selectRaw("DISTINCT EXTRACT(YEAR FROM fecha_evento::timestamp) AS year")
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn($y) => (int) $y);

        $months = DB::table('logs')
            ->selectRaw("DISTINCT EXTRACT(MONTH FROM fecha_evento::timestamp) AS month")
            ->whereRaw("EXTRACT(YEAR FROM fecha_evento::timestamp) = ?", [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn($m) => (int) $m);

        return view('Solicitud.logs', compact('diarias', 'years', 'months', 'year', 'month'));
    }

    public function aprobar(Request $request, $id)
    {
        if ($request->ajax()) {
            $solicitud = DB::table('solicitudes')->where('id', $id)->first();
            if ($solicitud) {
                if (!$solicitud->avalado) {
                    DB::table('solicitudes')
                        ->where('id', $id)
                        ->update([
                            'avalado' => true,
                            'usercc' => Auth::user()->name,
                            'datecc' => Carbon::now()
                        ]);
                    return response()->json(['success' => true]);
                }
                return response()->json(['success' => false, 'message' => 'Ya fue aprobado']);
            }
            return response()->json(['success' => false, 'message' => 'Solicitud no encontrada']);
        }
        return response()->json(['success' => false, 'message' => 'Petición inválida']);
    }

    public function verificar(Request $request, $id)
    {
        if ($request->ajax()) {
            $solicitud = DB::table('solicitudes')->where('id', $id)->first();
            if ($solicitud) {
                if (!$solicitud->verificado) {
                    DB::table('solicitudes')
                        ->where('id', $id)
                        ->update([
                            'verificado' => true,
                            'fecha_envio' => \Carbon\Carbon::now()
                        ]);
                    return response()->json(['success' => true]);
                }
                return response()->json(['success' => false, 'message' => 'Ya fue verificado']);
            }
            return response()->json(['success' => false, 'message' => 'Solicitud no encontrada']);
        }
        return response()->json(['success' => false, 'message' => 'Petición inválida']);
    }
}
