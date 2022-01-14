<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosVisitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_visitacaos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('horario_visitacao_data');
            $table->string('horario_visitacao_hora_chegada_estacao');
            $table->string('horario_visitacao_hora_inicio');
            $table->string('horario_visitacao_hora_fim');
            $table->integer('horario_visitacao_numero_vagas');
            $table->text('horario_visitacao_espacos_observacoes');
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
        Schema::dropIfExists('horarios_visitacaos');
    }
}
