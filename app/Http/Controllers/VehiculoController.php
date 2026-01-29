<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\VehiculosExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = DB::table('vehiculares')->orderBy('placa')->get();
        foreach ($vehiculos as $vehiculo) {
            $fechaCreacion = $vehiculo->fecha_creacion ? Carbon::parse($vehiculo->fecha_creacion) : null;
            $fechaEvaluacion = $vehiculo->fecha_evaluacion ? Carbon::parse($vehiculo->fecha_evaluacion) : null;
            $fechaMayor = null;
            if ($fechaCreacion && $fechaEvaluacion) {
                $fechaMayor = $fechaCreacion->greaterThan($fechaEvaluacion) ? $fechaCreacion : $fechaEvaluacion;
            } elseif ($fechaCreacion) {
                $fechaMayor = $fechaCreacion;
            } elseif ($fechaEvaluacion) {
                $fechaMayor = $fechaEvaluacion;
            }
            $vehiculo->fecha_calculada = $fechaMayor ? $fechaMayor->addYear()->format('Y-m-d') : null;
        }
        return view('Vehiculo.index', compact('vehiculos'));
    }

    public function vehicular()
    {
        return Excel::download(new VehiculosExport, 'vehiculos.xlsx');
    }

    public function create()
    {
        $tipos = DB::table('tipo_vehiculos')->get();
        return view('Vehiculo.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $fields = [
            'placa' => 'required',
            'conductor' => 'required',
            'cedula_conductor' => 'required|numeric',
            'telefono_conductor' => 'required|numeric',
            'propietario' => 'required',
            'cedpro' => 'required|numeric',
            'pagant' => 'required',
            'pagsal' => 'required',
            'tipo_vehiculo' => 'required',
            'creado_contable' => 'required',
            'usuario_gps' => 'required',
            'clave_gps' => 'required',
            'empresa_gps' => 'required',
            'estudio_seguridad' => 'required',
            'ano_fabricacion' => ['digits:4', 'gte:1900'],
            'soat' => 'required',
            'tecnomecanica' => 'required',
            'simur' => 'required',
            'simit' => 'required'
        ];

        $message = [
            'ano_fabricacion.gte' => 'El año digitado no pertenece a esta generación'
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
            $dataVehiculo = $request->except('_token');

            // Agregar los campos de auditoría
            $dataVehiculo['fecha_creacion'] = now();
            $dataVehiculo['create_user'] = Auth::user()->name;
            $dataVehiculo['update_user'] = Auth::user()->name;
            $dataVehiculo['created_at'] = now();
            $dataVehiculo['updated_at'] = now();

            DB::table('vehiculos')->insert($dataVehiculo);

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Vehículo creado correctamente'
                ], 201);
            }

            return back()->with('success', 'Vehículo creado correctamente');
        } catch (\Exception $e) {
            \Log::error('Error al crear vehículo: ' . $e->getMessage());
            
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Error al guardar el vehículo: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Error al guardar el vehículo: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $datos = DB::table('vehiculos')->where('id', $id)->first();
        $tipos = DB::table('tipo_vehiculos')->get();
        return view('Vehiculo.edit', compact('tipos', 'datos'));
    }

    public function edit2($id)
    {
        $datos = DB::table('vehiculares')->where('id', $id)->first();
        return view('Vehiculo.edit2', compact('datos'));
    }

    public function update(Request $request, $id)
    {
        $fields = [
            'ano_fabricacion' => ['digits:4', 'gte:1900'],
            'cedula_conductor' => 'numeric',
            'cedpro' => 'numeric',
            'cedten' => 'numeric'
        ];
        $message = [
            'ano_fabricacion.gte' => 'El año digitado no pertenece a esta generación',
            'cedula_conductor.numeric' => 'La cedula del conductor corresponde a un número',
            'cedpro.numeric' => 'La cedula del propietario corresponde a un número',
            'cedten.numeric' => 'La cedula del tenedor corresponde a un número'
        ];
        $this->validate($request, $fields, $message);
        $dataVehiculos = request()->except(['_token', '_method', 'placa']);
        DB::table('vehiculos')->where('id', '=', $id)->update($dataVehiculos);
        return back()->with('success', 'Vehiculo modificado correctamente');
    }

    public function update2(Request $request, $id)
    {
        $fields = [
            'requisitos' => 'required',
            'estudio_seguridad' => 'required',
            'acuerdo_seguridad' => 'required',
            'evaluacion' => 'required',
            'nota_evaluacion' => 'required',
            'fecha_evaluacion' => 'required'
        ];
        $message = [
            'requisitos.required' => 'El campo requisitos es obligatorio',
            'estudio_seguridad.required' => 'El campo estudio de seguridad es obligatorio',
            'acuerdo_seguridad.required' => 'El campo acuerdo de seguridad es obligatorio',
            'evaluacion.required' => 'El campo evaluación es obligatorio',
            'nota_evaluacion.required' => 'El campo nota de evaluación es obligatorio',
            'fecha_evaluacion.required' => 'El campo fecha de evaluación es obligatorio'
        ];
        $this->validate($request, $fields, $message);
        $dataVehiculos = request()->only(['requisitos', 'estudio_seguridad', 'acuerdo_seguridad', 'evaluacion', 'nota_evaluacion', 'fecha_evaluacion']);
        DB::table('vehiculos')->where('id', '=', $id)->update($dataVehiculos);
        return back()->with('success', 'Vehiculo modificado correctamente');
    }

    public function destroy($id)
    {
        $event = DB::table('vehiculos')->where('id', $id)->first();
        if ($event) {
            DB::table('vehiculos')->where('id', $id)->delete();
            return back()->with('success', 'Vehículo eliminado correctamente');
        } else {
            return back()->with('error', 'No se pudo encontrar el vehículo');
        }
    }

    public function getVehiculos()
    {
        $vehiculos = DB::table('vehiculos')->select('placa')->get();
        return response()->json($vehiculos);
    }

    public function getVehiculoByPlaca($placa)
    {
        $vehiculo = DB::table('vehiculos')->where('placa', $placa)->first();
        return response()->json($vehiculo);
    }
}
