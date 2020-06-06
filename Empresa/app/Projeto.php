<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = ['descricao','orcamento'];

    public function funcionarios() {
    	return $this->belongsToMany('App\Funcionario');
    }
}
