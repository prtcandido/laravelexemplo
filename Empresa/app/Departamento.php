<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['sigla','nome'];

    public function obterFuncionarios() {
    	return $this->hasMany('App\Funcionario','departamento_id','id')->get();
    }

}
