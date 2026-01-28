<?php

namespace App\Http\Controllers;
use App\Exports\PricesExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PriceController extends Controller
{    
    public function index()
    {
        $diarias = DB::table('prices')->get();
        return view('Price.index', compact('diarias'));
    }

    public function create()
    {
        $clientes = DB::table('clientesa')->select('nombre')->orderBy('nombre')->get();
        $municipios = DB::table('municipios')->select('municipio')->get();
        $tipos = DB::table('tipo_vehiculos')->orderBy('tipo')->get();
        return view('Price.create', compact('clientes', 'municipios', 'tipos'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'capacidad' => str_replace('.', '', $request->input('capacidad')),
            'costo' => str_replace('.', '', $request->input('costo')),
            'costo_negocio' => str_replace('.', '', $request->input('costo_negocio'))
        ]);
        $fields = [
            'cliente' => 'required',
            'fecha_solicitud' => 'required',
            'origen' => 'required',
            'destino' => 'required',
            'trayecto' => 'required',            
            'tipo_vehiculo' => 'required',
            'capacidad' => 'required|numeric|min:500|max:32000',
            'costo' => 'required|numeric',            
            'puntos' => 'required|numeric',
            'costo_negocio' => 'required|numeric',
            'codigo_seguimiento' => 'required|numeric',
            'tipo_carroceria' => 'required',
            'estado_cotizacion' => 'required',
            'responsable' => 'required',
            'costo_adicional' => 'required|numeric',
            'quien_solicita' => 'required',
            'observaciones' => 'required'
        ];
        $message = [];
        $this->validate($request, $fields, $message);

        $dataPrice = request()->except(['_token']);
        $dataPrice['created_at'] = Carbon::now();
        $dataPrice['updated_at'] = Carbon::now();
        DB::table('prices')->insert($dataPrice);

        return back()->with('success', 'Cotizacion ingresada correctamente');        
    }
    
    public function update(Request $request, $ID)
    {
        if ($request->ajax()) {            
            if ($request->name === 'costo') {                
                $value = str_replace('.', '', $request->value);
                
                if (!is_numeric($value)) {
                    return response()->json(['success' => false, 'message' => 'El valor no es un número válido.']);
                }
                
                DB::table('prices')->where('ID', $request->pk)->update([$request->name => $value]);

                return response()->json(['success' => true]);
            }
            
            DB::table('prices')->where('ID', $request->pk)->update([$request->name => $request->value]);
            return response()->json(['success' => true]);
        }
    }

    public function prices(Request $request)
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
        $filename = 'cotizaciones_' . $year . '_' . str_pad($month, 2, '0', STR_PAD_LEFT) . '.xlsx';
    
        // Descargar el archivo usando los parámetros
        return Excel::download(new PricesExport($year, $month), $filename);
    }

    public function destroy(string $id)
    {        
        DB::table('prices')->where('ID', $id)->delete();
       return redirect()->route('price.index');
    }

}