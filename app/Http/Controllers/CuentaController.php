<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CuentasImport;
use App\Exports\CuentasExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CuentaController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el último año y mes disponibles en la tabla infoestatus
        $ultimoRegistro = DB::table('cuentas')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
            ->orderBy('created_at', 'desc')
            ->first();

        // Establecer valores predeterminados basados en el último registro
        $defaultYear = $ultimoRegistro->year ?? Carbon::now()->year;
        $defaultMonth = $ultimoRegistro->month ?? Carbon::now()->month;

        // Obtener el año y mes desde la solicitud o usar los valores predeterminados
        $year = $request->input('year', $defaultYear);
        $month = $request->input('month', $defaultMonth);

        $cuentas = DB::table('cuentas')
            ->select('guia', 'valor', 'factura', 'usuario', 'created_at')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('created_at', 'desc')
            ->get();

        $years = DB::table('cuentas')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $months = DB::table('cuentas')
            ->selectRaw('MONTH(created_at) as month')
            ->whereYear('created_at', $year)
            ->distinct()
            ->orderBy('month', 'asc')
            ->pluck('month');

        return view('Cuenta.index', compact('cuentas', 'years', 'months', 'year', 'month'));

        //$cuentas = Cuenta::select('guia', 'valor', 'factura', 'usuario', 'created_at')->get();
        //return view('Cuenta.index', compact('cuentas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|mimes:xlsx,xls',
        ]);

        try {
            $import = new CuentasImport();
            Excel::import($import, $request->file('archivo'));
            $data = $import->getData();

            // Arrays para los mensajes finales
            $nuevos = [];
            $actualizados = [];
            $duplicados = [];

            foreach ($data as $row) {
                $guia = $row['guia'] ?? null;
                $factura = $row['factura'] ?? null;
                $valorOriginal = $row['valor'] ?? 0;

                if (!$guia || !$factura) {
                    continue; // O manejar error por fila
                }

                // Formatear el valor
                if (is_string($valorOriginal)) {
                    $valorFormateado = str_replace(',', '.', $valorOriginal);
                } else {
                    $valorFormateado = $valorOriginal;
                }
                $valorNumerico = is_numeric($valorFormateado) ? floatval($valorFormateado) : 0;
                $valorRedondeado = (int)round($valorNumerico, 0, PHP_ROUND_HALF_UP);

                // Buscar si existe una fila con guia + factura
                $registroExistente = Cuenta::where('guia', $guia)
                    ->where('factura', $factura)
                    ->first();

                if ($registroExistente) {
                    if ((int)$registroExistente->valor === $valorRedondeado) {
                        // 4. Todo igual → ignorar
                        $duplicados[] = "Guía: $guia, Factura: $factura";
                    } else {
                        // 2. Guia y factura coinciden, pero valor diferente → actualizar
                        $registroExistente->update(['valor' => $valorRedondeado]);
                        $actualizados[] = "Guía: $guia, Factura: $factura (Valor actualizado a $valorRedondeado)";
                    }
                } else {
                    // Verificar si la guía existe pero con otra factura
                    $guiaExiste = Cuenta::where('guia', $guia)->exists();

                    if ($guiaExiste) {
                        // 3. Guía existe pero con factura diferente → insertar nuevo
                        Cuenta::create([
                            'guia' => $guia,
                            'valor' => $valorRedondeado,
                            'factura' => $factura,
                            'usuario' => Auth::user()->name,
                        ]);
                        $nuevos[] = "Guía: $guia, Factura: $factura (Diferente factura, insertado)";
                    } else {
                        // 1. No existe → insertar
                        Cuenta::create([
                            'guia' => $guia,
                            'valor' => $valorRedondeado,
                            'factura' => $factura,
                            'usuario' => Auth::user()->name,
                        ]);
                        $nuevos[] = "Guía: $guia, Factura: $factura";
                    }
                }
            }

            // Construir mensaje final
            $mensaje = '';

            if (!empty($nuevos)) {
                $mensaje .= 'Se cargaron correctamente: ' . implode('; ', $nuevos) . '. ';
            }

            if (!empty($actualizados)) {
                $mensaje .= 'Se actualizaron: ' . implode('; ', $actualizados) . '. ';
            }

            if (!empty($duplicados)) {
                $mensaje .= 'Ya existían y no se cargaron: ' . implode('; ', $duplicados) . '.';
            }

            if (empty($nuevos) && empty($actualizados) && empty($duplicados)) {
                $mensaje = 'No se procesaron registros.';
            }

            return back()->with('message', $mensaje);
        } catch (\Exception $e) {
            return back()->withErrors(['archivo' => 'Error al procesar el archivo: ' . $e->getMessage()]);
        }
    }

    public function facturar(Request $request)
    {
        $monthYear = $request->input('month_year'); // Formato esperado: YYYY-MM

        // Validar que el formato sea correcto
        if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $monthYear)) {
            return redirect()->back()->withErrors(['month_year' => 'Formato de mes y año inválido']);
        }

        // Separar año y mes
        [$year, $month] = explode('-', $monthYear);

        // Verificar que los valores sean válidos
        if (!checkdate($month, 1, $year)) {
            return redirect()->back()->withErrors(['month_year' => 'Fecha inválida']);
        }

        // Generar el nombre del archivo dinámicamente
        $filename = 'cargues_factura_' . $year . '_' . str_pad($month, 2, '0', STR_PAD_LEFT) . '.xlsx';

        // Descargar el archivo usando los parámetros
        return Excel::download(new CuentasExport($year, $month), $filename);
        //return Excel::download(new CuentasExport, 'guiasconfactura.xlsx');
    }
}
