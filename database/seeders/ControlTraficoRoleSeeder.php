<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class ControlTraficoRoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::firstOrCreate([
            'name' => 'Control trafico',
            'guard_name' => 'web',
        ]);

        $permisos = ['solicitud.index', 'vehiculo.index'];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate([
                'name' => $permiso,
                'guard_name' => 'web',
            ]);
        }

        $role->syncPermissions($permisos);

        $user = User::where('email', 'control.trafico@glecolombia.com')->first();

        if ($user) {
            $user->syncRoles([$role]);
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
