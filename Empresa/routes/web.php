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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('funcionario','FuncionarioController');
Route::get('funcionario/{id}/documento','FuncionarioController@documento');
Route::post('funcionario/documento','FuncionarioController@documentoGravar');

Route::resource('projeto','ProjetoController');

Route::resource('automovel','AutomovelController');

Route::get('documento','FuncionarioController@documento');
