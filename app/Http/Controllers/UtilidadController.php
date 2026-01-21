<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteExport;
use Carbon\Carbon;

class UtilidadController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el último año y mes disponibles en la tabla `masas`
        $ultimoRegistro = DB::table('utiles')
            ->select('AÑO', 'MES')
            ->orderBy('AÑO', 'desc')
            ->orderBy('MES', 'desc')
            ->first();

        // Valores predeterminados basados en el último registro
        $defaultYear = $ultimoRegistro->AÑO ?? Carbon::now()->year;
        $defaultMonth = $ultimoRegistro->MES ?? Carbon::now()->month;

        // Obtener el año y mes desde la solicitud o usar los valores predeterminados
        $year = $request->input('year', $defaultYear);
        $month = $request->input('month', $defaultMonth);

        // Obtener años disponibles en la tabla `masas`
        $years = DB::table('utiles')->select('AÑO as year')->distinct()->orderBy('year', 'desc')->pluck('year');

        // Obtener meses disponibles para el año seleccionado
        $months = DB::table('utiles')->select('MES as month')->where('AÑO', $year)->distinct()->orderBy('month', 'asc')->pluck('month');

        // Consultar los datos para la tabla y los selects
        $operadores = DB::table('utiles')->select('TRANSPORTADORA')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('TRANSPORTADORA')->get();
        $clientes = DB::table('utiles')->select('CLIENTE')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('CLIENTE')->get();
        $origenes = DB::table('utiles')->select('ORIGEN')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('ORIGEN')->get();
        $destinos = DB::table('utiles')->select('DESTINO')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('DESTINO')->get();
        $utiles = DB::table('utiles')->where('AÑO', $year)->where('MES', $month)->orderBy('TRANSPORTADORA')->get();
        $trayectos = DB::table('utiles')->select('TIPO_TRAYECTO')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('TIPO_TRAYECTO')->get();

        return view('Utilidad.index', compact('utiles', 'operadores', 'clientes', 'origenes', 'destinos', 'years', 'months', 'year', 'month', 'trayectos'));
    }

    public function indice(Request $request)
    {
        // Obtener el último año y mes disponibles en la tabla `masa`
        $ultimoRegistro = DB::table('masas')
            ->select('AÑO', 'MES')
            ->orderBy('AÑO', 'desc')
            ->orderBy('MES', 'desc')
            ->first();

        // Valores predeterminados basados en el último registro
        $defaultYear = $ultimoRegistro->AÑO ?? Carbon::now()->year;
        $defaultMonth = $ultimoRegistro->MES ?? Carbon::now()->month;

        // Obtener el año y mes desde la solicitud o usar los valores predeterminados
        $year = $request->input('year', $defaultYear);
        $month = $request->input('month', $defaultMonth);

        // Obtener años disponibles en la tabla `masa`
        $years = DB::table('masas')->select('AÑO as year')->distinct()->orderBy('year', 'desc')->pluck('year');

        // Obtener meses disponibles para el año seleccionado
        $months = DB::table('masas')->select('MES as month')->where('AÑO', $year)->distinct()->orderBy('month', 'asc')->pluck('month');

        // Consultar los datos para la tabla y los selects
        $operadores = DB::table('masas')->select('TRANSPORTADORA')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('TRANSPORTADORA')->get();
        $clientes = DB::table('masas')->select('CLIENTE')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('CLIENTE')->get();
        $origenes = DB::table('masas')->select('ORIGEN')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('ORIGEN')->get();
        $destinos = DB::table('masas')->select('DESTINO')->distinct()->where('AÑO', $year)->where('MES', $month)->orderBy('DESTINO')->get();
        $utiles = DB::table('masas')->where('AÑO', $year)->where('MES', $month)->orderBy('TRANSPORTADORA')->get();

        return view('Utilidad.indice', compact('utiles', 'operadores', 'clientes', 'origenes', 'destinos', 'years', 'months', 'year', 'month'));
    }

    public function informe()
    {
        // Obtener años y meses disponibles (orden descendente)
        $periodosDisponibles = DB::table('detalles')
            ->select('anio', 'mes')
            ->distinct()
            ->orderByDesc('anio')
            ->orderByDesc('mes')
            ->get()
            ->map(function ($item) {
                $item->mes_nombre = $this->mesEnEspanol($item->mes);
                $item->periodo_label = $item->anio . ' - ' . $item->mes_nombre;
                return $item;
            });

        // Último período disponible (año y mes)
        $ultimoPeriodo = $periodosDisponibles->first();
        $anioActual = $ultimoPeriodo ? $ultimoPeriodo->anio : null;
        $mesActual = $ultimoPeriodo ? $ultimoPeriodo->mes : null;

        // Días y clientes para el último período
        $diasDisponibles = DB::table('detalles')
            ->select('dia')
            ->where('anio', $anioActual)
            ->where('mes', $mesActual)
            ->distinct()
            ->orderBy('dia')
            ->pluck('dia');

        $clientesDisponibles = DB::table('detalles')
            ->select('cliente')
            ->where('anio', $anioActual)
            ->where('mes', $mesActual)
            ->distinct()
            ->orderBy('cliente')
            ->pluck('cliente');

        // Festivos y adelantos (sin cambios)
        $festivos = ['2024-06-02', /* ... */ '2024-12-29']; // mantén tu lista
        $diarias = DB::table('adelantos')->get();
        $fechaActual = Carbon::now();

        foreach ($diarias as $diario) {
            $diario->fecha_tentativa = $this->calcularFechaTentativa($diario->fecha_envio, 9, $festivos);
            if (
                !is_null($diario->fecha_tentativa) &&
                Carbon::parse($diario->fecha_tentativa)->lt($fechaActual) &&
                $diario->estado_pago !== "PAGADO"
            ) {
                $diario->estado_pago = "PAGO VENCIDO";
            }
        }

        // Agrupar adelantos por año y mes (ej: "2024-9")
        $diarios = collect($diarias)->groupBy(function ($item) {
            return $item->anio . '-' . $item->mes;
        })->map(function ($items, $key) {
            [$anio, $mes] = explode('-', $key);
            return [
                'anio' => (int)$anio,
                'mes' => (int)$mes,
                'manifiestos' => $items->count(),
                'estado_anticipo' => $items->groupBy('estado_anticipo')->map(function ($g) {
                    return [
                        'count' => $g->count(),
                        'anticipo' => $g->sum('anticipo'),
                        'saldo_final' => $g->sum('saldo_final'),
                        'total' => $g->sum('anticipo') + $g->sum('saldo_final'),
                    ];
                }),
                'estado_saldo' => $items->groupBy('estado_saldo')->map(function ($g) {
                    return [
                        'count' => $g->count(),
                        'anticipo' => $g->sum('anticipo'),
                        'saldo_final' => $g->sum('saldo_final'),
                        'total' => $g->sum('anticipo') + $g->sum('saldo_final'),
                    ];
                }),
                'estado_pago' => $items->groupBy('estado_pago')->map(function ($g) {
                    return [
                        'count' => $g->count(),
                        'anticipo' => $g->sum('anticipo'),
                        'saldo_final' => $g->sum('saldo_final'),
                        'total' => $g->sum('anticipo') + $g->sum('saldo_final'),
                    ];
                })
            ];
        });

        return view('Utilidad.informe', compact(
            'periodosDisponibles',
            'anioActual',
            'mesActual',
            'diasDisponibles',
            'clientesDisponibles',
            'diarios'
        ));
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
            if (!in_array($fecha->toDateString(), $festivos)) {
                $contador++;
            }
        }
        return $fecha->toDateString();
    }

    public function obtenerDatosPorAnioMes($anio, $mes)
    {
        $dia = request()->input('dia');
        $cliente = request()->input('cliente');

        $queryCongelado = DB::table('detalles')
            ->select('congelado', DB::raw('SUM(servicios) as total_servicios'), DB::raw('SUM(guias) as total_guias'), DB::raw('SUM(valor_cobrar) as total_valor'))
            ->where('anio', $anio)
            ->where('mes', $mes);

        $queryFacturadoSi = DB::table('detalles')
            ->select('facturado', DB::raw('SUM(servicios) as total_servicios'), DB::raw('SUM(guias) as total_guias'), DB::raw('SUM(valor_cobrar) as total_valor'))
            ->where('anio', $anio)
            ->where('mes', $mes)
            ->where('congelado', 'SI');

        if ($dia) {
            $queryCongelado->where('dia', $dia);
            $queryFacturadoSi->where('dia', $dia);
        }
        if ($cliente) {
            $queryCongelado->where('cliente', $cliente);
            $queryFacturadoSi->where('cliente', $cliente);
        }

        $datosCongelado = $queryCongelado->groupBy('congelado')->get();
        $datosFacturadoSi = $queryFacturadoSi->groupBy('facturado')->get();

        return response()->json([
            'datosCongelado' => $datosCongelado,
            'datosFacturadoSi' => $datosFacturadoSi,
        ]);
    }

    private function mesEnEspanol($mes)
    {
        $meses = [
            1 =>  'enero',
            2 =>  'febrero',
            3 =>  'marzo',
            4 =>  'abril',
            5 =>  'mayo',
            6 =>  'junio',
            7 =>  'julio',
            8 =>  'agosto',
            9 =>  'septiembre',
            10 => 'octubre',
            11 => 'noviembre',
            12 => 'diciembre'
        ];
        return $meses[$mes] ?? '';
    }

    // Método para obtener días y clientes según el mes seleccionado
    public function obtenerDiasClientes($anio, $mes)
    {
        $dias = DB::table('detalles')
            ->select('dia')
            ->where('anio', $anio)
            ->where('mes', $mes)
            ->distinct()
            ->orderBy('dia')
            ->pluck('dia');

        $clientes = DB::table('detalles')
            ->select('cliente')
            ->where('anio', $anio)
            ->where('mes', $mes)
            ->distinct()
            ->orderBy('cliente')
            ->pluck('cliente');

        return response()->json([
            'dias' => $dias,
            'clientes' => $clientes
        ]);
    }

    public function reporte(Request $request)
    {
        // Obtener los clientes y el estado de 'facturado' y 'congelado' de la tabla infoestatus
        $clientes = DB::table('infoestatus')->distinct()->pluck('cliente');
        $congelados = DB::table('infoestatus')->distinct()->pluck('facturar');
        $facturados = ['SI', 'NO']; // Opciones fijas para 'facturado'

        // Si se envían los filtros por fecha, realizamos la consulta
        if ($request->isMethod('post')) {
            // Obtener los valores del formulario (filtros)
            $fecha_inicio = $request->input('fecha_inicio');
            $fecha_fin = $request->input('fecha_fin');
            $cliente = $request->input('cliente');
            $congelado = $request->input('congelado');
            $facturado = $request->input('facturado');

            // Crear la consulta base
            $query = DB::table('infoestatus')
                ->select('id', 'guia', 'razon', 'remesa', 'radicado', 'nit', 'cliente', 'origen', 'destino_final', 'documento_cliente', 'destinatario', 'direccion', 'piezas', 'peso', 'valor_declarado', 'tipo_vehiculo', 'carroceria', 'placa', 'conductor', 'asociado', 'proveedores', 'fecha_cargue', 'causal_mas', 'tipo_servicio', 'costo_flete', 'monto_costo', 'costo_seguro', 'costo_tiposerv', 'costo_cardes', 'costo_auxiliar', 'costo_standby', 'costo_montacarga', 'costo_escolta', 'costo_cs', 'costo_monitoreo', 'costo_estudio', 'costo_ampoliza', 'sobrecosto_op', 'seguros', 'valor_cliente', 'monto_seguro', 'seguro_03', 'valor_sobrecosto', 'valor_servicios', 'valor_cobrar', 'utilidad', 'rentabilidad', 'facturaro', 'plfpli', 'factura_siigo', 'fecha_siigo')
                ->whereBetween('fecha_cargue', [$fecha_inicio, $fecha_fin]);

            // Aplicar filtros adicionales si se proporcionan
            if ($cliente) {
                $query->where('cliente', $cliente);
            }

            if ($congelado) {
                $query->where('facturaro', $congelado);
            }

            // Verificar si el filtro facturado está definido antes de aplicarlo
            if (!is_null($facturado)) {
                if ($facturado == 'SI') {
                    $query->whereNotNull('fecha_siigo'); // Si tiene fecha, es 'SI'
                } elseif ($facturado == 'NO') {
                    $query->whereNull('fecha_siigo'); // Si es NULL, es 'NO'
                }
            }

            // Ejecutar la consulta y obtener los resultados
            $resultados = $query->get();

            // Crear el archivo Excel y descargarlo
            if ($request->has('descargar')) {
                return Excel::download(new ReporteExport($resultados), 'reporte.xlsx');
            }

            // Retornar la vista con los datos
            return view('Utilidad.reporte', compact('clientes', 'congelados', 'facturados', 'resultados'));
        }

        // Retornar la vista con los datos para los filtros
        return view('Utilidad.reporte', compact('clientes', 'congelados', 'facturados'));
    }
}
