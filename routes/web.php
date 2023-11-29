<?php

use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/biblioteca', [BibliotecaController::class, 'index'])->middleware(['auth', 'verified'])->name('biblioteca');

Route::get('/insertarJuego', [BibliotecaController::class, 'create'])->name('juegos.crear');

Route::post('/insertarJuego', [BibliotecaController::class, 'store'])->middleware('insertado')->name('juegos.guardar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/eliminarJuego/{juego}', [BibliotecaController::class, 'destroy'])->middleware('eliminado')->name('juegos.eliminar');

Route::get('/editarJuego/{juego}/editar', [BibliotecaController::class, 'edit'])->name('juegos.editar');
Route::put('/editarJuego/{juego}', [BibliotecaController::class, 'update'])->name('juegos.actualizar');

require __DIR__.'/auth.php';