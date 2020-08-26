<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaFuncionario extends Migration
{
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id'); // inteiro - autoincremento
            $table->string('nome',100);
            $table->string('endereco',100);
            $table->timestamps();  // define colunas created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
