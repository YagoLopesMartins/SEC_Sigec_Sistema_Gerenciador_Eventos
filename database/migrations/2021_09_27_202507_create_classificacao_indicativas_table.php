<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificacaoIndicativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classificacao_indicativa', function (Blueprint $table) {
            $table->bigIncrements('classificacao_indicativa_id');
            $table->string('classificacao_indicativa_titulo');
            $table->text('classificacao_indicativa_descricao');
            $table->text('classificacao_indicativa_simbolo');
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
        Schema::dropIfExists('classificacao_indicativa');
    }
}
