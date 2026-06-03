<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Cadastro público
Route::get('/usuarios/criar', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

// Painel do usuário normal
Route::middleware(['auth'])->group(function () {
    Route::resource('carros', CarroController::class);

    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{usuario}/perfil', [UsuarioController::class, 'perfil'])->name('usuarios.perfil');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Painel do superusuário
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/usuarios/{usuario}', [AdminController::class, 'verUsuario'])->name('usuario');
});

require __DIR__.'/auth.php';