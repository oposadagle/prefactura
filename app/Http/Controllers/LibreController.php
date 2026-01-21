<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibreController extends Controller
{
    public function index()
    {
        $vehiculos = DB::table('vehiculos')->get();
        $placas = $vehiculos->map(function ($vehiculo) {
            return ['value' => $vehiculo->placa, 'text' => $vehiculo->placa];
        });
        $states = DB::table('estadios')->get();
        $estados = $states->map(function ($state) {
            return ['value' => $state->nombre, 'text' => $state->nombre];
        });
        $cities = DB::table('ciudades')->get();
        $ciudades = $cities->map(function ($citie) {
            return ['value' => $citie->nombre, 'text' => $citie->nombre];
        });
        $libres = DB::table('disponibles')->get();
        return view('Libre.index', compact('libres','vehiculos','placas','estados','ciudades'));
    }    

    public function store(Request $request)
    {        
        DB::table('libres')->insert([
            'placa' => null,
            'nombre' => null,
            'cedula' => null,
            'telefono' => null,
            'tipo_vehiculo' => null,
            'estado' => null,
            'ciudad' => null
        ]);
        return redirect()->route('libre.index');
    }    

    public function update(Request $request)
    {
        //return response()->json($request);
        if ($request->ajax()) {
            DB::table('libres')->where('id', $request->pk)->update([$request->name => $request->value]);
            return response()->json(['success' => true]);
        }
    }

    public function destroy(string $id)
    {        
        DB::table('libres')->where('id', $id)->delete();
       return redirect()->route('libre.index');
    }
}
