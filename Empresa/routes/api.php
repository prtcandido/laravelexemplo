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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/funcionarios/{funcionario}','FuncionarioController@apiFind');

Route::get('/funcionarios','FuncionarioController@apiAll');

Route::post('/funcionarios','FuncionarioController@apiStore');

Route::put('/funcionarios/{funcionario}','FuncionarioController@apiUpdate');

Route::delete('/funcionarios/{funcionario}','FuncionarioController@apiDelete');