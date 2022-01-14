<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVisitacao extends FormRequest
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
            'cpf'                       =>          'nullable|min:3|max:255',
            'passaporte'                =>          'nullable|min:3|max:255',
            'nome_completo'             =>          'nullable|min:3|max:255',
            'data_nascimento'           =>          'nullable|min:3|max:255',
            'contato'                   =>          'nullable|min:3|max:255',
            'email'                     =>          'nullable|min:3|max:255',
            'deficiente'                =>          'nullable|min:3|max:255',
            'nome_deficiencia'          =>          'nullable|min:3|max:255',

            'dependente_nome'           =>          'nullable|min:3|max:255',
            'dependente_data_nascimento'          =>          'nullable|min:3|max:255',
            'dependente_cpf'            =>          'nullable|min:3|max:255',

            'dependente2_nome'          =>          'nullable|min:3|max:255',
            'dependente2_data_nascimento'          =>          'nullable|min:3|max:255',
            'dependente2_cpf'          =>          'nullable|min:3|max:255',

            'espaco_id'                 =>          'nullable|min:3|max:255',
            'dia_visita'                =>          'nullable|min:3|max:255',
            'hora_visita'               =>          'nullable|min:3|max:255',
            'qr-code'                   =>          'nullable|min:3|max:255',
            'estado'                    =>          'nullable|min:3|max:255',
            'visitou'                   =>          'nullable|min:3|max:255',
        ];
    }
}
