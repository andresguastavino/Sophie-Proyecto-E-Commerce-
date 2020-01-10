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
Route::get('/home/{id}', 'ProductoController@detalle');
Route::get('/home/categoria/{categoria_id}', 'ProductoController@filtrarPorCategoria');
Route::get('/home/marca/{marca_id}', 'ProductoController@filtrarPorMarca');

Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/carrito', 'HomeController@carrito')->name('carrito');
Route::get('/contacto', 'HomeController@contacto')->name('contacto');
Route::get('/politica_privacidad', 'HomeController@politica_privacidad')->name('politica_privacidad');

Route::get('/perfil', 'UserController@perfil')->name('perfil')->middleware('auth');

// Login con Google
Route::get('/google/login', 'Auth\LoginController@redirectToGoogle');
Route::get('/google/redireccion', 'Auth\LoginController@handleGoogleCallback');

// Login con Facebook
Route::get('/facebook/login', 'Auth\LoginController@redirectToFacebook');
Route::get('/facebook/redireccion', 'Auth\LoginController@handleFacebookCallback');

Auth::routes();
