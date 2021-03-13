<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome','endereco','departamento_id'];

    public function obterDepartamento() {
    	return $this->belongsTo('App\Departamento','departamento_id')->first();
    }

    public function obterProjetos() {
    	return $this->belongsToMany('App\Projeto')->get();
    }

}

 
/*

  $funcionarios = Funcionario::all();

  Funcionario::create(['nome'=>'joao','endereco'=>'rua x 44']);

*/