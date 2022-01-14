<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PautaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pautas')->insert([
            'tipo_pauta' => 'Disponibilização Externa Remunerada', 
            'link_transmissao_online' => NULL, 
            'categoria_id' => NULL,  
            'subcategoria_id' => NULL,  
            'possui_venda_ingresso' => 'Não', 
            'link_venda_ingresso' => NULL,  
            'secretaria_orgao' => 'Secretaria de Estado de Cultura', 
            'diretoria_id' => 1, 
            'gerencia_id' => 1, 
            'numero_documento_fisico' => '19171', 
            'titulo' => 'Qualquer', 
            'descricao' => 'Qualquer', 
            'responsavel_interno_id' => NULL,
            'responsavel_evento_id' => NULL,
            'observacoes' => 'Qualquer', 
            'resumo_da_analise' => 'Qualquer', 
            'espaco_id' => NULL, 
            'agenda_data_inicio' => '1994-02-26', 
            'agenda_hora_inicio' => '20:00', 
            'agenda_data_fim' => '1993-03-27', 
            'agenda_hora_fim' => '22:00', 
            'classificacao_indicativa_id' => NULL, 
            'imagem_titulo' => NULL, 
            'imagem_descricao' => NULL, 
            'imagem_arquivo' => NULL,  
            'imagem_liberar_para_publicacao' => 'Não', 
            'pauta_analise' => 'Sim', 
            'anexos_arquivo' => NULL,  
            'espaco_id' => NULL, 
            'incricoes_numero_vagas' => '50', 
            'incricoes_data_inicio' => '1994-02-26', 
            'incricoes_hora_inicio' => '20:00', 
            'incricoes_data_fim' => '1993-06-27', 
            'incricoes_hora_fim' => '22:00', 
            'incricoes_limite_dependentes' => 1, 
            'incricoes_observacoes' => 'Qualquer', 
            'usuario_criacao_id' => NULL,
            'pauta_status' => 'Aberto',
        ]);
        DB::table('pautas')->insert([
            'tipo_pauta' => 'Disponibilização Externa Remunerada', 
            'link_transmissao_online' => NULL, 
            'categoria_id' => 1,  
            'subcategoria_id' => 1,  
            'possui_venda_ingresso' => 'Não', 
            'link_venda_ingresso' => NULL,  
            'secretaria_orgao' => 'Secretaria de Estado de Cultura', 
            'diretoria_id' => 1, 
            'gerencia_id' => 1, 
            'numero_documento_fisico' => '191713', 
            'titulo' => 'Qualquer', 
            'descricao' => 'Qualquer', 
            'responsavel_interno_id' => NULL,
            'responsavel_evento_id' => NULL,
            'observacoes' => 'Qualquer', 
            'resumo_da_analise' => 'Qualquer', 
            'espaco_id' => 1, 
            'agenda_data_inicio' => '1994-02-26', 
            'agenda_hora_inicio' => '20:00', 
            'agenda_data_fim' => '1993-03-27', 
            'agenda_hora_fim' => '22:00', 
            'classificacao_indicativa_id' => 1, 
            'imagem_titulo' => NULL, 
            'imagem_descricao' => NULL, 
            'imagem_arquivo' => NULL,  
            'imagem_liberar_para_publicacao' => 'Não', 
            'pauta_analise' => 'Sim', 
            'anexos_arquivo' => NULL,  
            'espaco_id' => 1, 
            'incricoes_numero_vagas' => '50', 
            'incricoes_data_inicio' => '1994-02-26', 
            'incricoes_hora_inicio' => '20:00', 
            'incricoes_data_fim' => '1993-06-27', 
            'incricoes_hora_fim' => '22:00', 
            'incricoes_limite_dependentes' => 1, 
            'incricoes_observacoes' => 'Qualquer', 
            'usuario_criacao_id' => NULL,
            'pauta_status' => 'Aprovado',
        ]);
    }
}
