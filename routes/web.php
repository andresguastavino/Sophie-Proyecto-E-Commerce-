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

Route::get('/', 'ProductoController@listado')->name('home');
Route::get('/home', 'ProductoController@listado')->name('home');
Route::get('/home/{id}', 'ProductoController@detalle')->name('home.detalle');
Route::get('/home/categoria/{categoria_id}', 'ProductoController@filtrarPorCategoria')->name('home.filtrarPorCategoria');
Route::get('/home/marca/{marca_id}', 'ProductoController@filtrarPorMarca')->name('home.filtrarPorMarca');

Route::get('/carrito', 'CarritoController@listado');
Route::post('/carrito/agregar', 'CarritoController@agregar');
Route::post('/carrito/quitar', 'CarritoController@quitar');
Route::post('/carrito/vaciar', 'CarritoController@vaciar');

Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/politica_privacidad', 'HomeController@politica_privacidad')->name('politica_privacidad');

Route::get('/contacto', 'ConsultaController@contacto')->name('contacto');
Route::post('/contacto', 'ConsultaController@enviar');

Route::get('/compra/exito', 'HomeController@compraExito');

Route::get('/perfil', 'UserController@perfil')->name('perfil')->middleware('auth');
Route::post('/perfil', 'UserController@actualizar')->middleware('auth');

// Login con Google
Route::get('/google/login', 'Auth\LoginController@redirectToGoogle');
Route::get('/google/redireccion', 'Auth\LoginController@handleGoogleCallback');

// Login con Facebook
Route::get('/facebook/login', 'Auth\LoginController@redirectToFacebook');
Route::get('/facebook/redireccion', 'Auth\LoginController@handleFacebookCallback');

// Mercadopago
Route::post('/carrito/comprar', 'CarritoController@comprar');

Auth::routes();
