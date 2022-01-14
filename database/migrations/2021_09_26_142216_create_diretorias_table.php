<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiretoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diretorias', function (Blueprint $table) {
            $table->bigIncrements('diretoria_id');
            $table->string('diretoria_nome');
            $table->string('diretoria_estado')->default('Ativo');
            $table->bigInteger('orgao_id')->unsigned();
            $table->timestamps();

            $table->foreign('orgao_id')
                    ->references('orgao_id')
                    ->on('orgaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diretorias');
    }
}
