<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome','endereco','dataNascimento'];

    public function projetos() {
    	return $this->belongsToMany('App\Projeto');
    }

    public function departamento() {
    	return $this->belongsTo('App\Departamento');
    }
}


// -----------------

// $f = new Funcionario();
// $f->nome = "Maria";
// $f->endereco="Rua X";
// $f->datanascimento="1090-04-07";
// ...
// $colecaoprojetos = $f->projetos();
