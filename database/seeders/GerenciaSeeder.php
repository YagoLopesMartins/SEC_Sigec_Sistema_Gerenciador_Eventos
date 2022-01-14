<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GerenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gerencias')->insert([
            'gerencia_nome' => 'Setor de TI',
            'diretoria_id' => 1,
        ]);
        DB::table('gerencias')->insert([
            'gerencia_nome' => 'SEMAD',
            'diretoria_id' => 1,
        ]);
        DB::table('gerencias')->insert([
            'gerencia_nome' => 'Museu do Seringal Vila Paraíso',
            'diretoria_id' => 1,
        ]);
    }
}
