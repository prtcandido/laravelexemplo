<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarColunaDepId extends Migration
{
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->bigInteger('departamento_id')->unsigned()->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
    }

    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropColumn('departamento_id');
        });
    }
}
