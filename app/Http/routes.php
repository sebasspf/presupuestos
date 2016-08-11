<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Admin Routes *************************************************************

Route::get('/admin/inicio', 'PagesController@adminInicio');

Route::get('/admin/presupuesto', 'PresupuestosController@addForm' );
Route::post('/admin/presupuesto', 'PresupuestosController@store');

Route::get('/admin/presupuestos/{presupuesto}', 'PresupuestosController@show');
Route::delete('/admin/presupuestos/{presupuesto}', 'PresupuestosController@delete');


Route::post('/admin/presupuestos/{presupuesto}/precio', 'PreciosController@store');
Route::get('/admin/presupuestos/{presupuesto}/enviar', 'PresupuestosController@send');

Route::get('/admin/precios/{precio}','PreciosController@show');
Route::post('/admin/precios/{precio}','PreciosController@update');

Route::get('/admin/lista', 'PresupuestosController@list');

// General Pages Routes *******************************************************

Route::get('/', 'PagesController@inicio');
Route::get('/presupuestos', 'PresupuestosController@showUser');
Route::post('/presupuestos', 'PreciosController@respond');

// Utilities Routes ***********************************************************

Route::get('/api/getcliente/{email}', 'ClientesController@getJson');

// Authentication Routes **************************************************************
Route::get('/admin', 'Auth\AuthController@showLoginForm');
Route::post('/admin', 'Auth\AuthController@login');

Route::get('/admin/logout', 'Auth\AuthController@logout');