<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiretoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diretorias')->insert([
            'diretoria_nome' => 'Diretoria de Administração e Finanças',
            'orgao_id' => 1,
        ]);
        DB::table('diretorias')->insert([
            'diretoria_nome' => 'Diretoria de Eventos',
            'orgao_id' => 1,
        ]);
        DB::table('diretorias')->insert([
            'diretoria_nome' => 'Diretoria do Teatro Amazonas',
            'orgao_id' => 1,
        ]);
    }
}
