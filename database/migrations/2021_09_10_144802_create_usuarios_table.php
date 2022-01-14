<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('usuario_id');
            $table->string('usuario_login');
            $table->string('usuario_password');
            $table->text('usuario_email');
            $table->string('usuario_nome');
            $table->text('usuario_imagem')->nullable();
            $table->string('usuario_estado')->default('Ativo');

            $table->unsignedBigInteger('gerencia_id');
            $table->unsignedBigInteger('orgao_id');
            $table->unsignedBigInteger('diretoria_id');

            $table->foreign('gerencia_id')
                    ->references('gerencia_id')
                    ->on('gerencias');

            $table->foreign('orgao_id')
                    ->references('orgao_id')
                    ->on('orgaos');

            $table->foreign('diretoria_id')
                    ->references('diretoria_id')
                    ->on('diretorias');
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
        Schema::dropIfExists('usuarios');
    }
}
