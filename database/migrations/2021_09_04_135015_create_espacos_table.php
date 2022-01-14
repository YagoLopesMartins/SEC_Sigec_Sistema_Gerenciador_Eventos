<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacos', function (Blueprint $table) {
            $table->bigIncrements('espaco_id');
            $table->string('espaco_nome');
            $table->string('espaco_hora_funcionamento_inicio');
            $table->string('espaco_hora_funcionamento_fim');
            $table->string('espaco_endereco');
            $table->text('espaco_informacoes');
            $table->text('espaco_latidude');
            $table->text('espaco_longitude');
            $table->string('espaco_telefone');
            $table->string('espaco_email');
            $table->string('espaco_estado')->default('Ativo');
            $table->enum('espaco_disponivel_visitacao',['S','N']);

            $table->string('espaco_horario_segunda');
            $table->string('espaco_horario_terca');
            $table->string('espaco_horario_quarta');
            $table->string('espaco_horario_quinta');
            $table->string('espaco_horario_sexta');
            $table->string('espaco_horario_sabado');
            $table->string('espaco_horario_domingo');
         
            $table->bigInteger('espaco_grupo_id')->nullable();          // Relacionamento
            $table->bigInteger('espaco_responsavel_id')->nullable();    // Relacionamento
            $table->timestamps();

             $table->foreign('espaco_grupo_id')
                        ->references('espaco_grupo_id')
                        ->on('espaco_grupo');

             $table->foreign('espaco_responsavel_id')
                        ->references('espaco_responsavel_id')
                        ->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacos');
    }
}
