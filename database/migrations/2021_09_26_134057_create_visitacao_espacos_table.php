<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitacaoEspacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_visitacao_espacos', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('espaco_id'); // Relacionamento
                $table->string('horario_visitacao_espacos_data');
                $table->string('horario_visitacao_espacos_hora_inicio');
                $table->string('horario_visitacao_espacos_hora_fim');
                $table->integer('horario_visitacao_espacos_numero_vagas');
                $table->text('horario_visitacao_espacos_observacoes');
            $table->timestamps();

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
        Schema::dropIfExists('horarios_visitacao_espacos');
    }
}
