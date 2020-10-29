<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    // Definir as propriedades do model
    protected $fillable = ['nomeOriginal','nomeArmazenamento','funcionario_id'];

    // Não haverá as propriedades created_at e updated_at
    public $timestamps = false;

    // Método para obter o objeto Funcionario associado, ao qual o documento pertence.
    public function funcionario(){
    	return $this->belongsTo('App\Funcionario');
    }
}
