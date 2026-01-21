<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NitController extends Controller
{    
    public function index()
    {
        $nits = DB::table('clientesa')->get();
        return view('Nit.index', compact('nits'));
    }
    
    public function create()
    {
        return view('Nit.create');
    }
    
    public function store(Request $request)
    {
        $fields = [
            'nit' => 'required|numeric',
            'nombre' => 'required',
            'estado' => 'required',
            'fecha_cierre' => 'required|numeric',
            'frecuencia' => 'required',            
        ];
        $message = [];
        $this->validate($request, $fields, $message);
        $dataCliente = request()->except('_token');
        DB::table('clientesa')->insert($dataCliente);        
        return back()->with('success', 'Cliente creado correctamente');        
    }
    
    public function edit(string $id)
    {
        $datos = DB::table('clientesa')->where('id', $id)->first();
        $tipos = DB::table('clientesa')->get();
        return view('Nit.edit', compact('tipos','datos')); 
    }
    
    public function update(Request $request, $id)
    {
        $fields = [
            'nit' => 'numeric',            
            'fecha_cierre' => 'numeric'            
        ];
        $message = [];
        $this->validate($request, $fields, $message);
        $dataClientes = request()->except(['_token','_method']);
        DB::table('clientesa')->where('id', '=', $id)->update($dataClientes);
        return back()->with('success', 'Cliente modificado correctamente');
    }
    
    public function destroy($id)
    {
        $event = DB::table('clientesa')->where('id', $id)->first();
        if ($event) {
            DB::table('clientesa')->where('id', $id)->delete();
            return back()->with('success', 'Vehículo eliminado correctamente');
        } else {            
            return back()->with('error', 'No se pudo encontrar el vehículo');
        }
    }
}
