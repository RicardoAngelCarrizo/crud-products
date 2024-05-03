<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//lista de registros
Route::get('/productos', [ProductoController::class, 'listAPI'])->name('productos.listAPI');

//Insertar registros
Route::post('/productos', [ProductoController::class, 'storeAPI'])->name('productos.storeAPI');

//Detalle de registros
Route::get('/productos/{id}', [ProductoController::class, 'showAPI'])->name('productos.showAPI');

//Actualizar registros
Route::put('/productos/{id}', [ProductoController::class, 'updateAPI'])->name('productos.updateAPI');

//Borrar Registros
Route::delete('/productos/{id}', [ProductoController::class, 'destroyAPI'])->name('productos.destroyAPI');
