<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVisitacaoEspacoHorarios extends FormRequest
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
            'horario_visitacao_espacos_data'            =>          'required|min:3|max:255',
            'horario_visitacao_espacos_hora_inicio'     =>          'required|min:1|max:255',
            'horario_visitacao_espacos_hora_fim'        =>          'required|min:1|max:255',
            'horario_visitacao_espacos_numero_vagas'    =>          'required|min:1|max:255',
            'horario_visitacao_espacos_observacoes'     =>          'required|min:1|max:255',
        ];
    }
}
