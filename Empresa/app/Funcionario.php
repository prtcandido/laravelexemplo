<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome','endereco'];
}

 
/*

  $funcionarios = Funcionario::all();

  Funcionario::create(['nome'=>'joao','endereco'=>'rua x 44']);

*/