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

Route::get('/', 'ClientesController@getClientes');

Route::get('/cliente/{id}','ClientesController@getCliente');

Route::post('/cliente/guardarCambios/{id}','ClientesController@guardarCambios');

Route::get('/create', function () {
	
    return view('layouts.nuevoCliente');
});

Route::get('/error', function () {
	
    return view('layouts.error');
});


Route::post('/guardarCliente', 'ClientesController@guardarCliente');

Route::get('/cliente/detalle/{id}', 'DocumentosController@getDocumentos');

Route::post('/subirDocumento/{id}', 'StorageController@subirDocumento');

Route::post('/filtrarClientes', 'ClientesController@getFiltroCliente');

Route::post('/filtrarVenta/{id}', 'ClientesController@getFiltroVenta');

Route::get('/download/{nombre}' , 'StorageController@descargarDocumento');

Route::post('/guardarVenta', 'ClientesController@guardarVenta');


Route::get('/nuevaVenta/{id}', function ($id){
    return view('layouts.nuevaVenta',['id'=>$id]);
});