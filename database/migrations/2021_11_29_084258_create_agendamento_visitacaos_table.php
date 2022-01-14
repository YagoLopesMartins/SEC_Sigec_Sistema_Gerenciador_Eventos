<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentoVisitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamento_visitacaos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
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
            
            // Horario da Visita
            $table->unsignedBigInteger('horario_visitacao_id');  // Relacionamento
        
            // Controle de entrada
            $table->string('qr_code')->nullable();
            $table->string('estado')->default('Ativo');
            $table->char('visitou')->nullable();
            $table->timestamps();

            // Relacionamento
            $table->foreign('horario_visitacao_id')
                    ->references('id')
                    ->on('horarios_visitacaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamento_visitacaos');
    }
}
