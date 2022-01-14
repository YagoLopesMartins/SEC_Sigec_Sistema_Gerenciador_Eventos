<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAgendamentoVisitacao extends FormRequest
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
        return [
            'naturalidade'              =>          'nullable|min:3|max:255',
            'cpf'                       =>          'nullable|min:11|max:35',
            'passaporte'                =>          'nullable',
            'nome_completo'             =>          'nullable|min:3|max:255',
            'data_nascimento'           =>          'nullable|min:3|max:255',
            'contato'                   =>          'nullable|min:3|max:255',
            'email'                     =>          'nullable|min:3|max:255',
            'deficiente'                =>          'nullable|min:3|max:255',
            'nome_deficiencia'          =>          'nullable|min:3|max:255',

            'dependente_nome'           =>          'nullable|min:3|max:255',
            'dependente_data_nascimento'=>          'nullable|min:3|max:255',
            'dependente_cpf'            =>          'nullable|min:11|max:15',

            'dependente2_nome'          =>          'nullable|min:3|max:255',
            'dependente2_data_nascimento'=>          'nullable|min:3|max:255',
            'dependente2_cpf'           =>          'nullable|min:11|max:15',

            'horario_visitacao_id'      =>          'required|min:1|max:255',
            
            'qr_code'                   =>          'nullable|min:3|max:255',
            'estado'                    =>          'nullable|min:3|max:255',
            'visitou'                   =>          'nullable|min:3|max:255',
        ];
    }
}
