<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\LocalesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FacturaExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GleController extends Controller
{
    public function index(Request $request)
    {
        $ultimoRegistro = DB::table('locales')
            ->select('año', 'mes')
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->first();

        $defaultYear = $ultimoRegistro ? $ultimoRegistro->año : Carbon::now()->year;
        $defaultMonth = $ultimoRegistro ? $ultimoRegistro->mes : Carbon::now()->month;

        $year = $request->input('year', $defaultYear);
        $month = $request->input('month', $defaultMonth);

        // Filtros adicionales (multiples)
        $operador = $request->input('operador');
        $clientesSeleccionados = $request->input('cliente'); // Array de clientes seleccionados
        //$trayecto = $request->input('trayecto');     
        $facturaFiltro = $request->input('factura'); // Nuevo filtro de factura

        // Consulta base
        $query = DB::table('locales')->where('año', $year)->where('mes', $month);

        // Aplicar filtros
        if ($operador) {
            $query->where('operador', $operador);
        }
        if ($clientesSeleccionados && is_array($clientesSeleccionados)) {
            $query->whereIn('cliente', $clientesSeleccionados);
        }
        /* if ($trayecto) {
            $query->where('trayecto', $trayecto);
        }  */
        if ($facturaFiltro === 'si') {
            $query->where('factura', '!=', 0); // Filtrar registros donde factura != 0
        } elseif ($facturaFiltro === 'no') {
            $query->where('factura', '=', 0); // Filtrar registros donde factura == 0
        }

        // Obtener todos los registros sin paginar para cálculos
        $localesSinPaginar = $query->get();

        // Cálculos del resumen
        $cantidadGuias = $localesSinPaginar->count();
        $valorTotalFacturado = $localesSinPaginar->where('factura', '!=', 0)->sum('total');
        $valorTotalSinFacturar = $localesSinPaginar->where('factura', '=', 0)->sum('original');
        $valorTotal = $valorTotalFacturado + $valorTotalSinFacturar;

        // Aplicar la paginación
        $locales = $query->orderBy('operador')->paginate(118);

        // Si no hay clientes seleccionados, inicializar como un array vacío
        $clientesSeleccionados = $clientesSeleccionados ?? [];

        // Datos para los selects
        $years = DB::table('locales')->select('año as year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $months = DB::table('locales')->select('mes as month')->where('año', $year)->distinct()->orderBy('month', 'asc')->pluck('month');
        $operadores = DB::table('locales')->select('operador')->distinct()->where('año', $year)->where('mes', $month)->orderBy('operador')->pluck('operador');
        $clientes = DB::table('locales')->select('cliente')->distinct()->where('año', $year)->where('mes', $month)->orderBy('cliente')->pluck('cliente');

        // Capturar el valor del input de búsqueda
        $searchTerm = $request->input('lafactura');

        // Consulta base para facturas
        $queryFacturas = DB::table('facturas');

        // Aplicar filtro de búsqueda si existe un término
        if ($searchTerm) {
            $queryFacturas->where(function ($q) use ($searchTerm) {
                $q->where('factura', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('cliente', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        // Paginar los resultados de las facturas
        $facturas = $queryFacturas->where('factura', '!=', 0)->orderBy('año', 'desc')->orderBy('mes', 'desc')->paginate(100);
        $añios = DB::table('facturas')->select('año')->distinct()->orderBy('año', 'desc')->pluck('año');
        $meises = DB::table('facturas')->select('mes')->distinct()->orderBy('mes')->pluck('mes');
        //$trayectos = DB::table('locales')->select('trayecto')->distinct()->where('año', $year)->where('mes', $month)->orderBy('trayecto')->pluck('trayecto');

        return view('Gle.index', compact(
            'locales',
            'years',
            'months',
            'operadores',
            'clientes',
            //'trayectos',
            'year',
            'month',
            'operador',
            'clientesSeleccionados',
            //'trayecto',
            'facturaFiltro',
            'cantidadGuias',
            'valorTotal',
            'valorTotalFacturado',
            'valorTotalSinFacturar',
            'defaultYear',
            'defaultMonth',
            'facturas',
            'añios',
            'meises'
        ));
    }

    public function buscarPorGuia(Request $request)
    {
        $guiaBusqueda = $request->input('guia');

        $query = DB::table('locales'); // Sin filtro de año/mes

        if ($guiaBusqueda) {
            $query->where('guia', 'like', '%' . $guiaBusqueda . '%');
        }

        $locales = $query->orderBy('operador')->get();

        return response()->json([
            'html' => view('partials.gle-table', compact('locales'))->render(),
        ]);
    }

    public function exportToExcel(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');
        $operador = $request->input('operador');
        $clientesSeleccionados = $request->input('cliente');
        $facturaFiltro = $request->input('factura');
        $guiaBusqueda = $request->input('guia');

        return Excel::download(new LocalesExport(
            $year,
            $month,
            $operador,
            $clientesSeleccionados,
            $facturaFiltro,
            $guiaBusqueda
        ), 'facturacion.xlsx');
    }

    public function procesarGuias(Request $request)
    {
        $fields = [
            'archivo' => 'required|max:10000|mimes:xlsx'
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido'
        ];
        $this->validate($request, $fields, $message);

        $archivo = $request->file('archivo');

        try {
            $datosArchivo = Excel::toArray([], $archivo);
            $filasEstatus = array_slice($datosArchivo[0], 1); // Ignoramos encabezado

            $actualizadas = 0;
            $insertadas = 0;

            foreach ($filasEstatus as $fila) {
                // Validamos que haya al menos 3 columnas (guia, factura, total)
                if (count($fila) < 3) continue;

                $guia = trim((string)$fila[0]);
                $total = trim((string)$fila[1]);
                $factura = trim($fila[2]);

                // Convertir total a número si es posible
                if (!is_numeric($total)) continue; // Saltar filas con total inválido
                $total = (int)$total;

                // Buscar registros existentes
                $registroExistente = DB::table('facs')
                    ->where('guia', $guia)
                    ->where('factura', $factura)
                    ->first();

                if ($registroExistente) {
                    // Ya existe guía y factura
                    if ((int)$registroExistente->total === $total) {
                        // Total también coincide → No se hace nada
                        continue;
                    } else {
                        // Total es diferente → Actualizar solo el total
                        DB::table('facs')
                            ->where('guia', $guia)
                            ->where('factura', $factura)
                            ->update([
                                'total' => $total
                            ]);
                        $actualizadas++;
                    }
                } else {
                    // Verificar si ya existe esta guía con otra factura
                    $existeGuiaConOtraFactura = DB::table('facs')
                        ->where('guia', $guia)
                        ->exists();

                    if (!$existeGuiaConOtraFactura) {
                        // Guía nueva → Insertar normalmente
                        DB::table('facs')->insert([
                            'guia' => $guia,
                            'total' => $total,
                            'factura' => $factura,                            
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                        $insertadas++;
                    } else {
                        // Guía ya existe con otra factura → Se permite insertar nuevo registro
                        DB::table('facs')->insert([
                            'guia' => $guia,
                            'total' => $total,
                            'factura' => $factura,                            
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                        $insertadas++;
                    }
                }
            }

            if ($actualizadas > 0 || $insertadas > 0) {
                $mensaje = '';
                if ($actualizadas > 0) {
                    $mensaje .= $actualizadas . ' registro(s) actualizado(s). ';
                }
                if ($insertadas > 0) {
                    $mensaje .= $insertadas . ' registro(s) insertado(s).';
                }
                return redirect()->back()->with('success', $mensaje);
            } else {
                return redirect()->back()->with('error', 'Los valores ya existen en la base de datos.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error: ' . $e->getMessage());
        }
    }

    public function procesarSiigo(Request $request)
    {
        $request->validate([
            'documento' => 'required|file|mimes:xlsx|max:10000',
        ], [
            'documento.required' => 'El archivo es obligatorio.',
            'documento.mimes' => 'Solo se permiten archivos .xlsx.',
        ]);

        $documento = $request->file('documento');
        $insertadas = 0;
        $actualizadas = 0;

        try {
            // Leer el archivo Excel
            $datosDocumento = Excel::toArray([], $documento);
            $filas = array_slice($datosDocumento[0], 1); // Ignorar la cabecera

            foreach ($filas as $fila) {
                // Limpiar y validar datos
                $factura = trim($fila[0] ?? '');
                $fecha_siigo = trim($fila[1] ?? '');
                $valor_siigo = trim($fila[2] ?? '');

                // Validar que haya datos mínimos
                if (empty($factura) || empty($fecha_siigo) || !is_numeric($valor_siigo)) {
                    continue;
                }

                // Convertir a formato de fecha válido
                try {
                    $fecha_siigo = \Carbon\Carbon::createFromFormat('Y-m-d', $fecha_siigo)->format('Y-m-d');
                } catch (\Exception $e) {
                    Log::warning("Fecha inválida para factura: $factura - $fecha_siigo");
                    continue;
                }

                // Verificar si la factura ya existe
                $registro = DB::table('siigos')->where('factura', $factura)->first();

                if (!$registro) {
                    // Insertar nuevo registro
                    DB::table('siigos')->insert([
                        'factura' => $factura,
                        'fecha_siigo' => $fecha_siigo,
                        'valor_siigo' => (int)$valor_siigo,
                    ]);
                    $insertadas++;
                } else {
                    // Comprobar si hay cambios antes de actualizar
                    $hayCambios = $registro->fecha_siigo != $fecha_siigo || $registro->valor_siigo != $valor_siigo;

                    if ($hayCambios) {
                        DB::table('siigos')
                            ->where('factura', $factura)
                            ->update([
                                'fecha_siigo' => $fecha_siigo,
                                'valor_siigo' => (int)$valor_siigo,
                            ]);
                        $actualizadas++;
                    }
                }
            }

            // Mensaje de resultado            
            $mensaje = [];

            if ($insertadas > 0) {
                $mensaje[] = "$insertadas nuevos registros insertados.";
            }

            if ($actualizadas > 0) {
                $mensaje[] = "$actualizadas registros actualizados.";
            }

            if ($insertadas === 0 && $actualizadas === 0) {
                $mensaje[] = "0 registros actualizados.";
            }
            return redirect()->back()->with('success', implode(' ', $mensaje));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al procesar el archivo: ' . $e->getMessage());
        }
    }

    public function exportFacturas(Request $request)
    {
        $añio = $request->input('añio');
        $meis = $request->input('meis');

        return Excel::download(new FacturaExport($añio, $meis), "reporte_facturas_{$añio}_{$meis}.xlsx");
    }
}
