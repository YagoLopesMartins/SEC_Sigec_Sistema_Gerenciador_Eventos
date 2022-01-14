<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePauta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);

        $rules = [
            
            // Dados básicos  
            'secretaria_orgao' =>               ['min:1', 'max:500'],            // relacionamento // enum
            'diretoria_id' =>                   ['nullable','min:1', 'max:1'],   // relacionamento
            'gerencia_id' =>                    ['nullable','min:1', 'max:1'],   // relacionamento
            'numero_documento_fisico' =>        ['nullable','min:1', 'max:100'],
            'titulo' =>                         ['min:3', 'max:500'],
            'descricao' =>                      ['min:3', 'max:500'],
            'responsavel_interno_id' =>         ['nullable','min:1', 'max:500'], // relacionamento
            'responsavel_evento_id' =>          ['nullable','min:1', 'max:500'], // relacionamento
            'observacoes' =>                    ['nullable','min:3', 'max:500'],
            'resumo_da_analise' =>              ['nullable', 'min:3', 'max:500'],
            // Evento
            'tipo_pauta' =>                     ['min:3', 'max:500'],            // enum
            'link_transmissao_online' =>        ['nullable','min:3', 'max:500'], 
            'categoria_id' =>                   ['nullable','min:1', 'max:500'], // relacionamento
            'subcategoria_id' =>                ['nullable','min:1', 'max:500'], // relacionamento
            'possui_venda_ingresso' =>          ['nullable','min:3', 'max:500'],            // enum
            'link_venda_ingresso' =>            ['nullable','min:3', 'max:500'], 
            // Agenda
            'espaco_id' =>                      ['nullable','min:1', 'max:500'], // relacionamento
            'agenda_data_inicio' =>             ['min:3', 'max:500'],
            'agenda_hora_inicio' =>             ['min:3', 'max:500'],
            'agenda_data_fim' =>                ['min:3', 'max:500'],
            'agenda_hora_fim' =>                ['min:3', 'max:500'],
            // Classificação indicativa
            'classificacao_indicativa_id' =>    ['nullable','min:1', 'max:500'], // relacionamento

            // Imagens
            'imagem_titulo' =>                  ['nullable','min:3', 'max:500'],
            'imagem_descricao' =>               ['nullable','min:3', 'max:500'],
            'imagem_arquivo' =>                 ['nullable','image'],
            'imagem_liberar_para_publicacao' => ['nullable','min:1', 'max:500'],           // enum
            // Analise
            'pauta_analise' =>                  ['nullable','min:1', 'max:500'],           // enum
            // Anexos
            'anexos_arquivo' =>                 ['nullable','min:1', 'max:500'],
            // Incrições
            'espaco_id' =>                      ['nullable','min:1', 'max:1'],
            'incricoes_numero_vagas' =>         ['nullable','min:1', 'max:500'],
            'incricoes_limite_dependentes' =>   ['nullable','min:1', 'max:500'],
            'incricoes_data_inicio' =>          ['nullable','min:3', 'max:500'],
            'incricoes_hora_inicio' =>          ['nullable','min:3', 'max:500'],
            'incricoes_data_fim' =>             ['nullable','min:3', 'max:500'],
            'incricoes_hora_fim' =>             ['nullable','min:3', 'max:500'], 
            'incricoes_observacoes' =>          ['nullable','min:3', 'max:500'],
            'usuario_criacao_id' =>             ['nullable','min:1', 'max:500'],

            // Status
            'pauta_status' =>                   ['nullable','min:1', 'max:500'],           // enum
        ];

        if ($this->method() == 'PUT') {
            $rules['imagem_arquivo'] = ['nullable', 'image'];
        }

        return $rules;
    }
}
