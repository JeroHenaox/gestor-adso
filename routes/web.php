<?php

use App\Http\Controllers\AprendizController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirigir la página principal al listado de aprendices
Route::redirect('/', '/aprendices');

// Compatibilidad con las redirecciones de Laravel Breeze
Route::redirect('/dashboard', '/aprendices')
    ->middleware('auth')
    ->name('dashboard');

// Rutas del CRUD protegidas con autenticación
Route::middleware(['auth'])->group(function () {
    Route::resource('aprendices', AprendizController::class);
});

// Rutas del perfil del usuario autenticado
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Rutas de registro, inicio y cierre de sesión
require __DIR__.'/auth.php';
