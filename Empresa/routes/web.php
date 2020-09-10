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

Route::resource('projeto','ProjetoController');

// Route::get(  '/teste' , function() { return '<html><body><h1>Olá</h1></body></html>'; }   );

// Route::get(  '/teste1' , function() { return view('teste1'); }   );

// Route::get(  '/teste2' , 'TesteController@fteste' );

// Route::get( '/funcionario',  'TesteController@listaNome' );

// Route::get( '/funcionario/create', 'TesteController@enviarFormularioCreate');

// Route::post( '/funcionario' , 'TesteController@gravarFuncionario');




