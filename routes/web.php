<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\presentacioneController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('template');
});



Route::view('/panel','panel.index')->name('panel');

Route::view('/categorias','categoria.index');

Route::resource('categorias',categoriaController::class);   // Esto me genera la rutas 

Route::view('/marcas','marca.index');

Route::resource('marcas',marcaController::class);   // Esto me genera la rutas 

Route::resource('presentaciones',presentacioneController::class);   // Esto me genera la rutas 

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/401', function () {
    return view('pages.401');
});

Route::get('/404', function () {
    return view('pages.404');
});
Route::get('/500', function () {
    return view('pages.500');
});