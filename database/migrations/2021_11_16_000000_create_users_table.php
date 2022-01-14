<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('usuario_login');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('usuario_imagem')->nullable();
            $table->rememberToken();
            $table->string('usuario_estado')->default('Ativo');
            $table->timestamps();

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
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
