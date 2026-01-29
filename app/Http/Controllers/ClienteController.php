<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = DB::table('clientes')->get();
        return view('Cliente.index',  compact('clientes'));
    }

    public function create()
    {
        $comerciales = DB::connection('mysql_second')->table('rh.asociados')->select('nombre', 'email', 'proceso', 'regional')->where('Proceso', '=', 'Comercial')->get();
        $analistas = DB::connection('mysql_second')->table('rh.asociados')->select('nombre', 'email', 'proceso', 'regional')->where('Proceso', '=', 'Administrativo y Financiero')->get();
        $centros = DB::table('centros')->select('nombrecentro')->get();
        return view('Cliente.create', compact('comerciales', 'analistas', 'centros'));
    }

    public function store(Request $request)
    {
        // validaciones
        $fields = [
            'nit' => 'required|numeric',
            'razon_social' => 'required',
            'razon_comercial' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'contacto' => 'required',
            'email_1' => 'required|email',
            'email_2' => 'sometimes|nullable|email',
            'email_3' => 'sometimes|nullable|email',
            'comercial' => 'required',
            'analista' => 'required',
            'tipo_servicio' => 'required',
            'centrocosto' => 'required',
        ];
        $message = [
            'nit.required' => 'El NIT es requerido',
            'nit.numeric' => 'El NIT debe ser numérico',
            'razon_social.required' => 'La razon_social es requerida',
            'razon_comercial.required' => 'La razon_comercial es requerida',
            'direccion.required' => 'La dirección del cliente es requerida',
            'telefono.required' => 'El telefono del cliente es requerido',
            'telefono.numeric' => 'El telefono debe ser un valor numérico',
            'contacto.required' => 'El nombre del contacto es requerido',
            'email_1.required' => 'Al menos un email de facturación electrónica es requerido',
            'email_1.email' => 'Formato de correo incorrecto',
            'email_2.email' => 'Formato de correo incorrecto',
            'email_3.email' => 'Formato de correo incorrecto',
            'comercial.required' => 'El nombre del comercial es requerido',
            'analista.required' => 'El nombre del analista es requerido',
            'tipo_servicio.required' => 'El tipo de servicio es requerido',
            'centrocosto.required' => 'El Centro de costo es requerido',
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
            // insertar información del cliente
            $dataCliente = request()->only([
                'nit', 'razon_social', 'razon_comercial', 'direccion', 'telefono', 'contacto', 'email_1', 'email_2', 'email_3', 'comercial', 'email_comercial',
                'proceso_comercial', 'regional_comercial', 'analista', 'email_analista', 'proceso_analista', 'regional_analista', 'tipo_servicio', 'factor', 'estado'
            ]);
            $dataCliente['created_at'] = Carbon::now();
            $dataCliente['updated_at'] = Carbon::now();
            DB::table('clientes')->insert($dataCliente);
            // insertar centros de costos        
            $nit = $request->input('nit');
            $centrocosto = $request->input('centrocosto');
            $subcentros = $request->input('costo');
            DB::table('costos')->insert([
                'nit' => $nit,
                'centro' => $centrocosto,
                'tipo' => 'Principal'
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Cliente creado correctamente'
                ], 201);
            }

            return back()->with('success', 'Cliente creado correctamente');
        } catch (\Exception $e) {
            \Log::error('Error al crear cliente: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Error al guardar el cliente: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al guardar el cliente: ' . $e->getMessage())->withInput();
        }
        if ($subcentros) {
            $datosSubcentros = [];
            foreach ($subcentros as $subcentro) {
                $datosSubcentros[] = [
                    'nit' => $nit,
                    'centro' => $subcentro['subcentro'],
                    'tipo' => 'Subcentro'
                ];
            }
            DB::table('costos')->insert($datosSubcentros);
        }
        // insertar terminos
        $nit = $request->input('nit');
        $transportes = $request->input('transporte');
        $coberturas = $request->input('cobertura');
        foreach ($transportes as $transporte) {
            foreach ($coberturas as $cobertura) {
                DB::table('terminos')->insert([
                    'nit' => $nit,
                    'transporte' => $transporte,
                    'cobertura' => $cobertura,
                    'updated_at' => Carbon::now()
                ]);
            }
        }
        // insertar parámetros
        $dataParametro = request()->only([
            'nit', 'upmu', 'upmd', 'ufmu', 'ufmd', 'utm', 'ucmum', 'dpmu', 'dpmd', 'dfmu', 'dfmd', 'dtm',
            'dcmum', 'npmu', 'npmd', 'nfmu', 'nfmd', 'ntm', 'ncmum', 'epmu', 'epmd', 'efmu', 'efmd', 'etm', 'ecmum'
        ]);
        $defaultValues = [
            'upmu', 'upmd','ufmu', 'ufmd', 'utm', 'ucmum', 'dpmu', 'dpmd', 'dfmu', 'dfmd', 'dtm',
            'dcmum', 'npmu', 'npmd', 'nfmu', 'nfmd', 'ntm', 'ncmum', 'epmu', 'epmd', 'efmu', 'efmd', 'etm', 'ecmum'
        ];        
        foreach ($defaultValues as $field) {
            if (!isset($dataParametro[$field])) {
                $dataParametro[$field] = 0;
            }
        }
        $dataParametro['updated_at'] = Carbon::now();
        DB::table('parametros')->insert($dataParametro);

        //return response()->json($dataParametro);
        return back()->with('success', 'Cliente creado correctamente');
    }

    public function show(Cliente $cliente)
    {
        //
    }

    public function edit($id)
    {
        return view('Cliente.edit');
    }

    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    public function destroy(Cliente $cliente)
    {
        //
    }
}
