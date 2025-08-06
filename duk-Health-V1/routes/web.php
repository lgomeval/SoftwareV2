<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Gestion de Usuarios
Route::middleware(['auth', 'can:usuarios'])->group(function () {
    Volt::route('usuarios', 'usuarios.index')->name('usuarios.index');
    Volt::route('usuarios/create', 'usuarios.create')->name('usuarios.create');
    Volt::route('usuarios/store', 'usuarios.store')->name('usuarios.store');
    Volt::route('usuarios/{user}/edit', 'usuarios.edit')->name('usuarios.edit');
});

// Gestion de Especialistas
Route::middleware(['auth', 'can:especialistas'])->group(function () {
    Volt::route('especialistas', 'especialistas.index')->name('especialistas.index');
    Volt::route('especialistas/create', 'especialistas.create')->name('especialistas.create');
    Volt::route('especialistas/store', 'especialistas.store')->name('especialistas.store');
    Volt::route('especialistas/{especialista}/edit', 'especialistas.edit')->name('especialistas.edit');
});

// Gestion de Pacientes
Route::middleware(['auth', 'can:pacientes'])->group(function () {
    Volt::route('pacientes', 'pacientes.index')->name('pacientes.index');
    Volt::route('pacientes/create', 'pacientes.create')->name('pacientes.create');
    Volt::route('pacientes/store', 'pacientes.store')->name('pacientes.store');
    Volt::route('pacientes/{paciente}/edit', 'pacientes.edit')->name('pacientes.edit');
});

// Gestion de Clientes
Route::middleware(['auth', 'can:clientes'])->group(function () {
    Volt::route('clientes', 'clientes.index')->name('clientes.index');
    Volt::route('clientes/create', 'clientes.create')->name('clientes.create');
    Volt::route('clientes/store', 'clientes.store')->name('clientes.store');
    Volt::route('clientes/{cliente}/edit', 'clientes.edit')->name('clientes.edit');
});

// Gestion de Ordenes de Servicio
Route::middleware(['auth', 'can:ordenes-de-servicio'])->group(function () {
    Volt::route('ordenes-de-servicio', 'ordendeservicio.index')->name('ordenes-de-servicio.index');
    Volt::route('ordenes-de-servicio/create', 'ordendeservicio.create')->name('ordenes-de-servicio.create');
    Volt::route('ordenes-de-servicio/{orden}/edit', 'ordendeservicio.edit')->name('ordenes-de-servicio.edit');
});



require __DIR__.'/auth.php';
