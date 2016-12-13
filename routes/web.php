<?php


// Admin Routes *************************************************************

Route::get('/admin/inicio', 'PagesController@adminInicio');

Route::get('/admin/presupuesto', 'PresupuestosController@addForm' );
Route::post('/admin/presupuesto', 'PresupuestosController@store');

Route::get('/admin/presupuestos/{presupuesto}', 'PresupuestosController@show');
Route::delete('/admin/presupuestos/{presupuesto}', 'PresupuestosController@delete');
Route::patch('/admin/presupuestos/{presupuesto}', 'PresupuestosController@update');


Route::post('/admin/presupuestos/{presupuesto}/precio', 'PreciosController@store');
Route::get('/admin/presupuestos/{presupuesto}/enviar', 'PresupuestosController@send');
Route::get('/admin/presupuestos/{presupuesto}/switch', 'PresupuestosController@switch');
Route::get('/admin/presupuestos/{presupuesto}/editar', 'PresupuestosController@showEdit');

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
/*Auth::routes();
Route::post('/admin/register','Auth\RegisterController@register');*/

Route::get('/admin', 'Auth\LoginController@showLoginForm');
Route::post('/admin', 'Auth\LoginController@login');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/password/email', 'Auth\ForgotPasswordController@SendResetLinkEmail');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/admin/logout', 'Auth\LoginController@logout');