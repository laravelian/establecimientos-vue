<?php

use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InicioController;
use App\Http\Middleware\RevisarEstablecimiento;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', InicioController::class)->name('inicio');

Auth::routes(['verify' => true]); //Acuerdate de quitarlo posiblemente

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/establecimiento/create', [EstablecimientoController::class, 'create'])->name('establecimiento.create')->middleware('revisar');
    Route::post('/establecimiento', [EstablecimientoController::class, 'store'])->name('establecimiento.store');
    Route::get('/establecimiento/edit', [EstablecimientoController::class, 'edit'])->name('establecimiento.edit');
    Route::put('/establecimiento/{establecimiento}', [EstablecimientoController::class, 'update'])->name('establecimiento.update');

    Route::post('/imagenes/store', [ImagenController::class, 'store'])->name('imagenes.store');
    Route::post('/imagenes/destroy', [ImagenController::class, 'destroy'])->name('imagenes.destroy');
});
