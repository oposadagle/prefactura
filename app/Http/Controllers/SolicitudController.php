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
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
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

        // Filtros
        $request = session('data');
        $query = DB::table('peticiones')->whereNotIn('states', $excluidos);

        // Filtrar por ID si se recibe en la solicitud
        $id = request('id');
        if ($id) {
            $query->where('id', $id);
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
        // Último año/mes disponibles en infoestatus (PostgreSQL)
        $ultimoRegistro = DB::table('infoestatus')
            ->selectRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year, EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month")
            ->orderBy('fecha_cargue', 'desc')
            ->first();

        $defaultYear  = isset($ultimoRegistro->year) ? (int) $ultimoRegistro->year : Carbon::now()->year;
        $defaultMonth = isset($ultimoRegistro->month) ? (int) $ultimoRegistro->month : Carbon::now()->month;

        $year  = (int) $request->input('year', $defaultYear);
        $month = (int) $request->input('month', $defaultMonth);

        $diarias = DB::table('peticiones')
            ->whereRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?", [$year])
            ->whereRaw("EXTRACT(MONTH FROM fecha_cargue::timestamp) = ?", [$month])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

        $years = DB::table('peticiones')
            ->selectRaw("DISTINCT EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year")
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn($y) => (int) $y);

        $months = DB::table('peticiones')
            ->selectRaw("DISTINCT EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month")
            ->whereRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?", [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn($m) => (int) $m);

        return view('Solicitud.sac', compact('diarias', 'years', 'months', 'year', 'month'));
    }

    public function anticipo()
    {
        $userName = Auth::user()->name;
        $festivos = ['2025-01-01', '2025-01-05', '2025-01-06', '2025-01-12', '2025-01-19', '2025-01-26', '2025-02-02', '2025-02-09', '2025-02-16', '2025-02-23', '2025-03-02', '2025-03-09', '2025-03-16', '2025-03-23', '2025-03-24', '2025-03-30', '2025-04-06', '2025-04-13', '2025-04-17', '2025-04-18', '2025-04-20', '2025-04-27', '2025-05-01', '2025-05-04', '2025-05-11', '2025-05-18', '2025-05-25', '2025-06-01', '2025-06-02', '2025-06-08', '2025-06-15', '2025-06-22', '2025-06-23', '2025-06-29', '2025-06-30', '2025-07-06', '2025-07-13', '2025-07-20', '2025-07-27', '2025-08-03', '2025-08-07', '2025-08-10', '2025-08-17', '2025-08-18', '2025-08-24', '2025-08-31', '2025-09-07', '2025-09-14', '2025-09-21', '2025-09-28', '2025-10-05', '2025-10-12', '2025-10-13', '2025-10-19', '2025-10-26', '2025-11-02', '2025-11-03', '2025-11-09', '2025-11-16', '2025-11-17', '2025-11-23', '2025-11-30', '2025-12-07', '2025-12-08', '2025-12-14', '2025-12-21', '2025-12-25', '2025-12-28'];
        $incluidos = (['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.']);
        $excluidos = (['Servicio cancelado']);

        $startOfLastMonth = Carbon::now()->subMonth(2)->startOfMonth()->toDateString(); // Inicio del mes anterior
        //$startOfLastMonth = Carbon::now()->subYear(1)->startOfMonth()->toDateString();
        $endOfCurrentMonth = Carbon::now()->endOfMonth()->toDateString(); // Fin del mes actual
        $diarias = DB::table('peticiones')
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

        return view('Solicitud.anticipo', compact('diarias', 'festivos', 'userName'));
    }

    public function anticipos()
    {
        $userName = Auth::user()->name;
        $festivos = ['2025-01-01', '2025-01-05', '2025-01-06', '2025-01-12', '2025-01-19', '2025-01-26', '2025-02-02', '2025-02-09', '2025-02-16', '2025-02-23', '2025-03-02', '2025-03-09', '2025-03-16', '2025-03-23', '2025-03-24', '2025-03-30', '2025-04-06', '2025-04-13', '2025-04-17', '2025-04-18', '2025-04-20', '2025-04-27', '2025-05-01', '2025-05-04', '2025-05-11', '2025-05-18', '2025-05-25', '2025-06-01', '2025-06-02', '2025-06-08', '2025-06-15', '2025-06-22', '2025-06-23', '2025-06-29', '2025-06-30', '2025-07-06', '2025-07-13', '2025-07-20', '2025-07-27', '2025-08-03', '2025-08-07', '2025-08-10', '2025-08-17', '2025-08-18', '2025-08-24', '2025-08-31', '2025-09-07', '2025-09-14', '2025-09-21', '2025-09-28', '2025-10-05', '2025-10-12', '2025-10-13', '2025-10-19', '2025-10-26', '2025-11-02', '2025-11-03', '2025-11-09', '2025-11-16', '2025-11-17', '2025-11-23', '2025-11-30', '2025-12-07', '2025-12-08', '2025-12-14', '2025-12-21', '2025-12-25', '2025-12-28'];
        $incluidos = (['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.']);
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
        $filename = 'estatus_' . $year . '_' . str_pad($month, 2, '0', STR_PAD_LEFT) . '.xlsx';

        // Descargar el archivo usando los parámetros
        return Excel::download(new EstatusExport($year, $month), $filename);
    }

    public function prefacturas(Request $request)
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
        $filename = 'prefactura_' . $year . '_' . str_pad($month, 2, '0', STR_PAD_LEFT) . '.xlsx';

        // Descargar el archivo usando los parámetros
        return Excel::download(new PrefacturasExport($year, $month), $filename);
    }

    public function historico(Request $request)
    {
        // Último año/mes disponibles en infoestatus (PostgreSQL)
        $ultimoRegistro = DB::table('infoestatus')
            ->selectRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year, EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month")
            ->orderBy('fecha_cargue', 'desc')
            ->first();

        $defaultYear  = isset($ultimoRegistro->year) ? (int) $ultimoRegistro->year : Carbon::now()->year;
        $defaultMonth = isset($ultimoRegistro->month) ? (int) $ultimoRegistro->month : Carbon::now()->month;

        $year  = (int) $request->input('year', $defaultYear);
        $month = (int) $request->input('month', $defaultMonth);

        $incluidos = ['Servicio finalizado', 'Servicio cancelado'];

        $diarias = DB::table('peticiones')
            ->whereIn('states', $incluidos)
            ->whereRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?", [$year])
            ->whereRaw("EXTRACT(MONTH FROM fecha_cargue::timestamp) = ?", [$month])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

        $years = DB::table('peticiones')
            ->selectRaw("DISTINCT EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year")
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn($y) => (int) $y);

        $months = DB::table('peticiones')
            ->selectRaw("DISTINCT EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month")
            ->whereRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?", [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn($m) => (int) $m);

        return view('Solicitud.historico', compact('diarias', 'years', 'months', 'year', 'month'));
    }

    public function prefactura(Request $request)
    {
        // Último año/mes disponibles (PostgreSQL)
        $ultimoRegistro = DB::table('infoestatus')
            ->selectRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year, EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month")
            ->orderBy('fecha_cargue', 'desc')
            ->first();

        $defaultYear  = isset($ultimoRegistro->year) ? (int) $ultimoRegistro->year : Carbon::now()->year;
        $defaultMonth = isset($ultimoRegistro->month) ? (int) $ultimoRegistro->month : Carbon::now()->month;

        $year  = (int) $request->input('year', $defaultYear);
        $month = (int) $request->input('month', $defaultMonth);

        $diarias = DB::table('infoestatus')
            ->where('facturar', 'SI')
            ->whereRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?", [$year])
            ->whereRaw("EXTRACT(MONTH FROM fecha_cargue::timestamp) = ?", [$month])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

        $years = DB::table('infoestatus')
            ->selectRaw("DISTINCT EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year")
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn($y) => (int) $y);

        $months = DB::table('infoestatus')
            ->selectRaw("DISTINCT EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month")
            ->whereRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?", [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn($m) => (int) $m);

        return view('Solicitud.prefactura', compact('diarias', 'years', 'months', 'year', 'month'));
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
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString(); // Inicio del mes anterior
        $endOfCurrentMonth = Carbon::now()->endOfMonth()->toDateString(); // Fin del mes actual
        $diarias = DB::table('infoestatus')->where('facturar', 'NO')->whereBetween('fecha_cargue', [$startOfLastMonth, $endOfCurrentMonth])->orderBy('fecha_cargue', 'desc')->get();
        return view('Solicitud.infoestatus', compact('diarias', 'servicios', 'autos', 'causales'));
    }

    public function congelado(Request $request)
    {
        // Obtener los años únicos del campo fecha_cargue
        $years = DB::table('infoestatus')
            ->selectRaw("DISTINCT EXTRACT(YEAR FROM fecha_cargue::timestamp) AS year")
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->map(fn($y) => (int) $y);

        // Determinar año seleccionado (por defecto el último disponible o el actual)
        $defaultYear = $years->first() ?: Carbon::now()->year;
        $year = (int) $request->input('year', $defaultYear);

        // Obtener los meses únicos para el año seleccionado
        $months = DB::table('infoestatus')
            ->selectRaw("DISTINCT EXTRACT(MONTH FROM fecha_cargue::timestamp) AS month")
            ->whereRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?", [$year])
            ->orderBy('month', 'asc')
            ->pluck('month')
            ->map(fn($m) => (int) $m);

        // Determinar mes seleccionado
        // Si el mes solicitado está en la lista de meses disponibles, usarlo.
        // Si no (ej. cambio de año), usar el último mes disponible.
        $requestedMonth = $request->input('month');
        if ($requestedMonth && $months->contains((int)$requestedMonth)) {
            $month = (int)$requestedMonth;
        } else {
            $month = $months->last() ?: Carbon::now()->month;
        }

        // Filtrar por año y mes seleccionados
        $diarias = DB::table('infoestatus')
            ->where('facturar', 'SI')
            ->whereRaw("EXTRACT(YEAR FROM fecha_cargue::timestamp) = ?", [$year])
            ->whereRaw("EXTRACT(MONTH FROM fecha_cargue::timestamp) = ?", [$month])
            ->orderBy('fecha_cargue', 'desc')
            ->get();

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
        // Primero definir la función de limpieza fuera del scope
        $limpiarTexto = function ($texto) {
            if (is_null($texto) || !is_string($texto)) {
                return $texto;
            }

            // Convertir a UTF-8 si no lo está
            if (!mb_check_encoding($texto, 'UTF-8')) {
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
            'archivo' => 'required|max:10000|mimes:xlsx'
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido'
        ];
        $this->validate($request, $fields, $message);

        $archivo = $request->file('archivo');
        $datosArchivo = Excel::toArray([], $archivo);
        $filasEstatus = array_slice($datosArchivo[0], 1);
        
        // Agrupar las filas por ID
        $filasPorId = array_reduce($filasEstatus, function ($carry, $fila) {
            $id = $fila[0];
            if (!isset($carry[$id])) {
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
            $costo = $solicitud ? $solicitud->costo : 0;
            $cliente = $solicitud ? $solicitud->cliente : null;

            foreach ($filas as $index => $fila) {
                try {
                    // Limpiar cada campo usando la función definida
                    $filaLimpia = array_map($limpiarTexto, $fila);

                    // Validar y convertir tipos de datos
                    $filaLimpia[0] = intval($filaLimpia[0]); // ID
                    $filaLimpia[6] = intval($filaLimpia[6]); // Piezas
                    $filaLimpia[7] = floatval($filaLimpia[7]); // Peso
                    $filaLimpia[8] = floatval($filaLimpia[8]); // Valor declarado
                    $filaLimpia[9] = intval($filaLimpia[9]); // PLF-PLI

                    $existeGuia = DB::table('estatus')->where('guia', $filaLimpia[1])->exists();
                    if ($existeGuia) {
                        continue;
                    }

                    $costoFlete = ($index == 0) ? $costo : 0;
                    $valorCliente = 0;

                    if ($cliente === 'CPA DISTRIBUCIONES') {
                        if ($filaLimpia[2] === 'BOGOTA D.C.') {
                            $valorCliente = $filaLimpia[7] * 58;
                        } else {
                            $valorCliente = $filaLimpia[7] * 63;
                        }
                    }

                    if (isset($filaLimpia[0], $filaLimpia[1], $filaLimpia[2], $filaLimpia[3], $filaLimpia[4], $filaLimpia[5], $filaLimpia[6], $filaLimpia[7], $filaLimpia[8], $filaLimpia[9])) {
                        $datos[] = [
                            'id' => $filaLimpia[0],
                            'guia' => $filaLimpia[1],
                            'destino_real' => $filaLimpia[2],
                            'documento_cliente' => $filaLimpia[3],
                            'destinatario' => $filaLimpia[4],
                            'direccion' => $filaLimpia[5],
                            'piezas' => $filaLimpia[6],
                            'peso' => $filaLimpia[7],
                            'valor_declarado' => $filaLimpia[8],
                            'plfpli' => $filaLimpia[9],
                            'costo_flete' => $costoFlete,
                            'valor_cliente' => $valorCliente,
                            'created_at' => Carbon::now()
                        ];
                    } elseif (isset($filaLimpia[0], $filaLimpia[1]) && empty($filaLimpia[2]) && empty($filaLimpia[3]) && empty($filaLimpia[4]) && empty($filaLimpia[5]) && empty($filaLimpia[6]) && empty($filaLimpia[7])) {
                        $solicitud = DB::table('solicitudes')->where('id', $filaLimpia[0])->first();

                        if ($solicitud) {
                            $valorCliente = 0;
                            if ($solicitud->cliente === 'CPA DISTRIBUCIONES') {
                                if ($solicitud->destino === 'BOGOTA D.C.') {
                                    $valorCliente = $solicitud->peso * 58;
                                } else {
                                    $valorCliente = $solicitud->peso * 63;
                                }
                            }

                            $datos[] = [
                                'id' => $filaLimpia[0],
                                'guia' => $filaLimpia[1],
                                'destino_real' => $limpiarTexto($solicitud->destino),
                                'documento_cliente' => $limpiarTexto($solicitud->documento_cliente),
                                'destinatario' => $limpiarTexto($solicitud->destinatario),
                                'direccion' => $limpiarTexto($solicitud->direccion),
                                'piezas' => $solicitud->piezas,
                                'peso' => $solicitud->peso,
                                'valor_declarado' => $solicitud->valor_declarado,
                                'plfpli' => 0,
                                'costo_flete' => $costoFlete,
                                'valor_cliente' => $valorCliente,
                                'created_at' => Carbon::now()
                            ];
                        }
                    }
                } catch (\Exception $e) {
                    // Registrar error pero continuar procesando
                    $errores[] = "Error en fila con ID {$id}, guía {$fila[1]}: " . $e->getMessage();
                    Log::error('Error procesando archivo Excel', [
                        'id' => $id,
                        'guia' => $fila[1],
                        'error' => $e->getMessage(),
                        'fila' => $fila
                    ]);
                    continue;
                }
            }
        }

        $datos = array_filter($datos);
        $cantidadInsertada = count($datos);        

        if ($cantidadInsertada > 0) {
            DB::table('estatus')->insert($datos);

            $mensaje = 'Datos procesados correctamente. Se insertaron ' . $cantidadInsertada . ' registros.';
            if (!empty($errores)) {
                $mensaje .= ' Hubo ' . count($errores) . ' errores durante el procesamiento.';
            }

            return back()->with('success', $mensaje)->with('cantidad', $cantidadInsertada);
        } else {
            return back()->with('warning', 'No se encontraron datos nuevos para procesar');
        }
    }

    public function procesarAnticipos(Request $request)
    {
        // Validar archivo
        $fields = [
            'archivo' => 'required|max:10000|mimes:xlsx'
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido'
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
            // Evitar filas vacías o incompletas
            if (empty($fila[0])) {
                continue; // Saltar si no hay "razon"
            }

            // Asignar variables con control de índices
            $razon = trim($fila[0] ?? '');
            $tipo_pago = trim($fila[1] ?? '');
            $cumplido = trim($fila[2] ?? '');
            $pagar_saldo = trim($fila[3] ?? '');
            $recibido_cumplido = trim($fila[4] ?? '');
            $fecha_envio = trim($fila[5] ?? '');

            // Validar que al menos uno de los campos tenga valor
            if ($tipo_pago === '' && $cumplido === '' && $pagar_saldo === '' && $recibido_cumplido === '' && $fecha_envio === '') {
                continue;
            }

            // Construir array de actualización dinámicamente
            $camposActualizar = [
                'updated_at' => now(),
            ];

            if ($tipo_pago !== '') $camposActualizar['tipo_pago'] = $tipo_pago;
            if ($cumplido !== '') $camposActualizar['cumplido'] = $cumplido;
            if ($pagar_saldo !== '') $camposActualizar['pagar_saldo'] = $pagar_saldo;
            if ($recibido_cumplido !== '') $camposActualizar['recibido_cumplido'] = $recibido_cumplido;
            if ($fecha_envio !== '') $camposActualizar['fecha_envio'] = $fecha_envio;

            // Solo actualizar si hay al menos un campo para modificar
            if (count($camposActualizar) > 1) { // >1 porque 'updated_at' siempre está
                $updated = DB::table('solicitudes')
                    ->where('razon', $razon)
                    ->update($camposActualizar);

                if ($updated) {
                    $cantidad++;
                }
            }

            // Si se actualizó algo, incrementar contador
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
            'archivo' => 'required|max:10000|mimes:xlsx'
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido'
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
                    'fecha_siigo' => $fechaSiigo
                ]);
        }
        $mensaje = $actualizadas . ' registros actualizados correctamente.';
        return redirect()->back()->with('success', $mensaje);
    }

    public function procesarItems(Request $request)
    {
        $fields = [
            'archivo' => 'required|max:10000|mimes:xlsx'
        ];
        $message = [
            'archivo.required' => 'El archivo es requerido'
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
                    'fecha_saldo' => $fecha_saldo
                ]);
        }
        $mensaje = $actualizadas . ' registros actualizados correctamente.';
        return redirect()->back()->with('success', $mensaje);
    }


    public function total(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        // Validar que los valores sean válidos
        if (!checkdate($month, 1, $year)) {
            return redirect()->back()->withErrors(['date' => 'Fecha inválida']);
        }

        // Generar el nombre del archivo dinámicamente
        $filename = 'historicos_' . $year . '_' . str_pad($month, 2, '0', STR_PAD_LEFT) . '.xlsx';

        // Descargar el archivo usando los parámetros
        return Excel::download(new HistoricosExport($year, $month), $filename);
    }

    public function log(Request $request)
    {
        $month = $request->input('month');
        if ($month < 1 || $month > 12) {
            return redirect()->back()->withErrors(['month' => 'Mes inválido']);
        }
        return Excel::download(new LogsExport($month), 'logs_mes_' . $month . '.xlsx');
    }

    public function mastotal(Request $request)
    {
        $month = $request->input('month');
        if ($month < 1 || $month > 12) {
            return redirect()->back()->withErrors(['month' => 'Mes inválido']);
        }
        return Excel::download(new MastotalesExport($month), 'utilidad_masivos_mes_' . $month . '.xlsx');
    }

    public function paqtotal(Request $request)
    {
        $month = $request->input('month');
        if ($month < 1 || $month > 12) {
            return redirect()->back()->withErrors(['month' => 'Mes inválido']);
        }
        return Excel::download(new PaqtotalesExport($month), 'utilidad_paqueteo_mes_' . $month . '.xlsx');
    }

    public function transito()
    {
        return Excel::download(new TransitosExport, 'registros_trafico.xlsx');
    }

    public function servicio(Request $request)
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
        $filename = 'sac_' . $year . '_' . str_pad($month, 2, '0', STR_PAD_LEFT) . '.xlsx';

        // Descargar el archivo usando los parámetros
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
                }
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
                }
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
            'tipo_vehiculo.required' => 'El tipo de vehículo es requerido',
            'tipo_trayecto.required' => 'El tipo de trayecto es requerido',
            'documento_cliente.required' => 'El documento del cliente es requerido',
            'destinatario.required' => 'El destinatario es requerido',
            'direccion.required' => 'La direccion es requerida',
            'piezas.required' => 'El número de piezas es requerido',
            'peso.required' => 'El peso es requerido',
            'valor_declarado.required' => 'El valor declarado es requerido',
        ];

        $validator = validator($request->all(), $fields, $message);
        
        if ($validator->fails()) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        try {
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
                'valor_declarado'
            ]);

            $dataSolicitud['created_at'] = Carbon::now();
            DB::table('solicitudes')->insert($dataSolicitud);

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Solicitud creada correctamente'
                ], 201);
            }

            return back()->with('success', 'Solicitud creada correctamente');
        } catch (\Exception $e) {
            \Log::error('Error al crear solicitud: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Error al guardar la solicitud: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al guardar la solicitud: ' . $e->getMessage())->withInput();
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
            // Obtener el usuario de la sesión actual
            $usuarioSesion = auth()->user()->name; // Ajusta según tu modelo de usuario

            // Manejar el campo 'costo'
            if ($request->name === 'costo') {
                $value = str_replace('.', '', $request->value); // Limpiar puntos para números
                if (!is_numeric($value)) {
                    return response()->json(['success' => false, 'message' => 'El valor no es un número válido.']);
                }

                // Actualizar tanto el campo 'costo' como el campo 'registrado'
                DB::table('solicitudes')
                    ->where('id', $request->pk)
                    ->update([
                        $request->name => $value,
                        'registrado' => $usuarioSesion // Guardar el usuario de la sesión
                    ]);

                return response()->json(['success' => true]);
            }

            // Manejar el campo 'placa'
            if ($request->name === 'placa') {

                DB::table('solicitudes')
                    ->where('id', $request->pk)
                    ->update([
                        $request->name => $request->value,
                        'asignado' => $usuarioSesion,           // usuario que asigna la placa
                        'fecha_placa' => Carbon::now('America/Bogota')
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

    public function update2(Request $request, $id)
    {
        $restriccion = DB::table('solicitudes')->where('id', '=', $id)->value('placa');
        if (is_null($restriccion)) {
            return back()->with('error', 'Debe asignar primero un vehículo');
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
            'ays' => 'required'
        ], [
            'finnote.required' => 'El campo de nota de finalización de servicio es obligatorio.',
            'responsable.required' => 'El campo de responsable es obligatorio.',
            'cte.required' => 'La calificación de tiempos de entrega es obligatoria.',
            'ays.required' => 'La calificación de atención y servicio es obligatoria.'
        ]);

        $incluidos = ['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.'];

        $restricciones = DB::table('solicitudes')
            ->where('id', '=', $id)
            ->select('remesa', 'radicado', 'retorno', 'razon', 'paytype', 'confirmado', 'nota_cumplido')
            ->first();

        // Validación: paytype no puede ser NULL
        if (is_null($restricciones->paytype)) {
            return back()->with('error', 'Debe haber una condición de pago para poder cerrar el caso.');
        }

        // Validación: otros campos requeridos
        if (
            is_null($restricciones->remesa) ||
            is_null($restricciones->radicado) ||
            is_null($restricciones->retorno) ||
            is_null($restricciones->razon) ||
            is_null($restricciones->nota_cumplido)
        ) {
            return back()->with('error', 'Los campos pedido, remesa, manifiesto, radicado y nota cumplido (campo después de tráfico) no pueden estar vacíos.');
        }

        // Validación para pagos anticipados: deben estar confirmados
        if (in_array($restricciones->paytype, $incluidos)) {
            if ($restricciones->confirmado !== 'SI') {
                return back()->with('error', 'El anticipo debe estar confirmado para poder cerrar el caso.');
            }
        }

        // Actualizar los datos de cierre
        $dataFinal = $request->only(['finuser', 'findate', 'finnote', 'responsable', 'cte', 'ays', 'nota_cierre']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal);

        return back()->with('success', 'Caso cerrado correctamente.');
    }

    public function update6(Request $request, $id)
    {
        $dataFinal = request()->only(['canuser', 'candate', 'cannote', 'cannotes', 'responsable']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal);
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
                'finnote' => $request->finnote

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
            if (!$diario) {
                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
            }

            $fechaActual = Carbon::now()->toDateString(); // formato YYYY-MM-DD

            DB::table('estatus')
                ->where('ide', $ide)
                ->update([
                    'facturar' => $request->input('facturar', 'SI'),
                    'ffacturar' => $fechaActual
                ]);

            return response()->json([
                'success' => true,
                'fecha' => $fechaActual // enviamos la fecha al frontend
            ]);
        } catch (\Exception $e) {
            Log::error('Error actualizando el registro: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update13(Request $request, $id)
    {
        $dataFinal13 = request()->only(['recibido_cumplido', 'cumplido', 'pagar_saldo', 'tipo_pago', 'fecha_envio']);
        DB::table('solicitudes')->where('id', '=', $id)->update($dataFinal13);
        return back()->with('success', 'ok');
    }

    public function update14(Request $request, $id)
    {
        try {
            // Obtén el registro original antes de la actualización
            $diario = DB::table('solicitudes')->where('id', $id)->first();
            if (!$diario) {
                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
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
                'razon' => $diario->razon, // Razón del campo original
                'ip_address' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
                'created_at' => now(), // Fecha y hora del evento
                'updated_at' => now(), // Fecha y hora del evento
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Registra cualquier error en los logs
            Log::error('Error actualizando el registro: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error: ' . $e->getMessage(),
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
            // Obtén el registro original antes de la actualización
            $diario = DB::table('solicitudes')->where('id', $id)->first();
            if (!$diario) {
                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
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
}
