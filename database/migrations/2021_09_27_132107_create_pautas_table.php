<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePautasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pautas', function (Blueprint $table) {
            $table->bigIncrements('pauta_id');
            // Eventos  
            $table->enum('tipo_pauta', 
                            ['Disponibilização Externa Remunerada',
                            'Disponibilização Externa Não Remunerada',
                            'Disponibilização Interna Remunerada',
                            'Disponibilização Interna Não Remunerada',
                            'Transmissão On-line']);
            $table->string('link_transmissao_online')->nullable();
            $table->bigInteger('categoria_id')->nullable();             // Relacionamento
            $table->bigInteger('subcategoria_id')->nullable();          // Relacionamento
            $table->enum('possui_venda_ingresso', ['Sim','Não']);
            $table->string('link_venda_ingresso')->nullable();
            // Dados Básicos
            $table->enum('secretaria_orgao', 
                            ['Secretaria de Estado de Cultura',
                            'Agência Amazonense de Desenv. Cultural', 
                            'Todos']);
            $table->bigInteger('diretoria_id')->nullable();             // Relacionamento
            $table->bigInteger('gerencia_id')->nullable();              // Relacionamento
            $table->string('numero_documento_fisico')->nullable();
            $table->string('titulo');
            $table->text('descricao');
            $table->bigInteger('responsavel_interno_id')->nullable();   // Relacionamento
            $table->bigInteger('responsavel_evento_id')->nullable();    // Relacionamento
            $table->text('observacoes');
            $table->text('resumo_da_analise')->nullable();
            // Agenda
            $table->bigInteger('espaco_id')->nullable();                // Relacionamento
            $table->date('agenda_data_inicio');
            $table->string('agenda_hora_inicio');
            $table->date('agenda_data_fim');
            $table->string('agenda_hora_fim');
            // Faixa
            $table->bigInteger('classificacao_indicativa_id')->nullable();// Relacionamento
            // Imagem
            $table->string('imagem_titulo')->nullable();
            $table->string('imagem_descricao')->nullable();
            $table->text('imagem_arquivo')->nullable();
            $table->enum('imagem_liberar_para_publicacao', ['Sim','Não']);
            // Analise
            $table->enum('pauta_analise', ['Sim','Não']);
            // Anexos
            $table->text('anexos_arquivo')->nullable(); 
            // Incrições
            // $table->bigInteger('espaco_id')->nullable();                // Relacionamento
            $table->integer('incricoes_numero_vagas')->nullable();
            $table->date('incricoes_data_inicio')->nullable();
            $table->string('incricoes_hora_inicio')->nullable();
            $table->date('incricoes_data_fim')->nullable();
            $table->string('incricoes_hora_fim')->nullable();
            $table->integer('incricoes_limite_dependentes')->default(0);
            $table->text('incricoes_observacoes')->nullable();

            $table->string('pauta_estado')->default('Ativo');
            $table->bigInteger('usuario_criacao_id')->nullable();       // Relacionamento
            $table->string('pauta_status')->default('Aberto');
            $table->timestamps();

             $table->foreign('categoria_id')
                        ->references('categoria_id')
                        ->on('categorias');
             $table->foreign('subcategoria_id')
                        ->references('subcategoria_id')
                        ->on('subcategorias');

             $table->foreign('diretoria_id')
                        ->references('diretoria_id')
                        ->on('diretorias');
             $table->foreign('gerencia_id')
                        ->references('gerencia_id')
                        ->on('gerencias');

             $table->foreign('responsavel_interno_id')
                        ->references('id')
                        ->on('users');
             $table->foreign('responsavel_evento_id')
                        ->references('responsavel_evento_id')
                        ->on('responsavel_evento');

             $table->foreign('espaco_id')
                        ->references('espaco_id')
                        ->on('espacos');

             $table->foreign('classificacao_indicativa_id')
                        ->references('classificacao_indicativa_id')
                        ->on('classificacao_indicativa');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pautas');
    }
}
