<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'Admin']);
        $role_dev = Role::create(['name' => 'Dev']);
        $role_sac = Role::create(['name' => 'SAC']);
        $role_medico = Role::create(['name' => 'Medico']);
        $role_aux_enfermeria = Role::create(['name' => 'Auxiliar de Enfermeria']);
        $role_comercial = Role::create(['name' => 'Comercial']);
        $role_cliente = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role_admin, $role_dev]);
        // Usuarios
        Permission::create(['name' => 'usuarios'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'usuarios.index'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'usuarios.delete'])->syncRoles([$role_admin, $role_dev]);

        // Especialistas
        Permission::create(['name' => 'especialistas'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'especialistas.index'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'especialistas.create'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'especialistas.edit'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'especialistas.delete'])->syncRoles([$role_admin, $role_dev]);

        // // Pacientes
        Permission::create(['name' => 'pacientes'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'pacientes.index'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'pacientes.create'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'pacientes.edit'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'pacientes.delete'])->syncRoles([$role_admin, $role_sac, $role_dev]);
    }
}
