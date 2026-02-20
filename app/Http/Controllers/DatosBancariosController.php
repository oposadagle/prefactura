<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DatosBancariosController extends Controller
{
    public function index()
    {
        $datosBancarios = DB::table('datos_bancarios')->orderBy('id', 'desc')->get();
        return view('DatosBancarios.index', compact('datosBancarios'));
    }

    public function create()
    {
        $bancos = DB::table('codigos_bancos')->orderBy('banco')->get();
        return view('DatosBancarios.create', compact('bancos'));
    }

    public function store(Request $request)
    {
        $fields = [
            'tipo_documento' => 'required|numeric|between:1,5',
            'nit' => 'required|string|max:30',
            'beneficiario' => 'required|string|max:100',
            'tipo_cuenta' => 'required|string|in:CUENTA DE AHORRO,CUENTA CORRIENTE,DEPOSITO ELECTRONICO',
            'codigo_banco' => 'required|numeric',
            'numero_cuenta' => 'required|string|max:50',
        ];

        $messages = [
            'tipo_documento.required' => 'El tipo de documento es obligatorio.',
            'nit.required' => 'El NIT es obligatorio.',
            'beneficiario.required' => 'El beneficiario es obligatorio.',
            'tipo_cuenta.required' => 'El tipo de cuenta es obligatorio.',
            'codigo_banco.required' => 'El banco es obligatorio.',
            'numero_cuenta.required' => 'El número de cuenta es obligatorio.',
        ];

        $this->validate($request, $fields, $messages);

        // Validar que la dupla nit - numero_cuenta no exista
        $existeDupla = DB::table('datos_bancarios')
            ->where('nit', $request->nit)
            ->where('numero_cuenta', $request->numero_cuenta)
            ->exists();

        if ($existeDupla) {
            return back()->withInput()->with('error', 'La combinación de NIT y Número de Cuenta ya existe.');
        }

        // Obtener el nombre del banco desde codigos_bancos
        $bancoRef = DB::table('codigos_bancos')->where('codigo', $request->codigo_banco)->first();
        $nombreBanco = $bancoRef ? $bancoRef->banco : null;

        $data = [
            'tipo_documento' => $request->tipo_documento,
            'nit' => $request->nit,
            'beneficiario' => strtoupper($request->beneficiario),
            'estado' => 'ACTIVO',
            'tipo_cuenta' => $request->tipo_cuenta,
            'codigo_banco' => $request->codigo_banco,
            'numero_cuenta' => $request->numero_cuenta,
            'banco' => $nombreBanco,
            'usuario_modifica' => Auth::user()->name ?? 'Sistema',
            'fecha_modificacion' => Carbon::now(),
        ];

        DB::table('datos_bancarios')->insert($data);
        return redirect()->route('datos-bancarios.index')->with('success', 'Dato bancario creado exitosamente.');
    }

    public function edit($id)
    {
        $dato = DB::table('datos_bancarios')->where('id', $id)->first();
        if (!$dato) {
            return redirect()->route('datos-bancarios.index')->with('error', 'Registro no encontrado.');
        }

        $bancos = DB::table('codigos_bancos')->orderBy('banco')->get();
        return view('DatosBancarios.edit', compact('dato', 'bancos'));
    }

    public function update(Request $request, $id)
    {
        $fields = [
            'tipo_documento' => 'required|numeric|between:1,5',
            'beneficiario' => 'required|string|max:100',
            'tipo_cuenta' => 'required|string|in:CUENTA DE AHORRO,CUENTA CORRIENTE,DEPOSITO ELECTRONICO',
            'codigo_banco' => 'required|numeric',
            'estado' => 'required|string|in:ACTIVO,INACTIVO',
        ];

        $messages = [
            'tipo_documento.required' => 'El tipo de documento es obligatorio.',
            'beneficiario.required' => 'El beneficiario es obligatorio.',
            'tipo_cuenta.required' => 'El tipo de cuenta es obligatorio.',
            'codigo_banco.required' => 'El banco es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
        ];

        $this->validate($request, $fields, $messages);

        // Obtener el nombre del banco desde codigos_bancos
        $bancoRef = DB::table('codigos_bancos')->where('codigo', $request->codigo_banco)->first();
        $nombreBanco = $bancoRef ? $bancoRef->banco : null;

        $data = [
            'tipo_documento' => $request->tipo_documento,
            'beneficiario' => strtoupper($request->beneficiario),
            'tipo_cuenta' => $request->tipo_cuenta,
            'codigo_banco' => $request->codigo_banco,
            'banco' => $nombreBanco,
            'estado' => $request->estado,
            'usuario_modifica' => Auth::user()->name ?? 'Sistema',
            'fecha_modificacion' => Carbon::now(),
        ];

        DB::table('datos_bancarios')->where('id', $id)->update($data);
        return redirect()->route('datos-bancarios.index')->with('success', 'Dato bancario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $dato = DB::table('datos_bancarios')->where('id', $id)->first();
        
        if ($dato) {
            // Actualizar usuario y fecha antes de eliminar (para posibles triggers de auditoría o logical deletes en DB)
            DB::table('datos_bancarios')->where('id', $id)->update([
                'usuario_modifica' => Auth::user()->name ?? 'Sistema',
                'fecha_modificacion' => Carbon::now(),
            ]);

            DB::table('datos_bancarios')->where('id', $id)->delete();
            return redirect()->route('datos-bancarios.index')->with('success', 'Registro eliminado correctamente.');
        } else {
            return redirect()->route('datos-bancarios.index')->with('error', 'No se pudo encontrar el registro.');
        }
    }
}
