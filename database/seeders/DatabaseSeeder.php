<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setores')->insert([
            ['nome' => 'Administração'],
            ['nome' => 'Recepção'],
            ['nome' => 'Secretaria'],
            ['nome' => 'Assistência Social'],
            ['nome' => 'Contabilidade'],
            ['nome' => 'Pedagogia'],
            ['nome' => 'Educadores'],
            ['nome' => 'Limpeza'],
            ['nome' => 'Cozinha'],
            ['nome' => 'Apoio'],
            ['nome' => 'Jardinagem']
        ]);

        DB::table('locaisAtendimento')->insert([
            ['descricao' => 'Porta'],
            ['descricao' => 'Telefone']
        ]);
    }
}
