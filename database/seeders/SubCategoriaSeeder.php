<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categorias')->insert([
            'subcategoria_nome' => 'Clássica',
            'categoria_id' => 1
        ]);
        DB::table('sub_categorias')->insert([
            'subcategoria_nome' => 'Folclórica',
            'categoria_id' => 2
        ]);
        DB::table('sub_categorias')->insert([
            'subcategoria_nome' => 'Teatro de Sombras',
            'categoria_id' => 3
        ]);
    }
}
