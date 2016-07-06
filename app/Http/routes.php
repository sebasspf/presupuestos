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
Route::post('/admin/presupuestos/{presupuesto}/precio', 'PreciosController@store');
Route::get('/admin/presupuestos/{presupuesto}/enviar', 'PresupuestosController@send');

Route::get('/admin/lista', 'PresupuestosController@list');

Route::get('/api/getcliente/{email}', 'ClientesController@getJson');

// General Pages Routes

Route::get('/', 'PagesController@inicio');


// Authentication Routes **************************************************************
Route::get('/admin', 'Auth\AuthController@showLoginForm');
Route::post('/admin', 'Auth\AuthController@login');

Route::get('/admin/logout', 'Auth\AuthController@logout');