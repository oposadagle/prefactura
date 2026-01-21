<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin.index', compact('users'));
    }

    public function edit( $user)
    {
        $roles = Role::all();
        $usuario = User::find($user);        
        return view('Admin.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $user)
    {
        $usuario = User::find($user);
        $usuario->roles()->sync($request->roles);
        return back()->with('info', 'Rol(es) asigandos correctamente');
    }
}
