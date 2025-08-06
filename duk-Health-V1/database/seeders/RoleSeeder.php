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

        // Pacientes
        Permission::create(['name' => 'pacientes'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'pacientes.index'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'pacientes.create'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'pacientes.edit'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'pacientes.delete'])->syncRoles([$role_admin, $role_sac, $role_dev]);

        // clientes
        Permission::create(['name' => 'clientes'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'clientes.index'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'clientes.create'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'clientes.edit'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'clientes.delete'])->syncRoles([$role_admin, $role_dev]);

        // ordenes-de-servicio
        Permission::create(['name' => 'ordenes-de-servicio'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'ordenes-de-servicio.index'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'ordenes-de-servicio.create'])->syncRoles([$role_admin, $role_dev]);
        Permission::create(['name' => 'ordenes-de-servicio.edit'])->syncRoles([$role_admin, $role_sac, $role_dev]);
        Permission::create(['name' => 'ordenes-de-servicio.delete'])->syncRoles([$role_admin, $role_dev]);
    }
}
