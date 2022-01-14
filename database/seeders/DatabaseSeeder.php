<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call([ 
            ClassificacaoIndicativaSeeder::class,
            EspacoSeeder::class,
            CategoriaSeeder::class, 
            SubCategoriaSeeder::class, 
            ResponsavelEventoSeeder::class,
            UsuarioSeeder::class,
            OrgaoSeeder::class,
            DiretoriaSeeder::class,
            GerenciaSeeder::class,
            PermissionSeeder::class,
            ProfileSeeder::class,
            UserSeeder::class,
            PautaSeeder::class,
        ]);
    }
}
