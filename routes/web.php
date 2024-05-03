<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

//Lista de registros
Route::get('/productos', [ProductoController::class,'index'])->name('productos.index');

//Creación de registros
Route::get('/productos/create', [ProductoController::class,'create'])->name('productos.create');

//Insertar registros
Route::post('/productos', [ProductoController::class,'store'])->name('productos.store');

//Detalle de registros
Route::get('/productos/{id}', [ProductoController::class,'show'])->name('productos.show');

//Editar registros
Route::get('/productos/edit/{id}', [ProductoController::class,'edit'])->name('productos.edit');

//Actualizar registros
Route::put('/productos/{id}', [ProductoController::class,'update'])->name('productos.update');

//Borrar registros
Route::delete('/productos/{id}', [ProductoController::class,'destroy'])->name('productos.destroy');
