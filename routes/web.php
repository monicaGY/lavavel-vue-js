<?php

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
Route::get('/mostrar-productos', function(){
    return view('show');
})->name('tabla-productos');
Route::get('/productos', ['App\Http\Controllers\ProductoController', 'index']);
Route::delete('/producto/{id}', ['App\Http\Controllers\ProductoController', 'destroy']);

Route::get('/edit/{id}', ['App\Http\Controllers\ProductoController', 'edit']);
Route::put('/edit/{id}', ['App\Http\Controllers\ProductoController', 'update'])->name('editar-producto');

Route::get('/producto', ['App\Http\Controllers\ProductoController', 'create']);
Route::post('/producto/crear', ['App\Http\Controllers\ProductoController', 'store'])->name('crear-producto');
