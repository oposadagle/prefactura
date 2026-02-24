<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CentroCostoController extends Controller
{
    public function index()
    {
        $centros = DB::table('centros_costo')->orderBy('id', 'desc')->get();
        return view('CentroCosto.index', compact('centros'));
    }

    public function create()
    {
        return view('CentroCosto.create');
    }

    public function store(Request $request)
    {
        $fields = [
            'nit' => 'required|string|max:30',
            'cliente' => 'required|string|max:100',
            'centro_costo' => 'required|string|max:20',
            'dia_cierre' => 'required|integer|between:0,31',
            'frecuencia' => 'required|string|max:30',
        ];

        $messages = [
            'nit.required' => 'El NIT es obligatorio.',
            'cliente.required' => 'El cliente es obligatorio.',
            'centro_costo.required' => 'El centro de costo es obligatorio.',
            'dia_cierre.required' => 'El día de cierre es obligatorio.',
            'dia_cierre.between' => 'El día de cierre debe estar entre 0 y 31.',
            'frecuencia.required' => 'La frecuencia es obligatoria.',
        ];

        $this->validate($request, $fields, $messages);

        $data = [
            'nit' => $request->nit,
            'cliente' => strtoupper($request->cliente),
            'estado' => 'ACTIVO',
            'centro_costo' => strtoupper($request->centro_costo),
            'dia_cierre' => $request->dia_cierre,
            'frecuencia' => strtoupper($request->frecuencia),
            'user_update' => Auth::user()->name ?? 'Sistema',
            'updated_at' => Carbon::now(),
        ];

        DB::table('centros_costo')->insert($data);
        return redirect()->route('centro-costo.index')->with('success', 'Centro de costo creado exitosamente.');
    }

    public function edit($id)
    {
        $centro = DB::table('centros_costo')->where('id', $id)->first();
        if (!$centro) {
            return redirect()->route('centro-costo.index')->with('error', 'Registro no encontrado.');
        }

        return view('CentroCosto.edit', compact('centro'));
    }

    public function update(Request $request, $id)
    {
        $fields = [
            'nit' => 'required|string|max:30',
            'cliente' => 'required|string|max:100',
            'centro_costo' => 'required|string|max:20',
            'dia_cierre' => 'required|integer|between:0,31',
            'frecuencia' => 'required|string|max:30',
            'estado' => 'required|string|in:ACTIVO,INACTIVO',
        ];

        $messages = [
            'nit.required' => 'El NIT es obligatorio.',
            'cliente.required' => 'El cliente es obligatorio.',
            'centro_costo.required' => 'El centro de costo es obligatorio.',
            'dia_cierre.required' => 'El día de cierre es obligatorio.',
            'dia_cierre.between' => 'El día de cierre debe estar entre 0 y 31.',
            'frecuencia.required' => 'La frecuencia es obligatoria.',
            'estado.required' => 'El estado es obligatorio.',
        ];

        $this->validate($request, $fields, $messages);

        $data = [
            'nit' => $request->nit,
            'cliente' => strtoupper($request->cliente),
            'estado' => $request->estado,
            'centro_costo' => strtoupper($request->centro_costo),
            'dia_cierre' => $request->dia_cierre,
            'frecuencia' => strtoupper($request->frecuencia),
            'user_update' => Auth::user()->name ?? 'Sistema',
            'updated_at' => Carbon::now(),
        ];

        DB::table('centros_costo')->where('id', $id)->update($data);
        return redirect()->route('centro-costo.index')->with('success', 'Centro de costo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $centro = DB::table('centros_costo')->where('id', $id)->first();
        
        if ($centro) {
            DB::table('centros_costo')->where('id', $id)->update([
                'user_update' => Auth::user()->name ?? 'Sistema',
                'updated_at' => Carbon::now(),
            ]);

            DB::table('centros_costo')->where('id', $id)->delete();
            return redirect()->route('centro-costo.index')->with('success', 'Registro eliminado correctamente.');
        } else {
            return redirect()->route('centro-costo.index')->with('error', 'No se pudo encontrar el registro.');
        }
    }
}
