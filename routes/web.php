<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;
use App\Models\Categoria;

Route::get('/',[FilmesController::class, 'index'])->name('filmes.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('/filmes', FilmesController::class)->except(['index']);
});

