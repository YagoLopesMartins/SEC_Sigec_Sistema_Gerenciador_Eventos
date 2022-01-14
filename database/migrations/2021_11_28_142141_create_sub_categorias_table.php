<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categorias', function (Blueprint $table) {
            $table->bigIncrements('subcategoria_id');
            $table->string('subcategoria_nome')->unique();
            $table->string('subcategoria_estado')->default('Ativo');
            $table->bigInteger('categoria_id')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')
                    ->references('categoria_id')
                    ->on('categorias')
                    ->onDelete('cascate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categorias');
    }
}
