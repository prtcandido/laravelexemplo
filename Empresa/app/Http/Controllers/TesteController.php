<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function fteste () { return view('teste1'); }

    public function listaNome() {
    	$f = \App\Funcionario::all();
    	return view('vListaNome')->with('vf',$f);
    }

    public function enviarFormularioCreate() {
    	return view('vFormularioCreate');
    }

    public function gravarFuncionario(Request $request) {
    	\App\Funcionario::create( $request->all() );
    	return redirect('/funcionario');
    }
}
