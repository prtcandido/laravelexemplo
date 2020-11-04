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

// Usada para acionar formulário usado pelo usuário para selecionar o documento PDF.
// Note o id do funcionario, ao qual o documento sendo carrega pertence, sendo fornecido na URL. Note que o método é GET. Esta rota aciona a função (método) "documento" do FuncionarioController.
Route::get('funcionario/{id}/documento','FuncionarioController@documento');

// Usada para acionar a função documentoGravar do FuncionarioController que inserirá objeto Documento no BD, conforme dados entrados no formulário pelo usuário, e armazenará o PDF em Storage
Route::post('funcionario/documento','FuncionarioController@documentoGravar');

// Usada para obter um documento armazenado exemplificado pela URL a seguir.
// localhost:8000/documento?nome=abc.pdf
Route::get('obtemdocumento',function(){
    return response()->file(storage_path("app/documentos/".Request::get('nome')));
});

Route::resource('projeto','ProjetoController');

Route::resource('automovel','AutomovelController');

Route::get('documento','FuncionarioController@documento');
