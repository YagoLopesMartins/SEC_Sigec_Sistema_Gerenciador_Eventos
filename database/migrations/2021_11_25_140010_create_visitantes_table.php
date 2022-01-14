<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes', function (Blueprint $table) {
            // Visitante
            $table->id();
            $table->enum('naturalidade', ['Brasileiro', 'Sou Estrangeiro']);
            $table->string('cpf')->nullable();
            $table->string('passaporte')->nullable();
            $table->string('nome_completo');
            $table->date('data_nascimento');
            $table->string('contato');
            $table->string('email');
            $table->enum('deficiente', ['Sim', 'Não']);
            $table->string('nome_deficiencia')->nullable();
            
            $table->string('estado')->default('Ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitantes');
    }
}
