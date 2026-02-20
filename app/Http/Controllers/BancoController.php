<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BancoController extends Controller
{
    public function index()
    {
        $bancos = DB::table('codigos_bancos')->orderBy('banco')->get();
        return view('Banco.index', compact('bancos'));
    }

    public function store(Request $request)
    {
        $fields = [
            'banco' => 'required|string|max:100',
            'codigo' => 'required|numeric|between:0,9999',
        ];
        $messages = [
            'banco.required' => 'El nombre del banco es obligatorio.',
            'codigo.required' => 'El código es obligatorio.',
            'codigo.numeric' => 'El código debe ser numérico.',
            'codigo.between' => 'El código debe estar entre 0 y 9999.',
        ];
        $this->validate($request, $fields, $messages);

        $dataBanco = [
            'banco' => strtoupper($request->banco),
            'codigo' => $request->codigo,
        ];

        DB::table('codigos_bancos')->insert($dataBanco);
        return back()->with('success', 'Banco creado correctamente');
    }

    public function destroy($id)
    {
        $banco = DB::table('codigos_bancos')->where('id', $id)->first();
        if ($banco) {
            DB::table('codigos_bancos')->where('id', $id)->delete();
            return back()->with('success', 'Banco eliminado correctamente');
        } else {
            return back()->with('error', 'No se pudo encontrar el banco');
        }
    }
}
