<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*Listado de API*/
Route::get('/establecimientos', [APIController::class, 'index'])->name('establecimientos.index');
Route::get('/establecimientos/{establecimiento}', [APIController::class, 'show'])->name('establecimientos.show');


Route::get('/categorias', [APIController::class, 'categorias'])->name('categorias');
Route::get('/categorias/{categoria}', [APIController::class, 'categoria'])->name('categoria');
Route::get('/{categoria}', [APIController::class, 'globales'])->name('globales');
