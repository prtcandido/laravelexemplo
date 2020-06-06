<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $fillable = ['id','placa','preco','cor'];

    public $timestamps = false; 
}
