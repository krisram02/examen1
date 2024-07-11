<?php

use App\Http\Controllers\ApuestaController;
use App\Http\Controllers\JuegoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Rutas para listar y crear apuestas
Route::get('/apuestas', [ApuestaController::class, 'index'])->name('apuestas.index');
Route::get('/apuestas/create', [ApuestaController::class, 'create'])->name('apuestas.create');
Route::post('/apuestas', [ApuestaController::class, 'store'])->name('apuestas.store');

// Rutas para editar y eliminar apuestas
Route::get('/apuestas/{apuesta}/edit', [ApuestaController::class, 'edit'])->name('apuestas.edit');
Route::put('/apuestas/{apuesta}', [ApuestaController::class, 'update'])->name('apuestas.update');
Route::delete('/apuestas/{apuesta}', [ApuestaController::class, 'destroy'])->name('apuestas.destroy');

// Otras rutas específicas según tus necesidades
Route::get('/apuestas/jugadores/mayor3', [ApuestaController::class, 'getApuestasByJugadores'])->name('apuestas.mayor3');
Route::get('/apuestas/check/dinero', [ApuestaController::class, 'checkDinero'])->name('apuestas.checkDinero');
Route::get('/apuestas/juego/{juego}', [ApuestaController::class, 'getApuestasByJuego'])->name('apuestas.juego');


// Rutas para listar y crear juegos
Route::get('/juegos', [JuegoController::class, 'index'])->name('juegos.index');
Route::get('/juegos/create', [JuegoController::class, 'create'])->name('juegos.create');
Route::post('/juegos', [JuegoController::class, 'store'])->name('juegos.store');

// Rutas para editar y eliminar juegos
Route::get('/juegos/{juego}/edit', [JuegoController::class, 'edit'])->name('juegos.edit');
Route::put('/juegos/{juego}', [JuegoController::class, 'update'])->name('juegos.update');
Route::delete('/juegos/{juego}', [JuegoController::class, 'destroy'])->name('juegos.destroy');

// Otras rutas específicas según tus necesidades
// Por ejemplo, si necesitas mostrar detalles de un juego específico
Route::get('/juegos/{juego}', [JuegoController::class, 'show'])->name('juegos.show');