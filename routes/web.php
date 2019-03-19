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
Route::get('/',['uses' => 'ClientesController@getClientes', 'as' => '/']);

//Route::name('cliente')->get('/cliente/{id}', 'ClientesController@getCliente');

//Route::get('/cliente/{id}','ClientesController@getCliente');
Route::get('/cliente/{id}', ['uses' => 'ClientesController@getCliente', 'as' => 'cliente']);

Route::post('/cliente/guardarCambios/{id}','ClientesController@guardarCambios');

Route::get('/create', function () {
	
    return view('layouts.nuevoCliente');
});

Route::get('/error', function () {
	
    return view('layouts.error');
});


Route::post('/guardarCliente', 'ClientesController@guardarCliente');

Route::get('/cliente/detalle/{id}',['uses' => 'DocumentosController@getDocumentos', 'as' => 'detalle']);

//Route::name('venta')->get('/cliente/detalle/{id}', 'DocumentosController@getDocumentos');

Route::post('/subirDocumento/{id}', 'StorageController@subirDocumento');

Route::post('/', 'ClientesController@getFiltroCliente');

Route::post('/cliente/{id}', 'ClientesController@getFiltroVenta');

Route::get('/download/{nombre}' , 'StorageController@descargarDocumento');

Route::post('/guardarVenta', 'ClientesController@guardarVenta');


Route::get('/nuevaVenta/{id}', function ($id){
    return view('layouts.nuevaVenta',['id'=>$id]);
});