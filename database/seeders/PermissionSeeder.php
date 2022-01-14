<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('permissions')->insert([
            'name' => 'categorias',
            'description' => 'categorias',
        ]);
        DB::table('permissions')->insert([
            'name' => 'usuarios',
            'description' => 'usuarios',
        ]);
        DB::table('permissions')->insert([
            'name' => 'subcategorias',
            'description' => 'subcategorias',
        ]);
        DB::table('permissions')->insert([
            'name' => 'pautas',
            'description' => 'pautas',
        ]);
            DB::table('permissions')->insert([
                'name' => 'pautas_view',
                'description' => 'pode visualizar pautas',
            ]);
            DB::table('permissions')->insert([
                'name' => 'pautas_edit',
                'description' => 'pode editar pautas',
            ]);
            DB::table('permissions')->insert([
                'name' => 'pautas_create',
                'description' => 'pode cadastrar pautas',
            ]);
            DB::table('permissions')->insert([
                'name' => 'pautas_delete',
                'description' => 'pode excluir pautas',
            ]);
        DB::table('permissions')->insert([
            'name' => 'admin',
            'description' => 'admin',
        ]);
    }
}
