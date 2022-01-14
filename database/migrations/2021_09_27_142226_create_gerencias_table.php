<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerencias', function (Blueprint $table) {
            $table->bigIncrements('gerencia_id');
            $table->string('gerencia_nome');
            $table->string('gerencia_estado')->default('Ativo');
            $table->unsignedBigInteger('diretoria_id');
            $table->timestamps();

            $table->foreign('diretoria_id')
                    ->references('diretoria_id')
                    ->on('diretorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerencias');
    }
}
