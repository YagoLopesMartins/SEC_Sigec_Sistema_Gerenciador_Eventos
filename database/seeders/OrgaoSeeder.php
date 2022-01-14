<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrgaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orgaos')->insert([
            'orgao_nome' => 'Secretaria de Estado de Cultura',
            'orgao_sigla' => 'SEC',
        ]);
        DB::table('orgaos')->insert([
            'orgao_nome' => 'Agência Amazonense de Desenv. Cultural',
            'orgao_sigla' => 'AG',
        ]);
        DB::table('orgaos')->insert([
            'orgao_nome' => 'Todos',
            'orgao_sigla' => 'ALL',
        ]);
    }
}
