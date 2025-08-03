<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

test('puede listar usuarios', function () {
    // Crear rol y permiso si aún no existen
    $role = Role::firstOrCreate(['name' => 'admin']);
    
    $permiso = Permission::firstOrCreate(['name' => 'usuarios']);

    // Asignar el permiso al rol
    $role->givePermissionTo($permiso);

    // Crear y autenticar un usuario con ese rol
    $admin = User::factory()->create();
    $admin->assignRole($role);

    $this->actingAs($admin);

    // Crear más usuarios para la prueba
    User::factory()->count(3)->create();

    $response = $this->get('/usuarios');

    $response->assertStatus(200);
    $response->assertSee(User::first()->name);
});
