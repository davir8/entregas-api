<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::resource('users', 'UserController')->except([
    'edit', 'create', 'store'
]);

// Routes index, store, show, update e destroy for products
Route::resource('produtos', 'ProdutoController')->except([
    'edit', 'create'
]);

// Routes index, store, show, update e destroy for deliveries
Route::resource('entregas', 'EntregaController')->except([
    'edit', 'create'
]);

// Routes index, store, show, update e destroy for payments
Route::resource('pagamentos', 'PagamentoController')->except([
    'edit', 'create'
]);

// Routes index, store, show, update e destroy for address
Route::resource('enderecos', 'EnderecoController')->except([
    'edit', 'create'
]);

// Routes index, store, show, update e destroy for statuses
Route::resource('status', 'StatusController')->except([
    'edit', 'create'
]);
