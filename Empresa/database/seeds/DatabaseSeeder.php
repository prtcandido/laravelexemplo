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
        DB::table('funcionarios')->insert(['nome'=>'Joao','endereco'=>'rua X']);
        DB::table('funcionarios')->insert(['nome'=>'Maria','endereco'=>'rua Y']);

		DB::table('projetos')->insert(['nome'=>'Projeto1','prazo'=>'12','orcamento'=>10000]);
		DB::table('projetos')->insert(['nome'=>'Projeto2','prazo'=>'36','orcamento'=>20000]);        
    }
}
