<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Pagina Inicial (Pública)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Cadastro público de novos usuários (Antes do Login)
Route::get('/usuarios/criar', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

// =========================================================================
// ROTAS AUTENTICADAS (Logado no Sistema)
// =========================================================================
Route::middleware(['auth'])->group(function () {
 
    Route::resource('carros', CarroController::class);

    // Gerenciamento de Usuários (Menu Lateral)
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{usuario}/perfil', [UsuarioController::class, 'perfil'])->name('usuarios.perfil');

    // Configurações da Conta / Meu Perfil (Menu Lateral)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

// Rotas de autenticação padrão (login, logout, esqueci a senha, etc.)
require __DIR__.'/auth.php';