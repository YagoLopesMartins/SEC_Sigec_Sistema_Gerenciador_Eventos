<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsavelEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavel_evento', function (Blueprint $table) {
            $table->bigIncrements('responsavel_evento_id');
            $table->string('responsavel_evento_nome');
            $table->string('responsavel_evento_empresa');
            $table->string('responsavel_evento_telefone');
            $table->string('responsavel_evento_telefone2')->nullable();
            $table->string('responsavel_evento_telefone3')->nullable();
            $table->string('responsavel_evento_estado')->default('Ativo');
            $table->string('responsavel_evento_email');
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
        Schema::dropIfExists('responsavel_eventos');
    }
}
