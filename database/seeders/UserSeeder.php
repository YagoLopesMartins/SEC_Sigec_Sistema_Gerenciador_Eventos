<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yago Lopes',
            'usuario_login' => 'yago',
            'email' => 'ylm@icomp.ufam.edu.br',
            'password' => '$2y$10$PfqHgZpJEjck4QV5RKw5weuSzwZiqpTl5iAhLf/gWn.XxDpV1EOnG',
            'created_at' => now(),
            'updated_at' => now(),
            'gerencia_id' => 1,
            'orgao_id' => 1,
            'diretoria_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Yago Martins',
            'usuario_login' => 'yagolm',
            'email' => 'yagolopesmartins777@gmail.com',
            'password' => '$2y$10$PfqHgZpJEjck4QV5RKw5weuSzwZiqpTl5iAhLf/gWn.XxDpV1EOnG',
            'created_at' => now(),
            'updated_at' => now(),
            'gerencia_id' => 1,
            'orgao_id' => 1,
            'diretoria_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Giovanni Araujo',
            'usuario_login' => 'gio araujo',
            'email' => 'gio@gio.com.br',
            'password' => '$2y$10$PfqHgZpJEjck4QV5RKw5weuSzwZiqpTl5iAhLf/gWn.XxDpV1EOnG',
            'created_at' => now(),
            'updated_at' => now(),
            'gerencia_id' => 1,
            'orgao_id' => 1,
            'diretoria_id' => 1,
        ]);
    }
}
