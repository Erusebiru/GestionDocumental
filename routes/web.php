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
Route::get('/',['uses' => 'ClientesController@getClientesApi', 'as' => '/']);

Route::get('/gescliadm/cliente/{id}', ['uses' => 'ClientesController@getCliente', 'as' => 'cliente']);

Route::post('/gescliadm/cliente/guardarCambios/{id}','ClientesController@guardarCambios');

Route::get('/gescliadm/create', function () {
    return view('layouts.nuevoCliente');
})->name('nuevoCliente');

Route::get('/gescliadm/error', function () {
    return view('layouts.error');
});


Route::post('/gescliadm/guardarCliente', 'ClientesController@guardarCliente');

Route::get('/gescliadm/cliente/detalle/{id}',['uses' => 'DocumentosController@getDocumentos', 'as' => 'detalle']);

Route::post('/gescliadm/subirDocumento/{id}', 'StorageController@subirDocumento');

Route::post('/', 'ClientesController@getFiltroCliente');

Route::post('/gescliadm/cliente/{id}', 'ClientesController@getFiltroVenta');

Route::get('/gescliadm/download/{nombre}/{nombreReal}' , 'StorageController@descargarDocumento');

Route::post('/gescliadm/guardarVenta', 'ClientesController@guardarVenta');


Route::get('/gescliadm/nuevaVenta/{id}', function ($id){
    return view('layouts.nuevaVenta',['id'=>$id]);
})->name('nuevaVenta');

Route::post('/gescliadm/reemplazarDocumento/{id}/{tipo}/{nombreAntiguo}', 'StorageController@reemplazarDocumento');
