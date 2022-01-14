<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponsavelEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('responsavel_evento')->insert([
            'responsavel_evento_nome' => 'Vanderlan Soares dos Santos',
            'responsavel_evento_empresa' => 'Cia Fragmento Urbano',
            'responsavel_evento_telefone' => '(92) 99386-3387',
            'responsavel_evento_telefone2' => '',
            'responsavel_evento_telefone3' => '',
            'responsavel_evento_email' => 'ciafragmentourbano@hotmail.com / vanderbare@hotmail.com',
       ]);
       DB::table('responsavel_evento')->insert([
        'responsavel_evento_nome' => 'Flavia Cesar',
        'responsavel_evento_empresa' => 'MCI Brazil',
        'responsavel_evento_telefone' => '(11) 48102-28',
        'responsavel_evento_telefone2' => '(11) 98408-0068',
        'responsavel_evento_telefone3' => '',
        'responsavel_evento_email' => 'flavia.cesar@mci-group.com',
   ]);
    }
}
