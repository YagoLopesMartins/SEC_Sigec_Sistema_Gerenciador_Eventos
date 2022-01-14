<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'usuario_login' => 'jbrasil',
            'usuario_password' => 'c33367701511b4f6020ec61ded352059',
            'usuario_email' => 'email@gmail.com',
            'usuario_nome' => 'João Paulo',
            'usuario_imagem' => NULL,
            'usuario_estado' => 'Ativo',
            'gerencia_id' => 1,
            'orgao_id' => 1,
            'diretoria_id' => 1
        ]);
    }
}
