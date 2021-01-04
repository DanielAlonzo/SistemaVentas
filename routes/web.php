<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

 Route::get('/categoria/seleccionarCategoria','CategoriaController@seleccionarCategoria');
 Route::get('/rol/seleccionarRol', 'RolController@seleccionarRol');
|
*/

//PARA USUARIOS NO AUTENTICADOS
Route::group(['middleware'=>['guest']],function(){
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});

Route::group(['middleware'=>['auth']],function(){
    
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    
    Route::get('/main', function () {
        return view('contenido/contenido');
    })->name('main');

    // Route::group(['middleware' => ['Inventariador']], function () {
    //     Route::get('/categoria', 'CategoriaController@index');
    //     Route::post('/categoria/registrar', 'CategoriaController@store');
    //     Route::put('/categoria/actualizar', 'CategoriaController@update');
    //     Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
    //     Route::put('/categoria/activar', 'CategoriaController@activar');
    //     Route::get('/categoria/seleccionarCategoria','CategoriaController@seleccionarCategoria');

    //     Route::get('/articulo', 'ArticuloController@index');
    //     Route::post('/articulo/registrar', 'ArticuloController@store');
    //     Route::put('/articulo/actualizar', 'ArticuloController@update');
    //     Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
    //     Route::put('/articulo/activar', 'ArticuloController@activar');

    //     Route::get('/proveedor', 'ProveedorController@index');
    //     Route::post('/proveedor/registrar', 'ProveedorController@store');
    //     Route::put('/proveedor/actualizar', 'ProveedorController@update');

    // });

    // Route::group(['middleware' => ['Vendedor']], function () {
    //     Route::get('/cliente', 'ClienteController@index');
    //     Route::post('/cliente/registrar', 'ClienteController@store');
    //     Route::put('/cliente/actualizar', 'ClienteController@update');
    // });

    // Route::group(['middleware' => ['Administrador']], function () {
        
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/seleccionarCategoria','CategoriaController@seleccionarCategoria');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/seleccionarProveedor', 'ProveedorController@seleccionarProveedor');
        
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');

        Route::get('/descuento', 'DescuentoController@index');

        Route::get('/salida', 'SalidaController@index');

        Route::get('/rol', 'RolController@index');
        Route::get('/rol/seleccionarRol', 'RolController@seleccionarRol');
        
        Route::get('/user', 'UserController@index');
        Route::post('/user/registrar', 'UserController@store');
        Route::put('/user/actualizar', 'UserController@update');
        Route::put('/user/desactivar', 'UserController@desactivar');
        Route::put('/user/activar', 'UserController@activar');


        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');

        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
    // });

});
