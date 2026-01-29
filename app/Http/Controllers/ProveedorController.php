<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{    
    public function index()
    {
        $proveedores = DB::table('transportadoras')->get();
        return view('Proveedor.index', compact('proveedores'));
    }
    
    public function create()
    {
        return view('Proveedor.create');
    }
    
    public function store(Request $request)
    {
        $fields = [            
            'nombre' => 'required',
            'estado' => 'required'            
        ];
        $message = [];
        
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
            $dataProveedor = request()->except('_token');
            DB::table('transportadoras')->insert($dataProveedor);

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Proveedor creado correctamente'
                ], 201);
            }

            return back()->with('success', 'Proveedor creado correctamente');
        } catch (\Exception $e) {
            \Log::error('Error al crear proveedor: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Error al guardar el proveedor: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al guardar el proveedor: ' . $e->getMessage())->withInput();
        }
    }
    
    public function edit(string $id)
    {
        $datos = DB::table('transportadoras')->where('id', $id)->first();        
        return view('Proveedor.edit', compact('datos')); 
    }
    
    public function update(Request $request, $id)
    {                
        $dataProveedores = request()->except(['_token','_method']);
        DB::table('transportadoras')->where('id', '=', $id)->update($dataProveedores);
        return back()->with('success', 'Proveedor modificado correctamente');
    }
    
    public function destroy($id)
    {
        $event = DB::table('transportadoras')->where('id', $id)->first();
        if ($event) {
            DB::table('transportadoras')->where('id', $id)->delete();
            return back()->with('success', 'Proveedor eliminado correctamente');
        } else {            
            return back()->with('error', 'No se pudo encontrar el proveedor');
        }
    }
}
