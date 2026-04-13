<?php

namespace App\Http\Controllers;

use App\Exports\AnticiposExport;
use App\Exports\DiariasExport;
use App\Exports\DiariosExport;
use App\Exports\EstatusExport;
use App\Exports\HistoricosExport;
use App\Exports\LogsExport;
use App\Exports\MastotalesExport;
use App\Exports\PaqtotalesExport;
use App\Exports\PrefacturasExport;
use App\Exports\ServiciosExport;
use App\Exports\TransitosExport;
use App\Models\Solicitud;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

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

        // Filtros
        $request = session('data');
        $query = DB::table('peticiones')->whereNotIn('states', $excluidos);

        // Filtrar por ID si se recibe en la solicitud
        $id = request('id');
        if ($id) {
            $query->where(function ($q) use ($id) {
                $q->where('cliente', 'LIKE', "%$id%")
                    ->orWhere('placa', 'LIKE', "%$id%")
                    ->orWhere('razon', 'LIKE', "%$id%")
                    ->orWhere('origen', 'LIKE', "%$id%")
                    ->orWhere('destino', 'LIKE', "%$id%")
                    ->orWhere('conductor', 'LIKE', "%$id%")
                    ->orWhere('remesa', 'LIKE', "%$id%")
                    ->orWhere('radicado', 'LIKE', "%$id%")
                    ->orWhere('states', 'LIKE', "%$id%")
                    ->orWhere('sucursal', 'LIKE', "%$id%");

                if (is_numeric($id)) {
                    $q->orWhere('id', $id);
                }
            });
        }

        if ($request != null) {
            $filtros = ['cliente', 'states', 'radicado', 'paytype', 'fecha_cargue', 'fecha_descargue', 'placa', 'razon', 'sucursal', 'tipo_trayecto'];

            foreach ($filtros as $filtro) {
                if (isset($request[$filtro])) {
                    $valor = $request[$filtro];

                    if ($filtro == 'razon' && $valor == 'Sin asignar') {
                        $query->whereNull('razon');
                    } elseif ($filtro == 'radicado' && $valor == 'Sin asignar') {
                        $query->whereNull('radicado');
                    } else {
                        $query->where($filtro, $valor);
                    }
                }
            }
        }

        $diarias = $query->orderBy('fecha_cargue', 'desc')->paginate(100);

        return view('Solicitud.index', compact('vehiculos', 'placas', 'medios', 'diarias', 'userName', 'actual', 'clientes', 'estados', 'radicados', 'pagos', 'cargues', 'descargues', 'matriculas', 'manifiestos', 'sucursales', 'tipos', 'types', 'municipios', 'places', 'ciudades', 'trayectos', 'licencias'));
    }

    public function trafico()
    {
        $vehiculos = DB::table('vehiculos')->get();
        $placas = $vehiculos->map(function ($vehiculo) {
            return ['value' => $vehiculo->placa, 'text' => $vehiculo->placa];
        });
        $pagos = DB::table('medios')->orderBy('medio')->get();
        $medios = $pagos->map(function ($pago) {
            return ['value' => $pago->medio, 'text' => $pago->medio];
        });
        $diarias = DB::table('peticiones')->where('trafico', 1)->get();
        $userName = Auth::user()->name;
        $actual = Carbon::now('America/Bogota');

        return view('Solicitud.trafico', compact('vehiculos', 'placas', 'medios', 'diarias', 'userName', 'actual'));
    }

    public function sac(Request $request)
    {
        // ├Ültimo a├▒o/mes disponibles en infoestatus (PostgreSQL)
        $ultimoRegistro = DB::table('infoestatus')
            ->selectRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year, EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month')
            ->orderBy('fecha_cargue', 'desc')
            ->first();

        $defaultYear = isset($ultimoRegistro->year) ? (int) $ultimoRegistro->year : Carbon::now()->year;
        $defaultMonth = isset($ultimoRegistro->month) ? (int) $ultimoRegistro->month : Carbon::now()->month;

        $year = (int) $request->input('year', $defaultYear);
        $month = (int) $request->input('month', $defaultMonth);

        $diarias = DB::table('peticiones')
            ->whereRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?', [$year])
            ->whereRaw('EXTRACT(MONTH FROM fecha_cargue::timestamp) = ?', [$month])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

        $years = DB::table('peticiones')
            ->selectRaw('DISTINCT EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year')
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn ($y) => (int) $y);

        $months = DB::table('peticiones')
            ->selectRaw('DISTINCT EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month')
            ->whereRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?', [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn ($m) => (int) $m);

        // Obtener a├▒os y meses disponibles para el selector de descarga
        $availableDatesRaw = DB::table('peticiones')
            ->selectRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) as year, EXTRACT(MONTH FROM fecha_cargue::timestamp) as month')
            ->whereNotNull('fecha_cargue')
            ->distinct()
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        $availableDates = [];
        foreach ($availableDatesRaw as $date) {
            $availableDates[(int) $date->year][] = (int) $date->month;
        }

        return view('Solicitud.sac', compact('diarias', 'years', 'months', 'year', 'month', 'availableDates'));
    }

    public function anticipo()
    {
        $userName = Auth::user()->name;
        $festivos = DB::table('festivos')->pluck('festivo')->toArray();
        $incluidos = (['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.', 'ANTICIPO NOCHE']);
        $excluidos = (['Servicio cancelado']);

        $startOfLastMonth = Carbon::now()->subMonth(2)->startOfMonth()->toDateString(); // Inicio del mes anterior
        //$startOfLastMonth = Carbon::now()->subYear(1)->startOfMonth()->toDateString();
        $endOfCurrentMonth = Carbon::now()->endOfMonth()->toDateString(); // Fin del mes actual
        $diarias = DB::table('peticiones')
            ->whereNotNull('razon')
            ->where('costo', '>', 0)
            ->whereIn('paytype', $incluidos)
            ->whereNotIn('states', $excluidos)
            ->whereBetween('fecha_cargue', [$startOfLastMonth, $endOfCurrentMonth])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

        // Calcula la fecha tentativa para cada entrada
        foreach ($diarias as $diario) {
            $diario->fecha_tentativa = $this->calcularFechaTentativa($diario->fecha_envio, 9, $festivos);
        }

        return view('Solicitud.anticipo', compact('diarias', 'festivos', 'userName'));
    }

    public function anticipos()
    {
        $userName = Auth::user()->name;
        $festivos = DB::table('festivos')->pluck('festivo')->toArray();
        $incluidos = (['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.', 'ANTICIPO NOCHE']);
        $excluidos = (['Servicio finalizado', 'Servicio cancelado']);

        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString(); // Inicio del mes anterior
        $endOfCurrentMonth = Carbon::now()->endOfMonth()->toDateString(); // Fin del mes actual
        $diarias = DB::table('peticiones')
            ->where('enviado', 'SI')
            ->where('confirmado', 'NO')
            ->whereNotNull('razon')
            ->whereIn('paytype', $incluidos)
            ->whereNotIn('states', $excluidos)
            ->whereBetween('fecha_cargue', [$startOfLastMonth, $endOfCurrentMonth])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

        // Calcula la fecha tentativa para cada entrada
        foreach ($diarias as $diario) {
            $diario->fecha_tentativa = $this->calcularFechaTentativa($diario->fecha_envio, 9, $festivos);
        }

        return view('Solicitud.anticipos', compact('diarias', 'festivos', 'userName'));
    }

    public function confirmarAnticipos(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids) || ! is_array($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'No se recibieron identificadores v├ílidos.',
            ]);
        }

        try {
            DB::table('solicitudes')->whereIn('id', $ids)->update([
                'confirmado' => 'SI',
            ]);

            // Dispatch WhatsApp messages via Whapi
            $peticiones = DB::table('peticiones')->whereIn('id', $ids)->get();
            $whapiToken = env('WHAPI_TOKEN');
            $whapiUrl = rtrim(env('WHAPI_API_URL', 'https://gate.whapi.cloud/messages/text'), '/');
            if (! str_ends_with($whapiUrl, '/messages/text')) {
                $whapiUrl .= '/messages/text';
            }

            if ($whapiToken && $whapiUrl) {
                foreach ($peticiones as $p) {
                    if (empty($p->tpagant)) {
                        continue;
                    }

                    // Limpiar el numero de telefono, asumiendo 57 (Colombia) si tiene 10 digitos sin indicativo
                    $telefono = trim($p->tpagant);
                    if (substr($telefono, 0, 1) !== '+' && strlen($telefono) == 10) {
                        $telefono = '57'.$telefono;
                    }
                    // Quitar los '+' para que sea de solo digitos como exige la API
                    $telefono = str_replace('+', '', $telefono);
                    // Formatear valores monetarios de manera consistente
                    $val_reteica = number_format(floatval($p->reteica), 0, ',', '.');
                    $val_retefuente = number_format(floatval($p->retefuente), 0, ',', '.');
                    $val_seguro = number_format(floatval($p->seguro), 0, ',', '.');
                    $val_pagar = number_format(floatval($p->valor_a_pagar), 0, ',', '.');

                    if ($p->pago_completo === 'SI') {
                        $mensaje = "Estimado proveedor, GLE Colombia SAS informa que se le realizo un pago por concepto del anticipo correspondiente al manifiesto: {$p->razon}\n\n".
                                   "RESUMEN\n".
                                   "reteica: {$val_reteica}\n".
                                   "retefuente: {$val_retefuente}\n".
                                   "seguro: {$val_seguro}\n".
                                   "valor pagado: {$val_pagar}\n\n".
                                   '...no responder este mensaje...';
                    } else {
                        $mensaje = "Estimado proveedor, GLE Colombia SAS informa que se le realizo un pago por concepto del anticipo correspondiente al manifiesto: {$p->razon}\n\n".
                                   "RESUMEN\n".
                                   "valor pagado: {$val_pagar}\n\n".
                                   '...no responder este mensaje...';
                    }

                    // Enviar mensaje hacia WhatsApp
                    Http::withToken($whapiToken)
                        ->post($whapiUrl, [
                            'typing_time' => 0,
                            'to' => $telefono,
                            'body' => $mensaje,
                        ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Registros confirmados correctamente.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error en confirmacion masiva de anticipos: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al actualizar los registros.',
            ], 500);
        }
    }

    public function saldos()
    {
        $userName = Auth::user()->name;
        $festivos = DB::table('festivos')->pluck('festivo')->toArray();
        $incluidos = (['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.']);
        $excluidos = (['Servicio finalizado', 'Servicio cancelado']);

        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $endOfCurrentMonth = Carbon::now()->endOfMonth()->toDateString();
        $diarias = DB::table('peticiones')
            ->where('fecha_envio', '!=', null)
            ->where('confirmado', 'SI')
            ->where('pagado', false)
            ->where('valor_saldo', '>', 0)
            ->whereNotNull('razon')
            ->whereIn('paytype', $incluidos)
            ->whereNotIn('states', $excluidos)
            ->whereBetween('fecha_cargue', [$startOfLastMonth, $endOfCurrentMonth])
            ->orderBy('fecha_envio', 'asc')
            ->get();

        foreach ($diarias as $diario) {
            $diario->fecha_tentativa = $this->calcularFechaTentativa($diario->fecha_envio, 15, $festivos);
            // Calculate numeric parts ensuring we don't hit null issues -> force float
            $diario->saldo_total = floatval($diario->valor_saldo) - floatval($diario->deducciones);
        }

        return view('Solicitud.saldos', compact('diarias', 'festivos', 'userName'));
    }

    public function cuentas()
    {
        $userName = Auth::user()->name;

        $diarias = DB::table('cuentas')

            ->whereNotNull('soporte')
            ->where('verificado', true)
            ->where('pagada', false)
            ->orderBy('id', 'desc')
            ->get();

        foreach ($diarias as $diario) {
            if (! $diario->verificado) {
                $diario->estado_cuenta = 'PENDIENTE POR APROBAR';
            } elseif ($diario->verificado && ! $diario->avalado) {
                $diario->estado_cuenta = 'PENDIENTE POR VALIDAR';
            } elseif ($diario->verificado && $diario->avalado && ! $diario->pagado) {
                $diario->estado_cuenta = 'PENDIENTE POR PAGAR';
            } elseif ($diario->verificado && $diario->avalado && $diario->pagado) {
                $diario->estado_cuenta = 'CUENTA PAGADA';
            } else {
                $diario->estado_cuenta = 'DESCONOCIDO';
            }
        }

        return view('Solicitud.cuentas', compact('diarias', 'userName'));
    }

    public function historicoCuentas()
    {
        $userName = Auth::user()->name;

        $diarias = DB::table('cuentas')

            ->whereNotNull('soporte')
            ->where('verificado', true)
            ->where('pagada', true)
            ->orderBy('id', 'desc')
            ->get();

        foreach ($diarias as $diario) {
            $diario->estado_cuenta = 'CUENTA PAGADA';
        }

        return view('Solicitud.historico_cuentas', compact('diarias', 'userName'));
    }

    private function calcularFechaTentativa($fechaInicial, $diasHabiles, $festivos)
    {
        if (is_null($fechaInicial)) {
            return null; // O cualquier otro valor predeterminado
        }
        $fecha = Carbon::parse($fechaInicial);
        $contador = 0;

        while ($contador < $diasHabiles) {
            $fecha->addDay();
            if (! in_array($fecha->toDateString(), $festivos)) {
                $contador++;
            }
        }

        return $fecha->toDateString();
    }

    public function pagarSaldos(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids) || ! is_array($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'No se recibieron identificadores v├ílidos.',
            ]);
        }

        try {
            DB::table('solicitudes')->whereIn('id', $ids)->update([
                'pagado' => true,
                'fechapago' => Carbon::now('America/Bogota'),
                'userpago' => auth()->user()->name,
            ]);

            // Dispatch WhatsApp messages via Whapi
            $peticiones = DB::table('peticiones')->whereIn('id', $ids)->get();
            $whapiToken = env('WHAPI_TOKEN');
            $whapiUrl = rtrim(env('WHAPI_API_URL', 'https://gate.whapi.cloud/messages/text'), '/');
            if (! str_ends_with($whapiUrl, '/messages/text')) {
                $whapiUrl .= '/messages/text';
            }

            if ($whapiToken && $whapiUrl) {
                foreach ($peticiones as $p) {
                    if (empty($p->tpagsal)) {
                        continue;
                    }

                    // Limpiar el numero de telefono, asumiendo 57 (Colombia) si tiene 10 digitos sin indicativo
                    $telefono = trim($p->tpagsal);
                    if (substr($telefono, 0, 1) !== '+' && strlen($telefono) == 10) {
                        $telefono = '57'.$telefono;
                    }
                    $telefono = str_replace('+', '', $telefono);

                    // Calculo de saldo_total basado en la vista saldos()
                    $saldo_total = floatval($p->valor_saldo) - floatval($p->deducciones);

                    // Formatear valores monetarios de manera consistente
                    $val_costo = number_format(floatval($p->costo), 0, ',', '.');
                    $val_anticipo = number_format(floatval($p->valor_a_pagar), 0, ',', '.');
                    $val_extra = number_format(floatval($p->costo_tiposerv), 0, ',', '.');
                    $val_retefuente = number_format(floatval($p->retefuente), 0, ',', '.');
                    $val_reteica = number_format(floatval($p->reteica), 0, ',', '.');
                    $val_seguro = number_format(floatval($p->seguro), 0, ',', '.');
                    $val_deducciones = number_format(floatval($p->deducciones), 0, ',', '.');
                    $val_saldototal = number_format($saldo_total, 0, ',', '.');

                    $mensaje = "Estimado proveedor, GLE Colombia SAS informa que se le realizo un pago por concepto del saldo correspondiente al manifiesto: {$p->razon}\n\n".
                               "RESUMEN:\n".
                               "COSTO: {$val_costo}\n".
                               "ANTICIPO: {$val_anticipo}\n".
                               "EXTRA: {$val_extra}\n".
                               "RETEFUENTE: {$val_retefuente}\n".
                               "RETEICA: {$val_reteica}\n".
                               "SEGURO: {$val_seguro}\n".
                               "OTRAS DEDUCCIONES: {$val_deducciones}\n".
                               "VALOR_SALDO: {$val_saldototal}\n\n".
                               '...no responder este mensaje...';

                    // Enviar mensaje hacia WhatsApp
                    Http::withToken($whapiToken)
                        ->post($whapiUrl, [
                            'typing_time' => 0,
                            'to' => $telefono,
                            'body' => $mensaje,
                        ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Registros actualizados correctamente.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error en pago masivo de saldos: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al actualizar los registros.',
            ], 500);
        }
    }

    public function pagarCuentas(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids) || ! is_array($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'No se recibieron identificadores v├ílidos.',
            ]);
        }

        try {
            DB::table('solicitudes')->whereIn('id', $ids)->update([
                'pagada' => true,
                'fechapaga' => \Carbon\Carbon::now('America/Bogota'),
                'userpaga' => auth()->user()->name,
            ]);

            // Dispatch WhatsApp messages via Whapi
            $peticiones = DB::table('peticiones')->whereIn('id', $ids)->get();
            $whapiToken = env('WHAPI_TOKEN');
            $whapiUrl = rtrim(env('WHAPI_API_URL', 'https://gate.whapi.cloud/messages/text'), '/');
            if (! str_ends_with($whapiUrl, '/messages/text')) {
                $whapiUrl .= '/messages/text';
            }

            if ($whapiToken && $whapiUrl) {
                foreach ($peticiones as $p) {
                    if (empty($p->tpagcon)) {
                        continue;
                    }

                    // Limpiar el numero de telefono
                    $telefono = trim($p->tpagcon);
                    if (substr($telefono, 0, 1) !== '+' && strlen($telefono) == 10) {
                        $telefono = '57'.$telefono;
                    }
                    $telefono = str_replace('+', '', $telefono);

                    // Formatear valores
                    $val_cargaone = number_format(floatval($p->cargaone ?? 0), 0, ',', '.');
                    $val_cargatwo = number_format(floatval($p->cargatwo ?? 0), 0, ',', '.');
                    $val_standby = number_format(floatval($p->standby ?? 0), 0, ',', '.');
                    $val_desplazamiento = number_format(floatval($p->costo_desplazamiento ?? 0), 0, ',', '.');

                    $base = floatval($p->cargaone ?? 0) + floatval($p->cargatwo ?? 0) + floatval($p->standby ?? 0) + floatval($p->costo_desplazamiento ?? 0);
                    $reteica = ($p->ica == 'SI') ? ($base * 0.00414) : 0;
                    $retefuente = $base * 0.01;
                    $total = $base - ($reteica + $retefuente);

                    $val_reteica = number_format($reteica, 0, ',', '.');
                    $val_retefuente = number_format($retefuente, 0, ',', '.');
                    $val_total = number_format($total, 0, ',', '.');

                    $mensaje = "Estimado proveedor, GLE Colombia SAS informa que se le realizó un pago por concepto de la cuenta de cobro relacionado al manifiesto: {$p->razon}\n\n".
                               "RESUMEN\n".
                               "CARGUE 1: {$val_cargaone}\n".
                               "CARGUE 2: {$val_cargatwo}\n".
                               "STANDBY: {$val_standby}\n".
                               "COSTO DESPLAZAMIENTO: {$val_desplazamiento}\n".
                               "RETEICA: {$val_reteica}\n".
                               "RETEFUENTE: {$val_retefuente}\n".
                               "VALOR TOTAL: {$val_total}\n\n".
                               '...no responder este mensaje...';

                    // Enviar mensaje hacia WhatsApp
                    \Illuminate\Support\Facades\Http::withToken($whapiToken)
                        ->post($whapiUrl, [
                            'typing_time' => 0,
                            'to' => $telefono,
                            'body' => $mensaje,
                        ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Cuentas pagadas correctamente.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error en pago masivo de cuentas: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al actualizar las cuentas.',
            ], 500);
        }
    }

    public function archivoPlano(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids) || ! is_array($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Debe seleccionar al menos un registro.',
            ]);
        }

        $LINE_WIDTH = 264;

        $registros = DB::table('peticiones')
            ->leftJoin('datos_bancarios', function ($join) {
                $join->on('peticiones.cpagsal', '=', 'datos_bancarios.nit')
                    ->where('datos_bancarios.estado', '=', 'ACTIVO');
            })
            ->select(
                'peticiones.id',
                'peticiones.cpagsal',
                'peticiones.pagsal',
                'peticiones.valor_saldo',
                'peticiones.deducciones',
                'datos_bancarios.tipo_documento',
                'datos_bancarios.codigo_banco',
                'datos_bancarios.numero_cuenta',
                'datos_bancarios.tipo_cuenta'
            )
            ->whereIn('peticiones.id', $ids)
            ->get()
            ->unique('id');

        // Calculate saldo_total for each record
        foreach ($registros as $reg) {
            $reg->saldo_total = intval(floatval($reg->valor_saldo) - floatval($reg->deducciones));
        }

        $fecha = Carbon::now('America/Bogota')->format('Ymd'); // e.g. 20260303
        $cantidadRegistros = $registros->count();
        $sumaTotal = $registros->sum('saldo_total');

        // ========== HEADER LINE ==========
        $header = '1';                                              // 1  - Tipo registro
        $header .= '000000';                                        // 6  - Ceros fijos
        $header .= '900614022';                                     // 9  - NIT Pagador
        $header .= 'I';                                             // 1  - Aplicacion
        $header .= str_repeat(' ', 15);                             // 15 - Espacios
        $seq = $this->obtenerSiguienteConsecutivo('SALDOS');
        $concepto = 'MS' . substr($fecha, 2) . str_pad($seq, 2, '0', STR_PAD_LEFT);

        $header .= '220';                                           // 3  - Tipo de pago
        $header .= $concepto;                                       // 10 - Concepto dinámico
        $header .= $fecha;                                          // 8  - Fecha YYYYMMDD
        $header .= 'A1';                                            // 2  - Secuencia de env├¡o
        $header .= $fecha;                                          // 8  - Fecha YYYYMMDD
        $header .= str_pad($cantidadRegistros, 6, '0', STR_PAD_LEFT); // 6  - Cantidad registros
        $header .= str_pad($sumaTotal, 32, '0', STR_PAD_LEFT);       // 32 - Suma total valores
        $header .= '0018000042893';                                   // 13 - Cuenta a debitar
        $header .= 'S';                                               // 1  - Tipo cuenta
        $header = str_pad($header, $LINE_WIDTH);                      // Pad to fixed width

        $lines = [$header];

        $cleaner = function($str) {
            $str = str_replace(["\r", "\n", "\t"], ' ', $str ?? '');
            $unwanted = ['Á'=>'A', 'É'=>'E', 'Í'=>'I', 'Ó'=>'O', 'Ú'=>'U', 'Ñ'=>'N', 'á'=>'a', 'é'=>'e', 'í'=>'i', 'ó'=>'o', 'ú'=>'u', 'ñ'=>'n'];
            $str = strtr($str, $unwanted);
            return preg_replace('/[^\x20-\x7E]/', '', $str);
        };

        // ========== DETAIL LINES ==========
        foreach ($registros as $reg) {
            // Derive tipo_transaccion from tipo_cuenta
            $tipoTransaccion = '37'; // default: CUENTA DE AHORRO
            if ($reg->tipo_cuenta === 'CUENTA CORRIENTE') {
                $tipoTransaccion = '27';
            }

            $line = '6';                                                    // 1  - Tipo registro (Fijo para detalle)
            $line .= str_pad($cleaner($reg->cpagsal ?? ''), 15);                             // 15 - NIT/Cédula
            $line .= str_pad(mb_substr($cleaner($reg->pagsal ?? ''), 0, 30), 30);            // 30 - Nombre beneficiario
            $line .= '00000';                                                       // 5  - Ceros fijos
            $line .= str_pad($cleaner($reg->codigo_banco ?? '1007'), 4, '0', STR_PAD_LEFT);  // 4  - Código banco
            $line .= str_pad($cleaner($reg->numero_cuenta ?? ''), 17);                       // 17 - Número cuenta
            $line .= 'S';                                                           // 1  - Fijo
            $line .= $tipoTransaccion;                                              // 2  - Tipo transaccion
            $line .= str_pad(intval($reg->saldo_total), 15, '0', STR_PAD_LEFT);    // 15 - Valor transaccion
            $line .= '00';                                                          // 2  - Ceros fijos
            $line .= $fecha;                                                        // 8  - Fecha YYYYMMDD
            $line .= str_repeat(' ', 21);                                           // 21 - Espacios
            $line .= '100000';                                                      // 6  - Valor fijo
            $line = str_pad($line, $LINE_WIDTH);                                    // Pad to fixed width

            $lines[] = $line;
        }

        $content = implode("\r\n", $lines) . "\r\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="BANCO.txt"');
    }

    public function archivoPlanoAnticipos(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids) || ! is_array($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Debe seleccionar al menos un registro.',
            ]);
        }

        $LINE_WIDTH = 264;

        $registros = DB::table('peticiones')
            ->leftJoin('datos_bancarios', function ($join) {
                $join->on('peticiones.cpagant', '=', 'datos_bancarios.nit')
                    ->where('datos_bancarios.estado', '=', 'ACTIVO');
            })
            ->select(
                'peticiones.id',
                'peticiones.cpagant',
                'peticiones.pagant',
                'peticiones.valor_a_pagar',
                'datos_bancarios.tipo_documento',
                'datos_bancarios.codigo_banco',
                'datos_bancarios.numero_cuenta',
                'datos_bancarios.tipo_cuenta'
            )
            ->whereIn('peticiones.id', $ids)
            ->get()
            ->unique('id');

        // Calculate amount for each record
        foreach ($registros as $reg) {
            $reg->amount = intval(floatval($reg->valor_a_pagar));
        }

        $fecha = Carbon::now('America/Bogota')->format('Ymd'); // e.g. 20260303
        $cantidadRegistros = $registros->count();
        $sumaTotal = $registros->sum('amount');

        // ========== HEADER LINE ==========
        $header = '1';                                              // 1  - Tipo registro
        $header .= '000000';                                        // 6  - Ceros fijos
        $header .= '900614022';                                     // 9  - NIT Pagador
        $header .= 'I';                                             // 1  - Aplicacion
        $header .= str_repeat(' ', 15);                             // 15 - Espacios
        $seq = $this->obtenerSiguienteConsecutivo('ANTICIPOS');
        $concepto = 'MA' . substr($fecha, 2) . str_pad($seq, 2, '0', STR_PAD_LEFT);

        $header .= '220';                                           // 3  - Tipo de pago
        $header .= $concepto;                                       // 10 - Concepto dinámico
        $header .= $fecha;                                          // 8  - Fecha YYYYMMDD
        $header .= 'A1';                                            // 2  - Secuencia de env├¡o
        $header .= $fecha;                                          // 8  - Fecha YYYYMMDD
        $header .= str_pad($cantidadRegistros, 6, '0', STR_PAD_LEFT); // 6  - Cantidad registros
        $header .= str_pad($sumaTotal, 32, '0', STR_PAD_LEFT);       // 32 - Suma total valores
        $header .= '0018000042893';                                   // 13 - Cuenta a debitar
        $header .= 'S';                                               // 1  - Tipo cuenta
        $header = str_pad($header, $LINE_WIDTH);                      // Pad to fixed width

        $lines = [$header];

        $cleaner = function($str) {
            $str = str_replace(["\r", "\n", "\t"], ' ', $str ?? '');
            $unwanted = ['Á'=>'A', 'É'=>'E', 'Í'=>'I', 'Ó'=>'O', 'Ú'=>'U', 'Ñ'=>'N', 'á'=>'a', 'é'=>'e', 'í'=>'i', 'ó'=>'o', 'ú'=>'u', 'ñ'=>'n'];
            $str = strtr($str, $unwanted);
            return preg_replace('/[^\x20-\x7E]/', '', $str);
        };

        // ========== DETAIL LINES ==========
        foreach ($registros as $reg) {
            // Derive tipo_transaccion from tipo_cuenta
            $tipoTransaccion = '37'; // default: CUENTA DE AHORRO
            if ($reg->tipo_cuenta === 'CUENTA CORRIENTE') {
                $tipoTransaccion = '27';
            }

            $line = '6';                                                    // 1  - Tipo registro (Fijo para detalle)
            $line .= str_pad($cleaner($reg->cpagant ?? ''), 15);                             // 15 - NIT/Cédula
            $line .= str_pad(mb_substr($cleaner($reg->pagant ?? ''), 0, 30), 30);            // 30 - Nombre beneficiario
            $line .= '00000';                                                       // 5  - Ceros fijos
            $line .= str_pad($cleaner($reg->codigo_banco ?? '1007'), 4, '0', STR_PAD_LEFT);  // 4  - Código banco
            $line .= str_pad($cleaner($reg->numero_cuenta ?? ''), 17);                       // 17 - Número cuenta
            $line .= 'S';                                                           // 1  - Fijo
            $line .= $tipoTransaccion;                                              // 2  - Tipo transaccion
            $line .= str_pad(intval($reg->amount), 15, '0', STR_PAD_LEFT);         // 15 - Valor transaccion
            $line .= '00';                                                          // 2  - Ceros fijos
            $line .= $fecha;                                                        // 8  - Fecha YYYYMMDD
            $line .= str_repeat(' ', 21);                                           // 21 - Espacios
            $line .= '100000';                                                      // 6  - Valor fijo
            $line = str_pad($line, $LINE_WIDTH);                                    // Pad to fixed width

            $lines[] = $line;
        }

        $content = implode("\r\n", $lines) . "\r\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="BANCO.txt"');
    }

    public function archivoPlanoCuentas(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids) || ! is_array($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Debe seleccionar al menos un registro.',
            ]);
        }

        $LINE_WIDTH = 264;

        $registros = DB::table('peticiones')
            ->leftJoin('datos_bancarios', function ($join) {
                $join->on('peticiones.cpagcon', '=', 'datos_bancarios.nit')
                    ->where('datos_bancarios.estado', '=', 'ACTIVO');
            })
            ->select(
                'peticiones.id',
                'peticiones.cpagcon',
                'peticiones.pagcon',
                'peticiones.cargaone',
                'peticiones.cargatwo',
                'peticiones.standby',
                'peticiones.costo_desplazamiento',
                'peticiones.ica',
                'datos_bancarios.tipo_documento',
                'datos_bancarios.codigo_banco',
                'datos_bancarios.numero_cuenta',
                'datos_bancarios.tipo_cuenta'
            )
            ->whereIn('peticiones.id', $ids)
            ->get()
            ->unique('id');

        // Calculate amount for each record
        foreach ($registros as $reg) {
            $base = floatval($reg->cargaone ?? 0) + floatval($reg->cargatwo ?? 0) + floatval($reg->standby ?? 0) + floatval($reg->costo_desplazamiento ?? 0);
            $reteica = ($reg->ica == 'SI') ? ($base * 0.00414) : 0;
            $retefuente = $base * 0.01;
            $total = $base - ($reteica + $retefuente);
            $reg->amount = intval($total);
        }

        $fecha = \Carbon\Carbon::now('America/Bogota')->format('Ymd');
        $cantidadRegistros = $registros->count();
        $sumaTotal = $registros->sum('amount');

        // ========== HEADER LINE ==========
        $header = '1';                                              // 1  - Tipo registro
        $header .= '000000';                                        // 6  - Ceros fijos
        $header .= '900614022';                                     // 9  - NIT Pagador
        $header .= 'I';                                             // 1  - Aplicacion
        $header .= str_repeat(' ', 15);                             // 15 - Espacios
        $seq = $this->obtenerSiguienteConsecutivo('CUENTAS');
        $concepto = 'MC' . substr($fecha, 2) . str_pad($seq, 2, '0', STR_PAD_LEFT);

        $header .= '220';                                           // 3  - Tipo de pago
        $header .= $concepto;                                       // 10 - Concepto dinámico
        $header .= $fecha;                                          // 8  - Fecha YYYYMMDD
        $header .= 'A1';                                            // 2  - Secuencia de env├¡o
        $header .= $fecha;                                          // 8  - Fecha YYYYMMDD
        $header .= str_pad($cantidadRegistros, 6, '0', STR_PAD_LEFT); // 6  - Cantidad registros
        $header .= str_pad($sumaTotal, 32, '0', STR_PAD_LEFT);       // 32 - Suma total valores
        $header .= '0018000042893';                                   // 13 - Cuenta a debitar
        $header .= 'S';                                               // 1  - Tipo cuenta
        $header = str_pad($header, $LINE_WIDTH);                      // Pad to fixed width

        $lines = [$header];

        $cleaner = function($str) {
            $str = str_replace(["\r", "\n", "\t"], ' ', $str ?? '');
            $unwanted = ['Á'=>'A', 'É'=>'E', 'Í'=>'I', 'Ó'=>'O', 'Ú'=>'U', 'Ñ'=>'N', 'á'=>'a', 'é'=>'e', 'í'=>'i', 'ó'=>'o', 'ú'=>'u', 'ñ'=>'n'];
            $str = strtr($str, $unwanted);
            return preg_replace('/[^\x20-\x7E]/', '', $str);
        };

        // ========== DETAIL LINES ==========
        foreach ($registros as $reg) {
            $tipoTransaccion = '37'; // default: CUENTA DE AHORRO
            if ($reg->tipo_cuenta === 'CUENTA CORRIENTE') {
                $tipoTransaccion = '27';
            }

            $line = '6';                                                    // 1  - Tipo registro (Fijo para detalle)
            $line .= str_pad($cleaner($reg->cpagcon ?? ''), 15);                             // 15 - NIT/Cédula
            $line .= str_pad(mb_substr($cleaner($reg->pagcon ?? ''), 0, 30), 30);            // 30 - Nombre beneficiario
            $line .= '00000';                                                       // 5  - Ceros fijos
            $line .= str_pad($cleaner($reg->codigo_banco ?? '1007'), 4, '0', STR_PAD_LEFT);  // 4  - Código banco
            $line .= str_pad($cleaner($reg->numero_cuenta ?? ''), 17);                       // 17 - Número cuenta
            $line .= 'S';                                                           // 1  - Fijo
            $line .= $tipoTransaccion;                                              // 2  - Tipo transaccion
            $line .= str_pad(intval($reg->amount), 15, '0', STR_PAD_LEFT);         // 15 - Valor transaccion
            $line .= '00';                                                          // 2  - Ceros fijos
            $line .= $fecha;                                                        // 8  - Fecha YYYYMMDD
            $line .= str_repeat(' ', 21);                                           // 21 - Espacios
            $line .= '100000';                                                      // 6  - Valor fijo
            $line = str_pad($line, $LINE_WIDTH);                                    // Pad to fixed width

            $lines[] = $line;
        }

        $content = implode("\r\n", $lines) . "\r\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="BANCO.txt"');
    }

    public function descargarPdf(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids) || ! is_array($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'Debe seleccionar al menos un registro.',
            ]);
        }

        $registros = DB::table('cuentas')
            ->whereIn('id', $ids)
            ->get();

        if (count($registros) === 0) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron registros.',
            ]);
        }

        if (count($registros) === 1) {
            // Caso 1: Un solo registro, descargar PDF con nombre de guia - asociado
            $r = $registros[0];
            $filename = "{$r->guia}-{$r->pagcon}.pdf";
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('Solicitud.formato-pdf', ['registros' => [$r]]);

            return $pdf->download($filename);
        } else {
            // Caso 2: M├║ltiples registros, empaquetar en un archivo .zip al vuelo
            $zip = new \ZipArchive();
            $zipName = \Carbon\Carbon::now('America/Bogota')->format('ymdHi').'.zip';
            $zipPath = storage_path('app/'.$zipName);

            if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
                foreach ($registros as $r) {
                    $filename = "{$r->guia}-{$r->pagcon}.pdf";
                    $pdfContent = \Barryvdh\DomPDF\Facade\Pdf::loadView('Solicitud.formato-pdf', ['registros' => [$r]])->output();
                    $zip->addFromString($filename, $pdfContent);
                }
                $zip->close();

                return response()->download($zipPath)->deleteFileAfterSend(true);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo generar el archivo ZIP.',
                ]);
            }
        }
    }

    public function diario()
    {
        return Excel::download(new DiariosExport, 'diario.xlsx');
    }

    public function diaria()
    {
        return Excel::download(new DiariasExport, 'diarias.xlsx');
    }

    public function adelanto()
    {
        return Excel::download(new AnticiposExport, 'anticipos.xlsx');
    }

    public function estatus(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        // Validar año
        if (! $year || ! is_numeric($year)) {
            return redirect()->back()->withErrors(['year' => 'A├▒o inv├ílido']);
        }

        // Validar mes (puede ser n├║mero o "todos")
        if ($month !== 'todos' && (! is_numeric($month) || $month < 1 || $month > 12)) {
            return redirect()->back()->withErrors(['month' => 'Mes inv├ílido']);
        }

        // Generar nombre de archivo
        if ($month === 'todos') {
            $filename = 'estatus_'.$year.'_completo.xlsx';
        } else {
            $filename = 'estatus_'.$year.'_'.str_pad($month, 2, '0', STR_PAD_LEFT).'.xlsx';
        }

        // Descargar usando el Export modificado
        return Excel::download(new EstatusExport($year, $month), $filename);
    }

    public function prefacturas(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        // Validar que el formato sea correcto
        if (! $year || ! $month || ! is_numeric($year) || ! is_numeric($month)) {
            return redirect()->back()->withErrors(['year' => 'Año o mes inválido']);
        }

        // Verificar que los valores sean válidos
        if (! checkdate((int) $month, 1, (int) $year)) {
            return redirect()->back()->withErrors(['month' => 'Fecha inválida']);
        }

        // Generar el nombre del archivo din├ímicamente
        $filename = 'prefactura_'.$year.'_'.str_pad($month, 2, '0', STR_PAD_LEFT).'.xlsx';

        // Descargar el archivo usando los par├ímetros
        return Excel::download(new PrefacturasExport($year, $month), $filename);
    }

    public function historico(Request $request)
    {
        // ├Ültimo a├▒o/mes disponibles en infoestatus (PostgreSQL)
        $ultimoRegistro = DB::table('infoestatus')
            ->selectRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year, EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month')
            ->orderBy('fecha_cargue', 'desc')
            ->first();

        $defaultYear = isset($ultimoRegistro->year) ? (int) $ultimoRegistro->year : Carbon::now()->year;
        $defaultMonth = isset($ultimoRegistro->month) ? (int) $ultimoRegistro->month : Carbon::now()->month;

        $year = (int) $request->input('year', $defaultYear);
        $month = (int) $request->input('month', $defaultMonth);

        $incluidos = ['Servicio finalizado', 'Servicio cancelado'];

        $diarias = DB::table('peticiones')
            ->whereIn('states', $incluidos)
            ->whereRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?', [$year])
            ->whereRaw('EXTRACT(MONTH FROM fecha_cargue::timestamp) = ?', [$month])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

        $years = DB::table('peticiones')
            ->selectRaw('DISTINCT EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year')
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn ($y) => (int) $y);

        $months = DB::table('peticiones')
            ->selectRaw('DISTINCT EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month')
            ->whereRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?', [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn ($m) => (int) $m);

        return view('Solicitud.historico', compact('diarias', 'years', 'months', 'year', 'month'));
    }

    public function prefactura(Request $request)
    {
        // ├Ültimo a├▒o/mes disponibles (PostgreSQL)
        $ultimoRegistro = DB::table('infoestatus')
            ->selectRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year, EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month')
            ->orderBy('fecha_cargue', 'desc')
            ->first();

        $defaultYear = isset($ultimoRegistro->year) ? (int) $ultimoRegistro->year : Carbon::now()->year;
        $defaultMonth = isset($ultimoRegistro->month) ? (int) $ultimoRegistro->month : Carbon::now()->month;

        $year = (int) $request->input('year', $defaultYear);
        $month = (int) $request->input('month', $defaultMonth);

        $diarias = DB::table('infoestatus')
            ->where('facturar', 'SI')
            ->whereRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?', [$year])
            ->whereRaw('EXTRACT(MONTH FROM fecha_cargue::timestamp) = ?', [$month])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

        $years = DB::table('infoestatus')
            ->selectRaw('DISTINCT EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year')
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn ($y) => (int) $y);

        $months = DB::table('infoestatus')
            ->selectRaw('DISTINCT EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month')
            ->whereRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?', [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn ($m) => (int) $m);

        // Obtener todas las combinaciones disponibles para el selector de descarga
        $fechasDisponibles = DB::table('infoestatus')
            ->selectRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) as year, EXTRACT(MONTH FROM fecha_cargue::timestamp) as month')
            ->distinct()
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        $availableDates = [];
        foreach ($fechasDisponibles as $fecha) {
            $y = (int) $fecha->year;
            $m = (int) $fecha->month;
            $availableDates[$y][] = [
                'val' => str_pad($m, 2, '0', STR_PAD_LEFT),
                'label' => \Carbon\Carbon::create()->month($m)->translatedFormat('F'),
            ];
        }

        return view('Solicitud.prefactura', compact('diarias', 'years', 'months', 'year', 'month', 'availableDates'));
    }

    public function infoestatus()
    {
        $services = DB::table('servicios')->orderBy('nombre')->get();
        $servicios = $services->map(function ($service) {
            return ['value' => $service->nombre, 'text' => $service->nombre];
        })->prepend(['value' => '', 'text' => '']);
        $carriages = DB::table('transportadoras')->orderBy('nombre')->get();
        $autos = $carriages->map(function ($carriage) {
            return ['value' => $carriage->nombre, 'text' => $carriage->nombre];
        })->prepend(['value' => '', 'text' => '']);
        $causes = DB::table('causales')->orderBy('nombre')->get();
        $causales = $causes->map(function ($cause) {
            return ['value' => $cause->nombre, 'text' => $cause->nombre];
        });

        $startOfLastMonth = Carbon::now()->subMonth(3)->startOfMonth()->toDateString(); // Inicio del mes anterior
        $endOfCurrentMonth = Carbon::now()->endOfMonth()->toDateString(); // Fin del mes actual
        $diarias = DB::table('infoestatus')->where('facturar', 'NO')->whereBetween('fecha_cargue', [$startOfLastMonth, $endOfCurrentMonth])->orderBy('fecha_cargue', 'desc')->get();

        // Obtener Años y Meses disponibles para el filtro
        $fechasDisponibles = DB::table('infoestatus')
            ->selectRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) as year, EXTRACT(MONTH FROM fecha_cargue::timestamp) as month')
            ->distinct()
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        // Estructurar datos: [ 2024 => [1, 2, ...], 2023 => [12, 11, ...] ]
        $availableDates = [];
        foreach ($fechasDisponibles as $fecha) {
            $year = (int) $fecha->year;
            $month = (int) $fecha->month;
            $availableDates[$year][] = $month;
        }

        return view('Solicitud.infoestatus', compact('diarias', 'servicios', 'autos', 'causales', 'availableDates'));
    }

    public function congelado(Request $request)
    {
        // Obtener los a├▒os ├║nicos del campo fecha_cargue
        $years = DB::table('infoestatus')
            ->selectRaw('DISTINCT EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year')
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn ($y) => (int) $y);

        // Determinar a├▒o seleccionado (por defecto el ├║ltimo disponible o el actual)
        $defaultYear = $years->first() ?: Carbon::now()->year;
        $year = (int) $request->input('year', $defaultYear);

        // Obtener los meses ├║nicos para el a├▒o seleccionado
        $months = DB::table('infoestatus')
            ->selectRaw('DISTINCT EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month')
            ->whereRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?', [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn ($m) => (int) $m);

        // Determinar mes seleccionado
        // Si el mes solicitado est├í en la lista de meses disponibles, usarlo.
        // Si no (ej. cambio de a├▒o), usar el ├║ltimo mes disponible.
        $requestedMonth = $request->input('month');
        if ($requestedMonth && $months->contains((int) $requestedMonth)) {
            $month = (int) $requestedMonth;
        } else {
            $month = $months->last() ?: Carbon::now()->month;
        }

        // Filtrar por año y mes seleccionados
        $search = $request->input('search');

        $query = DB::table('infoestatus')
            ->where('facturar', 'SI')
            ->whereRaw('EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?', [$year])
            ->whereRaw('EXTRACT(MONTH FROM fecha_cargue::timestamp) = ?', [$month]);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw('id::text ILIKE ?', ["%$search%"])
                    ->orWhere('guia', 'ILIKE', "%$search%")
                    ->orWhere('cliente', 'ILIKE', "%$search%")
                    ->orWhere('razon', 'ILIKE', "%$search%")
                    ->orWhere('radicado', 'ILIKE', "%$search%");
            });
        }

        $diarias = $query->orderBy('fecha_cargue', 'desc')
            ->paginate(200)
            ->appends($request->all());

        // Datos adicionales para la vista
        $services = DB::table('servicios')->orderBy('nombre')->get();
        $servicios = $services->map(function ($service) {
            return ['value' => $service->nombre, 'text' => $service->nombre];
        });

        $carriages = DB::table('transportadoras')->orderBy('nombre')->get();
        $autos = $carriages->map(function ($carriage) {
            return ['value' => $carriage->nombre, 'text' => $carriage->nombre];
        })->prepend(['value' => '', 'text' => '']);

        $causes = DB::table('causales')->orderBy('nombre')->get();
        $causales = $causes->map(function ($cause) {
            return ['value' => $cause->nombre, 'text' => $cause->nombre];
        });

        return view('Solicitud.congelado', compact(
            'diarias',
            'servicios',
            'autos',
            'causales',
            'years',
            'months',
            'year',
            'month'
        ));
    }

    public function procesarArchivos(Request $request)
    {
        // Clientes permitidos para carga manual
        /* $clientesPermitidos = [
            'DERCO COLOMBIA SAS',
            'INCHCAPE COLOMBIA S A S',
            'METROKIA S.A.',
            'ASAP CONCEPTOS PROMOCIONALES DE MARKETING SAS',
            'SIMONIZ SA',
            'GRUPO LOGISTICO ESPECIALIZADO',
            'AUTOMOTORES COMERCIALES AUTOCOM S.A'
        ]; */

        // Primero definir la función de limpieza fuera del scope
        $limpiarTexto = function ($texto) {
            if (is_null($texto) || ! is_string($texto)) {
                return $texto;
            }

            // Convertir a UTF-8 si no lo está
            if (! mb_check_encoding($texto, 'UTF-8')) {
                $texto = mb_convert_encoding($texto, 'UTF-8', 'UTF-8');
            }

            // Lista de caracteres problemáticos comunes
            $caracteresProblema = [
                "\xE2\x80\x8B", // Zero Width Space
                "\xE2\x80\x8C", // Zero Width Non-Joiner
                "\xE2\x80\x8D", // Zero Width Joiner
                "\xEF\xBB\xBF", // BOM
                "\xE2\x80\xA8", // Line Separator
                "\xE2\x80\xA9", // Paragraph Separator
                "\xC2\xA0",     // Non-breaking space
            ];

            foreach ($caracteresProblema as $caracter) {
                $texto = str_replace($caracter, ' ', $texto);
            }

            // Eliminar caracteres de control (excepto tab y newline)
            $texto = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/u', '', $texto);

            // Normalizar espacios múltiples
            $texto = preg_replace('/\s+/', ' ', $texto);

            return trim($texto);
        };

        $fields = [
            'archivo' => 'required|max:10000|mimes:xlsx',
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido',
        ];
        $this->validate($request, $fields, $message);

        $archivo = $request->file('archivo');
        $datosArchivo = Excel::toArray([], $archivo);
        $filasEstatus = array_slice($datosArchivo[0], 1);

        // Agrupar las filas por ID
        $filasPorId = array_reduce($filasEstatus, function ($carry, $fila) {
            $id = $fila[0];
            if (! isset($carry[$id])) {
                $carry[$id] = [];
            }
            $carry[$id][] = $fila;

            return $carry;
        }, []);

        $datos = [];
        $errores = [];

        foreach ($filasPorId as $id => $filas) {
            usort($filas, function ($a, $b) {
                return $a[1] <=> $b[1];
            });

            $id = (int) $id;
            $solicitud = DB::table('solicitudes')->where('id', $id)->first();

            // Validar si la solicitud existe y pertenece a los clientes permitidos
            if (!$solicitud) {
                $errores[] = "Error: El ID {$id} no existe en la tabla de solicitudes.";
                continue;
            }

            /* if (!in_array($solicitud->cliente, $clientesPermitidos)) {
                $errores[] = "Error: El ID {$id} pertenece al cliente '{$solicitud->cliente}', el cual no tiene permitida la carga por este medio.";
                continue;
            } */

            $costo = $solicitud->costo;
            $cliente = $solicitud->cliente;

            foreach ($filas as $index => $fila) {
                try {
                    // Limpiar cada campo usando la función definida
                    $filaLimpia = array_map($limpiarTexto, $fila);

                    // Validar y convertir tipos de datos
                    $filaLimpia[0] = intval($filaLimpia[0]); // ID
                    $guia = $filaLimpia[1] ?? ''; // Guía

                    // El número de guía es MANDATORIO para estos clientes
                    if (empty($guia)) {
                        $errores[] = "Error en fila con ID {$id}: El número de guía es obligatorio.";
                        continue;
                    }

                    $existeGuia = DB::table('estatus')->where('guia', $guia)->exists();
                    if ($existeGuia) {
                        continue;
                    }

                    $filaLimpia[6] = intval($filaLimpia[6] ?? 0); // Piezas
                    $filaLimpia[7] = floatval($filaLimpia[7] ?? 0); // Peso
                    $filaLimpia[8] = floatval($filaLimpia[8] ?? 0); // Valor declarado

                    $costoFlete = ($index == 0) ? $costo : 0;
                    $valorCliente = 0;

                    if ($cliente === 'CPA DISTRIBUCIONES') {
                        if (($filaLimpia[2] ?? '') === 'BOGOTA D.C.') {
                            $valorCliente = $filaLimpia[7] * 58;
                        } else {
                            $valorCliente = $filaLimpia[7] * 63;
                        }
                    }

                    // Si los campos básicos vienen en el excel, usarlos. Si no, fetch from solicitud.
                    $destino_real = !empty($filaLimpia[2]) ? $filaLimpia[2] : $limpiarTexto($solicitud->destino);
                    $documento_cliente = !empty($filaLimpia[3]) ? $filaLimpia[3] : $limpiarTexto($solicitud->documento_cliente);
                    $destinatario = !empty($filaLimpia[4]) ? $filaLimpia[4] : $limpiarTexto($solicitud->destinatario);
                    $direccion = !empty($filaLimpia[5]) ? $filaLimpia[5] : $limpiarTexto($solicitud->direccion);
                    $piezas = ($filaLimpia[6] > 0) ? $filaLimpia[6] : $solicitud->piezas;
                    $peso = ($filaLimpia[7] > 0) ? $filaLimpia[7] : $solicitud->peso;
                    $valor_declarado = ($filaLimpia[8] > 0) ? $filaLimpia[8] : $solicitud->valor_declarado;

                    $datos[] = [
                        'id' => $filaLimpia[0],
                        'guia' => $guia,
                        'destino_real' => $destino_real,
                        'documento_cliente' => $documento_cliente,
                        'destinatario' => $destinatario,
                        'direccion' => $direccion,
                        'piezas' => $piezas,
                        'peso' => $peso,
                        'valor_declarado' => $valor_declarado,
                        'costo_flete' => $costoFlete,
                        'valor_cliente' => $valorCliente,
                        'created_at' => Carbon::now(),
                    ];

                } catch (\Exception $e) {
                    // Registrar error pero continuar procesando
                    $errores[] = "Error en fila con ID {$id}: ".$e->getMessage();
                    Log::error('Error procesando archivo Excel', [
                        'id' => $id,
                        'error' => $e->getMessage(),
                        'fila' => $fila,
                    ]);

                    continue;
                }
            }
        }

        $datos = array_filter($datos);
        $cantidadInsertada = count($datos);

        if ($cantidadInsertada > 0) {
            DB::table('estatus')->insert($datos);

            $mensaje = 'Datos procesados correctamente. Se insertaron '.$cantidadInsertada.' registros.';
            if (! empty($errores)) {
                $mensaje .= ' Hubo '.count($errores).' errores/advertencias durante el procesamiento.';
            }

            return back()->with('success', $mensaje)->with('cantidad', $cantidadInsertada)->with('errores', $errores);
        } else {
            $mensajeError = 'No se insertó ningún dato.';
            if (!empty($errores)) {
                $mensajeError .= ' Errores: ' . implode(', ', $errores);
            }
            return back()->with('warning', $mensajeError);
        }
    }

    public function procesarAnticipos(Request $request)
    {
        // Validar archivo
        $fields = [
            'archivo' => 'required|max:10000|mimes:xlsx',
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido',
        ];
        $this->validate($request, $fields, $message);

        // Leer archivo Excel
        $archivo = $request->file('archivo');
        $datosArchivo = Excel::toArray([], $archivo);
        $filasEstatus = array_slice($datosArchivo[0], 1); // Omitir encabezado

        // Inicializar contador
        $cantidad = 0;

        // Recorrer filas del archivo
        foreach ($filasEstatus as $fila) {
            // Evitar filas vac├¡as o incompletas
            if (empty($fila[0])) {
                continue; // Saltar si no hay "razon"
            }

            // Asignar variables con control de ├¡ndices
            $razon = trim($fila[0] ?? '');
            $recibido_cumplido = trim($fila[1] ?? '');
            $fecha_envio = trim($fila[2] ?? '');

            // Validar que al menos uno de los campos tenga valor
            if ($recibido_cumplido === '' && $fecha_envio === '') {
                continue;
            }

            // Construir array de actualizacion din├ímicamente
            $camposActualizar = [
                'updated_at' => now(),
            ];

            if ($recibido_cumplido !== '') {
                $camposActualizar['recibido_cumplido'] = $recibido_cumplido;
            }
            if ($fecha_envio !== '') {
                $camposActualizar['fecha_envio'] = $fecha_envio;
            }

            // Solo actualizar si hay al menos un campo para modificar
            if (count($camposActualizar) > 1) { // >1 porque 'updated_at' siempre est├í
                $updated = DB::table('solicitudes')
                    ->where('razon', $razon)
                    ->update($camposActualizar);

                if ($updated) {
                    $cantidad++;
                }
            }

            // Si se actualizo algo, incrementar contador
            if ($updated) {
                $cantidad++;
            }
        }

        // Retornar con mensaje y cantidad
        return back()
            ->with('success', 'Datos actualizados correctamente')
            ->with('cantidad', $cantidad);
    }

    public function procesarRegistros(Request $request)
    {
        $fields = [
            'archivo' => 'required|max:10000|mimes:xlsx',
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido',
        ];
        $this->validate($request, $fields, $message);

        $archivo = $request->file('archivo');
        $datosArchivo = Excel::toArray([], $archivo);
        $filasEstatus = array_slice($datosArchivo[0], 1);
        $actualizadas = 0;

        foreach ($filasEstatus as $fila) {
            $guia = $fila[0];
            $facturaSiigo = $fila[1];
            $fechaSiigo = $fila[2];

            $actualizadas += DB::table('estatus')
                ->where('guia', $guia)
                ->update([
                    'factura_siigo' => $facturaSiigo,
                    'fecha_siigo' => $fechaSiigo,
                ]);
        }
        $mensaje = $actualizadas.' registros actualizados correctamente.';

        return redirect()->back()->with('success', $mensaje);
    }

    public function procesarItems(Request $request)
    {
        $fields = [
            'archivo' => 'required|max:10000|mimes:xlsx',
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido',
        ];
        $this->validate($request, $fields, $message);

        $archivo = $request->file('archivo');
        $datosArchivo = Excel::toArray([], $archivo);
        $filasEstatus = array_slice($datosArchivo[0], 1);
        $actualizadas = 0;

        foreach ($filasEstatus as $fila) {
            $guia = $fila[0];
            $dcf = $fila[1];
            $dts = $fila[2];
            $dcyd = $fila[3];
            $dpaux = $fila[4];
            $dpsby = $fila[5];
            $dpmtc = $fila[6];
            $dpesc = $fila[7];
            $dpcas = $fila[8];
            $dpmon = $fila[9];
            $dpesg = $fila[10];
            $dst = $fila[11];
            $egreso_anticipo = $fila[12];
            $egreso_saldo = $fila[13];
            $fecha_saldo = $fila[14];

            $actualizadas += DB::table('estatus')
                ->where('guia', $guia)
                ->update([
                    'dcf' => $dcf,
                    'dts' => $dts,
                    'dcyd' => $dcyd,
                    'dpaux' => $dpaux,
                    'dpsby' => $dpsby,
                    'dpmtc' => $dpmtc,
                    'dpesc' => $dpesc,
                    'dpcas' => $dpcas,
                    'dpmon' => $dpmon,
                    'dpesg' => $dpesg,
                    'dst' => $dst,
                    'egreso_anticipo' => $egreso_anticipo,
                    'egreso_saldo' => $egreso_saldo,
                    'fecha_saldo' => $fecha_saldo,
                ]);
        }
        $mensaje = $actualizadas.' registros actualizados correctamente.';

        return redirect()->back()->with('success', $mensaje);
    }

    public function total(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        // Validar que los valores sean v├ílidos
        if (! checkdate($month, 1, $year)) {
            return redirect()->back()->withErrors(['date' => 'Fecha inv├ílida']);
        }

        // Generar el nombre del archivo din├ímicamente
        $filename = 'historicos_'.$year.'_'.str_pad($month, 2, '0', STR_PAD_LEFT).'.xlsx';

        // Descargar el archivo usando los par├ímetros
        return Excel::download(new HistoricosExport($year, $month), $filename);
    }

    public function log(Request $request)
    {
        $month = $request->input('month');
        if ($month < 1 || $month > 12) {
            return redirect()->back()->withErrors(['month' => 'Mes inv├ílido']);
        }

        return Excel::download(new LogsExport($month), 'logs_mes_'.$month.'.xlsx');
    }

    public function mastotal(Request $request)
    {
        $month = $request->input('month');
        if ($month < 1 || $month > 12) {
            return redirect()->back()->withErrors(['month' => 'Mes inv├ílido']);
        }

        return Excel::download(new MastotalesExport($month), 'utilidad_masivos_mes_'.$month.'.xlsx');
    }

    public function paqtotal(Request $request)
    {
        $month = $request->input('month');
        if ($month < 1 || $month > 12) {
            return redirect()->back()->withErrors(['month' => 'Mes inv├ílido']);
        }

        return Excel::download(new PaqtotalesExport($month), 'utilidad_paqueteo_mes_'.$month.'.xlsx');
    }

    public function transito()
    {
        return Excel::download(new TransitosExport, 'registros_trafico.xlsx');
    }

    public function servicio(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        // Validar a├▒o
        if (! $year || ! is_numeric($year)) {
            return redirect()->back()->withErrors(['year' => 'A├▒o inv├ílido']);
        }

        // Validar mes (puede ser n├║mero o 'todos')
        if ($month !== 'todos' && (! is_numeric($month) || $month < 1 || $month > 12)) {
            return redirect()->back()->withErrors(['month' => 'Mes inv├ílido']);
        }

        // Generar nombre de archivo
        if ($month === 'todos') {
            $filename = 'sac_'.$year.'_completo.xlsx';
        } else {
            $filename = 'sac_'.$year.'_'.str_pad($month, 2, '0', STR_PAD_LEFT).'.xlsx';
        }

        // Descargar el archivo usando los par├ímetros
        return Excel::download(new ServiciosExport($year, $month), $filename);
    }

    public function create()
    {
        $clientes = DB::table('clientesa')->select('nombre')->orderBy('nombre')->get();
        $municipios = DB::table('municipios')->select('municipio')->orderBy('municipio')->get();
        $tipos = DB::table('tipo_vehiculos')->orderBy('tipo')->get();

        return view('Solicitud.create', compact('clientes', 'municipios', 'tipos'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'valor_declarado' => str_replace('.', '', $request->input('valor_declarado')),
        ]);

        $fields = [
            'fecha_solicitud' => 'required',
            'fecha_cargue' => 'required|date|after_or_equal:today',
            'hora_cargue' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $fecha_cargue = $request->input('fecha_cargue');
                    $timezone = 'America/Bogota';
                    $currentDate = Carbon::now($timezone)->toDateString();
                    $currentTime = Carbon::now($timezone)->format('H:i');

                    if ($fecha_cargue == $currentDate && $value < $currentTime) {
                        $fail('La hora de cargue debe ser igual o mayor que la hora actual para la fecha de cargue.');
                    }
                },
            ],
            'fecha_descargue' => 'required|date|after_or_equal:fecha_cargue',
            'hora_descargue' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $fecha_cargue = $request->input('fecha_cargue');
                    $hora_cargue = $request->input('hora_cargue');
                    $fecha_descargue = $request->input('fecha_descargue');

                    if ($fecha_descargue == $fecha_cargue && $value <= $hora_cargue) {
                        $fail('La hora de descargue debe ser mayor que la hora de cargue para la misma fecha.');
                    }
                },
            ],
            'cliente' => 'required',
            'origen' => 'required',
            'destino' => 'required',
            'ejecutivo' => 'required',
            'tipo_vehiculo' => 'required',
            'carroceria' => 'required',
            'tipo_trayecto' => 'required',
            'documento_cliente' => 'required',
            'destinatario' => 'required',
            'direccion' => 'required',
            'piezas' => 'required|numeric',
            'peso' => 'required|numeric',
            'valor_declarado' => 'required|numeric',
        ];
        $message = [
            'fecha_solicitud.required' => 'La fecha de solicitud es requerida',
            'fecha_cargue.required' => 'La fecha de cargue es requerida',
            'hora_cargue.required' => 'La hora de cargue es requerida',
            'fecha_descargue.required' => 'La fecha de descargue es requerida',
            'hora_descargue.required' => 'La hora de descargue es requerida',
            'cliente.required' => 'El cliente es requerido',
            'origen.required' => 'El origen es requerido',
            'destino.required' => 'El destino es requerido',
            'ejecutivo.required' => 'El ejecutivo de cuenta es requerido',
            'tipo_vehiculo.required' => 'El tipo de veh├¡culo es requerido',
            'tipo_trayecto.required' => 'El tipo de trayecto es requerido',
            'documento_cliente.required' => 'El documento del cliente es requerido',
            'destinatario.required' => 'El destinatario es requerido',
            'direccion.required' => 'La direccion es requerida',
            'piezas.required' => 'El numero de piezas es requerido',
            'peso.required' => 'El peso es requerido',
            'valor_declarado.required' => 'El valor declarado es requerido',
        ];

        $validator = validator($request->all(), $fields, $message);

        if ($validator->fails()) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Error de validacion',
                    'errors' => $validator->errors(),
                ], 422);
            }

            return back()->withErrors($validator)->withInput();
        }

        try {
            $cliente = $request->input('cliente');
            $excluidos = [
                'DERCO COLOMBIA SAS',
                'INCHCAPE COLOMBIA S A S',
                'METROKIA S.A.',
                'ASAP CONCEPTOS PROMOCIONALES DE MARKETING SAS',
                'SIMONIZ SA',
                'GRUPO LOGISTICO ESPECIALIZADO',
               'AUTOMOTORES COMERCIALES AUTOCOM S.A'
            ];

            $guia = null;
            if (!in_array($cliente, $excluidos)) {
                $year = Carbon::now()->year;
                $prefix = "MAS-" . $year;

                // Obtener el máximo consecutivo de ambas tablas para asegurar unicidad
                $maxEstatus = DB::table('estatus')
                    ->where('guia', 'LIKE', $prefix . '%')
                    ->orderBy('guia', 'desc')
                    ->value('guia');

                $maxSolicitudes = DB::table('solicitudes')
                    ->where('guia', 'LIKE', $prefix . '%')
                    ->orderBy('guia', 'desc')
                    ->value('guia');

                $maxGuia = ($maxEstatus > $maxSolicitudes) ? $maxEstatus : $maxSolicitudes;

                if ($maxGuia) {
                    $consecutivo = (int) substr($maxGuia, 8); // MAS-2026xxxxxx (8 caracteres: MAS-2026)
                    // Asegurarnos de que el consecutivo inicie mínimo en 6500
                    if ($consecutivo < 6600) {
                        $consecutivo = 6600;
                    }
                    $nuevoConsecutivo = str_pad($consecutivo + 1, 6, '0', STR_PAD_LEFT);
                } else {
                    $nuevoConsecutivo = '006501';
                }

                $guia = $prefix . $nuevoConsecutivo;
            }

            $dataSolicitud = request()->only([
                'fecha_solicitud',
                'fecha_cargue',
                'hora_cargue',
                'fecha_descargue',
                'hora_descargue',
                'cliente',
                'origen',
                'destino',
                'ejecutivo',
                'tipo_vehiculo',
                'carroceria',
                'tipo_trayecto',
                'observaciones',
                'documento_cliente',
                'destinatario',
                'direccion',
                'piezas',
                'peso',
                'valor_declarado',
            ]);

            $dataSolicitud['guia'] = $guia;
            $dataSolicitud['created_at'] = Carbon::now();
            $insertedId = DB::table('solicitudes')->insertGetId($dataSolicitud);

            // Si se generó una guía (no es cliente excluido), insertar en estatus
            if ($guia) {
                DB::table('estatus')->insert([
                    'id' => $insertedId,
                    'guia' => $guia,
                    'destino_real' => $dataSolicitud['destino'],
                    'documento_cliente' => $dataSolicitud['documento_cliente'],
                    'destinatario' => $dataSolicitud['destinatario'],
                    'direccion' => $dataSolicitud['direccion'],
                    'piezas' => $dataSolicitud['piezas'],
                    'peso' => $dataSolicitud['peso'],
                    'valor_declarado' => $dataSolicitud['valor_declarado'],
                    'costo_flete' => 0, // Inicia en 0 hasta que se asigne costo
                    'created_at' => Carbon::now(),
                ]);
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Solicitud creada correctamente',
                    'guia' => $guia
                ], 201);
            }

            return back()->with('success', 'Solicitud creada correctamente. Guía: ' . ($guia ?? 'N/A'));
        } catch (\Exception $e) {
            \Log::error('Error al crear solicitud: '.$e->getMessage());

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Error al guardar la solicitud: '.$e->getMessage(),
                ], 500);
            }

            return back()->with('error', 'Error al guardar la solicitud: '.$e->getMessage())->withInput();
        }
    }

    public function store2(Request $request)
    {
        $data = $request->only('cliente', 'states', 'radicado', 'paytype', 'fecha_cargue', 'fecha_descargue', 'placa', 'razon', 'sucursal', 'tipo_trayecto');

        return redirect()->route('solicitud.index')->with('data', $data);
    }

    public function show($id)
    {
        $detalles = DB::table('solicitudes')->where('id', '=', $id)->get();

        return view('Solicitud.show', compact('detalles'));
    }

    public function show2($id)
    {
        $data = DB::table('solicitudes')->where('id', $id)->first();

        return response()->json($data);
    }

    public function edit(Solicitud $solicitud)
    {
        return response()->json($solicitud);
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        if ($request->ajax()) {
            // Obtener el usuario de la sesion actual
            $usuarioSesion = auth()->user()->name; // Ajusta seg├║n tu modelo de usuario

            // Definir los campos num├®ricos que requieren limpieza de puntos
            $camposNumericos = ['costo', 'cargaone', 'cargatwo', 'standby', 'costo_desplazamiento', 'deducciones'];

            // Manejar campos numricos
            if (in_array($request->name, $camposNumericos)) {
                $value = str_replace('.', '', $request->value); // Limpiar puntos para nmeros

                if (! is_numeric($value)) {
                    return response()->json(['success' => false, 'message' => 'El valor no es un nmero vClido.']);
                }

                $updateData = [$request->name => $value];

                // Solo actualizar 'registrado' si se esta modificando el campo 'costo'
                if ($request->name === 'costo') {
                    $updateData['registrado'] = $usuarioSesion;
                }

                DB::table('solicitudes')
                    ->where('id', $request->pk)
                    ->update($updateData);

                return response()->json(['success' => true]);
            }

            // Manejar el campo 'placa'
            if ($request->name === 'placa') {
                DB::table('solicitudes')
                    ->where('id', $request->pk)
                    ->update([
                        $request->name => $request->value,
                        'asignado' => $usuarioSesion,           // usuario que asigna la placa
                        'fecha_placa' => Carbon::now('America/Bogota'),
                    ]);

                return response()->json(['success' => true]);
            }

            if ($request->name === 'razon') {
                $raw = trim($request->value);
                if (strlen($raw) !== 15 || ! is_numeric($raw)) {
                    return response()->json(['success' => false, 'message' => 'El manifiesto debe tener exactamente 15 numeros.']);
                }

                $solicitud = DB::table('solicitudes')->where('id', $request->pk)->first();
                if (! $solicitud) {
                    return response()->json(['success' => false, 'message' => 'Registro no encontrado.']);
                }

                $exists = DB::table('solicitudes')
                    ->where('razon', $raw)
                    ->where('id', '!=', $request->pk)
                    ->exists();

                if ($exists && $solicitud->paytype !== 'CREDITO') {
                    return response()->json(['success' => false, 'message' => 'El manifiesto ya se encuentra registrado.']);
                }

                DB::table('solicitudes')
                    ->where('id', $request->pk)
                    ->update([
                        'razon' => $raw,
                    ]);

                return response()->json(['success' => true]);
            }

            // Para otros campos, simplemente actualizar el campo correspondiente
            DB::table('solicitudes')
                ->where('id', $request->pk)
                ->update([$request->name => $request->value]);

            return response()->json(['success' => true]);
        }
    }

    public function uploadSoporte(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'pk' => 'required|integer',
                'soporte' => 'required|string',
            ]);

            DB::table('solicitudes')
                ->where('id', $request->pk)
                ->update(['soporte' => $request->soporte]);

            // Dispatch WhatsApp notification
            $whapiToken = env('WHAPI_TOKEN');
            $whapiUrl = rtrim(env('WHAPI_API_URL', 'https://gate.whapi.cloud/messages/text'), '/');
            if (! str_ends_with($whapiUrl, '/messages/text')) {
                $whapiUrl .= '/messages/text';
            }

            if ($whapiToken && $whapiUrl) {
                $mensaje = "Hola Magaly,\n".
                           "Se acaba de cargar informacion correspondiente a una cuenta de cobro para el id {$request->pk}.\n".
                           "Queda pendiente de tu aprobacion.\n\n".
                           "Atentamente,\n".
                           'Sistema de notificaciones GLE';

                // Enviar mensaje hacia WhatsApp
                \Illuminate\Support\Facades\Http::withToken($whapiToken)
                    ->post($whapiUrl, [
                        'typing_time' => 0,
                        'to' => '573174428909',                        
                        'body' => $mensaje,
                    ]);
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Solicitud no v├ílida.'], 400);
    }

    public function showSoporte($id)
    {
        $solicitud = DB::table('solicitudes')->where('id', $id)->first();
        if (! $solicitud || ! $solicitud->soporte) {
            abort(404);
        }

        $data = $solicitud->soporte;

        if (strpos($data, 'data:') === 0) {
            [$type, $dataStr] = explode(';', $data);
            [, $dataStr] = explode(',', $dataStr);
            $mimeType = str_replace('data:', '', $type);
            $fileData = base64_decode($dataStr);

            $ext = strpos($mimeType, 'pdf') !== false ? 'pdf' : 'png';

            return response($fileData)
                ->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="soporte_'.$id.'.'.$ext.'"');
        }

        abort(404);
    }

    public function update2(Request $request, $id)
    {
        $restriccion = DB::table('solicitudes')->where('id', '=', $id)->value('placa');
        if (is_null($restriccion)) {
            return back()->with('error', 'Debe asignar primero un veh├¡culo');
        }
        $dataOrigen = request()->only(['oriuser', 'oridate', 'orinote']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataOrigen);

        return back()->with('success', 'ok');
    }

    public function update3(Request $request, $id)
    {
        $restriccion = DB::table('solicitudes')->where('id', '=', $id)->value('oridate');
        if (is_null($restriccion)) {
            return back()->with('error', 'Debe registrar primero el evento de llegada a origen');
        }
        if (strtotime($restriccion) >= strtotime($request->saldate)) {
            return back()->with('error', 'La fecha del evento de salida debe ser mayor a la fecha del evento de llegada a origen');
        }
        $dataSalida = $request->only(['saluser', 'saldate', 'salnote']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataSalida);

        return back()->with('success', 'ok');
    }

    public function update4(Request $request, $id)
    {
        $restriccion = DB::table('solicitudes')->where('id', '=', $id)->value('saldate');
        if (is_null($restriccion)) {
            return back()->with('error', 'Debe registrar primero el evento de salida');
        }
        if (strtotime($restriccion) >= strtotime($request->desdate)) {
            return back()->with('error', 'La fecha del evento de llegada a destino debe ser mayor a la fecha del evento de salida');
        }
        $dataDestino = request()->only(['desuser', 'desdate', 'desnote']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataDestino);

        return back()->with('success', 'ok');
    }

    public function update5(Request $request, $id)
    {
        $request->validate([
            'finnote' => 'required|string',
            'responsable' => 'required|string',
            'cte' => 'required',
            'ays' => 'required',
        ], [
            'finnote.required' => 'El campo de nota de finalizacion de servicio es obligatorio.',
            'responsable.required' => 'El campo de responsable es obligatorio.',
            'cte.required' => 'La calificacion de tiempos de entrega es obligatoria.',
            'ays.required' => 'La calificacion de atencion y servicio es obligatoria.',
        ]);

        $incluidos = ['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.'];

        $restricciones = DB::table('solicitudes')
            ->where('id', '=', $id)
            ->select('remesa', 'radicado', 'retorno', 'razon', 'paytype', 'confirmado', 'nota_cumplido', 'avalado', 'fecha_solicitud', 'cliente', 'fecha_descargue')
            ->first();

        // ValidaciÃ³n: Tiempo transcurrido desde fecha_descargue (3 dÃ­as general, 5 dÃ­as SIMONIZ SA)
        if ($restricciones->fecha_descargue) {
            $fechaDescargue = Carbon::parse($restricciones->fecha_descargue)->startOfDay();
            $hoy = Carbon::now()->startOfDay();
            $diasPasados = $fechaDescargue->diffInDays($hoy);

            $diasRequeridos = ($restricciones->cliente === 'SIMONIZ SA') ? 5 : 3;

            if ($diasPasados < $diasRequeridos) {
                return back()->with('error', "No se puede finalizar el servicio. Deben pasar al menos {$diasRequeridos} dÃ­as calendario desde la fecha de descargue ({$restricciones->fecha_descargue}).");
            }
        } else {
            return back()->with('error', 'Debe registrar la fecha de descargue para poder finalizar el servicio.');
        }

        // Validacion: paytype no puede ser NULL
        if (is_null($restricciones->paytype)) {
            return back()->with('error', 'Debe haber una condicion de pago para poder cerrar el caso.');
        }

        // Validacion: otros campos requeridos
        if (
            is_null($restricciones->remesa) ||
            is_null($restricciones->radicado) ||
            is_null($restricciones->retorno) ||
            is_null($restricciones->razon) ||
            is_null($restricciones->nota_cumplido)
        ) {
            return back()->with('error', 'Los campos pedido, remesa, manifiesto, radicado y nota cumplido (campo despu├®s de tr├ífico) no pueden estar vac├¡os.');
        }

        // Validacion para pagos anticipados: deben estar confirmados
        if (in_array($restricciones->paytype, $incluidos)) {
            if ($restricciones->confirmado !== 'SI') {
                return back()->with('error', 'El anticipo debe estar confirmado para poder cerrar el caso.');
            }
        }

        // SUSPENDIDO TEMPORALMENTE - Validacion de Aprobacion (Paso 5)
        // Se suspende mientras se decide si esta restriccion es funcional o no.
        // if (!$restricciones->avalado) {
        //     $fechaSolicitud = Carbon::parse($restricciones->fecha_solicitud);
        //     // diffInDays devuelve la diferencia absoluta en d├¡as
        //     if ($fechaSolicitud->diffInDays(now()) >= 5) {
        //         // Aprobar autom├íticamente
        //         DB::table('solicitudes')->where('id', $id)->update([
        //             'avalado' => true,
        //             'usercc' => 'auto',
        //             'datecc' => now()
        //         ]);
        //     } else {
        //         return back()->with('error', 'Solicitud sin aprobacion, solicite la aprobacion o espere 5 d├¡as calendario para cerrar el caso.');
        //     }
        // }

        // Actualizar los datos de cierre
        $dataFinal = $request->only(['finuser', 'findate', 'finnote', 'responsable', 'cte', 'ays', 'nota_cierre']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal);

        return back()->with('success', 'Caso cerrado correctamente.');
    }

    public function update6(Request $request, $id)
    {
        $dataFinal = request()->only(['canuser', 'candate', 'cannote', 'cannotes', 'responsable']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal);

        // Eliminar registros asociados en la tabla estatus
        DB::table('estatus')->where('id', '=', $id)->delete();

        return back()->with('success', 'ok');
    }

    public function update7(Request $request, $id)
    {
        $dataFinal = request()->only(['caruser', 'cardate', 'carnote']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal);

        return back()->with('success', 'ok');
    }

    public function update8(Request $request, $id)
    {
        $dataFinal = request()->only(['trauser', 'tradate', 'tranote']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal);

        return back()->with('success', 'ok');
    }

    public function update9(Request $request, $id)
    {
        $dataFinal = request()->only(['antuser', 'antdate', 'antnote']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal);

        return back()->with('success', 'ok');
    }

    public function update10($id, Request $request)
    {
        DB::table('solicitudes')
            ->where('id', $id)
            ->update([
                'oriuser' => $request->oriuser,
                'oridate' => $request->oridate,
                'saluser' => $request->saluser,
                'saldate' => $request->saldate,
                'desuser' => $request->desuser,
                'desdate' => $request->desdate,
                'finuser' => $request->finuser,
                'findate' => $request->findate,
                'finnote' => $request->finnote,

            ]);

        return back()->with('success', 'ok');
    }

    public function update11(Request $request, Solicitud $solicitud)
    {
        if ($request->ajax()) {
            if ($request->name != 'monto_seguro' && $request->name != 'monto_costo') {
                $value = str_replace('.', '', $request->value);
                DB::table('estatus')->where('ide', $request->pk)->update([$request->name => $value]);
            } else {
                DB::table('estatus')->where('ide', $request->pk)->update([$request->name => $request->value]);
            }

            return response()->json(['success' => true]);
        }
    }

    public function update12(Request $request, $ide)
    {
        try {
            $diario = DB::table('estatus')->where('ide', $ide)->first();
            if (! $diario) {
                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
            }

            $fechaActual = Carbon::now()->toDateString(); // formato YYYY-MM-DD

            DB::table('estatus')
                ->where('ide', $ide)
                ->update([
                    'facturar' => $request->input('facturar', 'SI'),
                    'ffacturar' => $fechaActual,
                ]);

            return response()->json([
                'success' => true,
                'fecha' => $fechaActual, // enviamos la fecha al frontend
            ]);
        } catch (\Exception $e) {
            Log::error('Error actualizando el registro: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Ocurrio un error: '.$e->getMessage(),
            ], 500);
        }
    }

    public function update13(Request $request, $id)
    {
        $dataFinal13 = request()->only(['recibido_cumplido', 'fecha_envio']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal13);

        return back()->with('success', 'ok');
    }

    public function update14(Request $request, $id)
    {
        try {
            // Obt├®n el registro original antes de la actualizacion
            $diario = DB::table('peticiones')->where('id', $id)->first();
            if (! $diario) {
                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
            }

            // Validar que los campos de anticipo estén completos
            if (empty($diario->pagant) || empty($diario->cpagant) || empty($diario->tpagant)) {
                return response()->json(['success' => false, 'message' => 'datos incompletos del receptor del anticipo'], 400);
            }

            // Actualiza el campo "enviado"
            DB::table('solicitudes')
                ->where('id', $id)
                ->update(['enviado' => $request->input('enviado', 'SI')]);

            // Inserta el registro en la tabla solicitudes_logs
            DB::table('solicitudes_logs')->insert([
                'solicitud_id' => $id, // ID de la solicitud
                'user_id' => auth()->id(), // Usuario autenticado
                'campo' => 'enviado', // Nombre del campo actualizado
                'razon' => $diario->razon, // Razon del campo original
                'ip_address' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
                'created_at' => now(), // Fecha y hora del evento
                'updated_at' => now(), // Fecha y hora del evento
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Registra cualquier error en los logs
            Log::error('Error actualizando el registro: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Ocurrio un error: '.$e->getMessage(),
            ], 500);
        }
    }

    public function update15(Request $request, $id)
    {
        $dataFinal15 = request()->only(['egreso_anticipo', 'egreso_saldo', 'fecha_saldo']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal15);

        return back()->with('success', 'ok');
    }

    public function update16(Request $request, $id)
    {
        try {
            // Obt├®n el registro original antes de la actualizacion
            $diario = DB::table('peticiones')->where('id', $id)->first();
            if (! $diario) {
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
                'razon' => $diario->razon, // Razon asociada al registro original
                'ip_address' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Registrar cualquier error en los logs
            Log::error('Error actualizando el registro: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Ocurrio un error: '.$e->getMessage(),
            ], 500);
        }
    }

    public function update17(Request $request, $id)
    {
        $request->validate([
            'placa' => 'required',
            'lpo' => 'required',
        ], [
            'placa.required' => 'El campo placa es obligatorio.',
            'lpo.required' => 'La calificacion del listado pre-operacional es obligatoria.',
        ]);

        $dataFinal17 = request()->only(['plauser', 'placa', 'lpo', 'nota_lpo']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal17);

        return back()->with('success', 'ok');
    }

    public function toggleTrafico(Request $request, $id)
    {
        $solicitud = DB::table('solicitudes')->where('id', $id)->first();
        if ($solicitud) {
            $nuevoValor = $solicitud->trafico == 1 ? 0 : 1;
            DB::table('solicitudes')->where('id', $id)->update(['trafico' => $nuevoValor]);

            if ($request->ajax()) {
                return response()->json(['success' => true, 'nuevoValor' => $nuevoValor]);
            }

            return redirect()->back()->with('success', 'El valor del campo trafico ha sido actualizado.');
        }

        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Solicitud no encontrada.']);
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
        $year = (int) $request->input('year', Carbon::now()->year);
        $month = (int) $request->input('month', Carbon::now()->month);

        $diarias = DB::table('logs')
            ->whereRaw('EXTRACT(YEAR FROM fecha_evento::timestamp) = ?', [$year])
            ->whereRaw('EXTRACT(MONTH FROM fecha_evento::timestamp) = ?', [$month])
            ->orderBy('fecha_evento', 'desc')
            ->get();

        $years = DB::table('logs')
            ->selectRaw('DISTINCT EXTRACT(YEAR FROM fecha_evento::timestamp) AS year')
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn ($y) => (int) $y);

        $months = DB::table('logs')
            ->selectRaw('DISTINCT EXTRACT(MONTH FROM fecha_evento::timestamp) AS month')
            ->whereRaw('EXTRACT(YEAR FROM fecha_evento::timestamp) = ?', [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn ($m) => (int) $m);

        return view('Solicitud.logs', compact('diarias', 'years', 'months', 'year', 'month'));
    }

    public function aprobar(Request $request, $id)
    {
        if ($request->ajax()) {
            $solicitud = DB::table('solicitudes')->where('id', $id)->first();
            if ($solicitud) {
                if (! $solicitud->avalado) {
                    DB::table('solicitudes')
                        ->where('id', $id)
                        ->update([
                            'avalado' => true,
                            'usercc' => Auth::user()->name,
                            'datecc' => Carbon::now(),
                        ]);

                    return response()->json(['success' => true]);
                }

                return response()->json(['success' => false, 'message' => 'Ya fue aprobado']);
            }

            return response()->json(['success' => false, 'message' => 'Solicitud no encontrada']);
        }

        return response()->json(['success' => false, 'message' => 'Peticion inv├ílida']);
    }

    public function verificar(Request $request, $id)
    {
        if ($request->ajax()) {
            $solicitud = DB::table('solicitudes')->where('id', $id)->first();
            if ($solicitud) {
                if (! $solicitud->verificado) {
                    DB::table('solicitudes')
                        ->where('id', $id)
                        ->update([
                            'verificado' => true,
                            'fecha_envio' => \Carbon\Carbon::now(),
                        ]);

                    return response()->json(['success' => true]);
                }

                return response()->json(['success' => false, 'message' => 'Ya fue verificado']);
            }

            return response()->json(['success' => false, 'message' => 'Solicitud no encontrada']);
        }

        return response()->json(['success' => false, 'message' => 'Peticion inv├ílida']);
    }
    private function obtenerSiguienteConsecutivo($menu)
    {
        $fecha = Carbon::now('America/Bogota')->toDateString();

        return DB::transaction(function () use ($menu, $fecha) {
            $registro = DB::table('consecutivos_planos')
                ->where('menu', $menu)
                ->where('fecha', $fecha)
                ->lockForUpdate()
                ->first();

            if ($registro) {
                $siguiente = ($registro->ultimo_valor % 99) + 1;
                DB::table('consecutivos_planos')
                    ->where('id', $registro->id)
                    ->update([
                        'ultimo_valor' => $siguiente,
                        'updated_at' => Carbon::now('America/Bogota'),
                    ]);

                return $siguiente;
            }

            DB::table('consecutivos_planos')->insert([
                'menu' => $menu,
                'fecha' => $fecha,
                'ultimo_valor' => 1,
                'created_at' => Carbon::now('America/Bogota'),
                'updated_at' => Carbon::now('America/Bogota'),
            ]);

            return 1;
        });
    }
}
