<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

        // Insere funcionários
        DB::table('funcionarios')->insert(['created_at'=>Carbon::now(), 'updated_at'=>Carbon::now(), 'nome'=>'João da Silva', 'endereco'=>'Rua X', 'dataNascimento'=>'1990-02-12']);
        DB::table('funcionarios')->insert(['created_at'=>Carbon::now(), 'updated_at'=>Carbon::now(), 'nome'=>'Maria da Silva', 'endereco'=>'Rua Y', 'dataNascimento'=>'1993-03-23']);
        DB::table('funcionarios')->insert(['created_at'=>Carbon::now(), 'updated_at'=>Carbon::now(), 'nome'=>'Carla de Oliveira', 'endereco'=>'Rua Z', 'dataNascimento'=>'1995-11-02']);

        // Insere projetos
        DB::table('projetos')->insert(['descricao'=>'Projeto 1','orcamento'=>150000.00]);
        DB::table('projetos')->insert(['descricao'=>'Projeto 2','orcamento'=>250000.00]);
        DB::table('projetos')->insert(['descricao'=>'Projeto 3','orcamento'=>350000.00]);
        DB::table('projetos')->insert(['descricao'=>'Projeto 4','orcamento'=>450000.00]);

        // Insere departamentos
        DB::table('departamentos')->insert(['nome'=>'Recursos Humanos']);
        DB::table('departamentos')->insert(['nome'=>'Comercial']);
        DB::table('departamentos')->insert(['nome'=>'Financeiro']);
    }
}
