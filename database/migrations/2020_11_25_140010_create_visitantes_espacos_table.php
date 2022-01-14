<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitantesEspacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes_espacos', function (Blueprint $table) {
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

            // Dependentes
            $table->string('dependente_nome')->nullable();  
            $table->string('dependente_cpf')->nullable();
            $table->string('dependente_data_nascimento')->nullable();

            // Dependentes 02
            $table->string('dependente2_nome')->nullable();  
            $table->string('dependente2_cpf')->nullable();
            $table->string('dependente2_data_nascimento')->nullable();
            
            // Visita
            $table->unsignedBigInteger('espaco_id');  // Relacionamento
            $table->string('dia_visita');
            $table->string('hora_visita');

            // Controle de entrada
            $table->string('qr-code')->nullable();
            $table->string('estado')->default('Ativo');
            $table->char('visitou')->nullable();
            $table->timestamps();

            // Relacionamento
            $table->foreign('espaco_id')
                    ->references('espaco_id')
                    ->on('espacos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitantes_espacos');
    }
}
