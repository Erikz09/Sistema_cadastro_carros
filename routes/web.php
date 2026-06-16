<?php

use App\Models\Carro;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Pagina Inicial (Pública)
Route::get('/', function () {
    $carros = Carro::latest()->get();
    return view('welcome', compact('carros'));
})->name('welcome');

Route::get('home', function () {
    return view('home');
})->name('home');

// Rotas de autenticação padrão (login, logout, esqueci a senha, etc.)
require __DIR__.'/auth.php';

// ROTAS AUTENTICADAS (Logado no Sistema)
Route::middleware(['auth'])->group(function () {
 
    Route::resource('carros', CarroController::class);

    // Lista de todos os usuários cadastrados no sistema 
    Route::get('/usuarios/lista', function () {
        $usuarios = User::latest()->get(); 
        return view('usuarios.lista', compact('usuarios'));
    })->name('usuarios.lista');

    Route::get('/profile', function () {
        $usuario = auth()->user();
        $carros = $usuario->carros ?? collect();
        return view('profile.index', compact('usuario', 'carros'));
    })->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
});