<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        DB::table('departamentos')->insert(['sigla'=>'RH','nome'=>'Recursos Humanos']);
        DB::table('departamentos')->insert(['sigla'=>'FN','nome'=>'Financeiro']);

        DB::table('funcionarios')->insert(['nome'=>'Joao','endereco'=>'rua X','departamento_id'=>1]);
        DB::table('funcionarios')->insert( ['nome'=>'Maria','endereco'=>'rua Y','departamento_id'=>1] );
        
        DB::table('projetos')->insert(['nome'=>'Projeto1','orcamento'=>10000,'dataInicio'=>'2020-11-19']);
        DB::table('projetos')->insert(['nome'=>'Projeto2','orcamento'=>20000,'dataInicio'=>'2019-03-02']);
    }
}
