<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilmesController::class, 'index'])->name('filmes.index');
Route::get('/galeria', [FilmesController::class, 'index'])->name('galeria');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/cadastro', [AuthController::class, 'showRegister'])->name('register');
Route::post('/cadastro', [AuthController::class, 'register'])->name('register.store');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/categorias', CategoriaController::class);

    Route::get('/admin/filmes', [FilmesController::class, 'adminIndex'])->name('admin.filmes.index');
    Route::resource('/filmes', FilmesController::class)->except(['index', 'show']);
});

Route::get('/filmes/{filme}', [FilmesController::class, 'show'])->name('filmes.show');
