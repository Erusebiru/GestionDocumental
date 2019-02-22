<?php

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
	
    return view('layouts.listaClientes');
});
Route::get('/cliente', function () {
	
    return view('layouts.listaDetalleClientes');
});
Route::get('/cliente/detalle', function () {
	
    return view('layouts.listaDetalleVentas');
});

/*Para usar cualquier metodo HTTP
Route::any('/', function()
{
    return '¡Hola mundo!';
});*/