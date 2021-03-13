<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = ['nome','orcamento','dataInicio'];

    public function obterFuncionarios() {
    	return $this->belongsToMany('App\Funcionario')->get();
    }
}
