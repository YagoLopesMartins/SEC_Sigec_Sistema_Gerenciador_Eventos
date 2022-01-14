<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEspaco extends FormRequest
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
            'espaco_nome'                         =>   "required|min:3|max:255",
            'espaco_hora_funcionamento_inicio'    =>   "required|min:3|max:255",
            'espaco_hora_funcionamento_fim'       =>   "required|min:3|max:255",
            'espaco_endereco'                     =>   "required|min:3|max:255",
            'espaco_informacoes'                  =>   "required|min:3|max:255",
            'espaco_latidude'                     =>   "min:3|max:255",
            'espaco_longitude'                    =>   "min:3|max:255",
            'espaco_telefone'                     =>   "required|min:3|max:255",
            // 'espaco_estado'                       =>   "required|min:3|max:255",
            'espaco_disponivel_visitacao'         =>   "required|min:3|max:255",
            // 'espaco_grupo_id'                     =>   "required|min:3|max:255",
            // 'espaco_responsavel_id'               =>   "required|min:3|max:255"
            'espaco_horario_segunda'              =>   "required|min:3|max:255",
            'espaco_horario_terca'                =>   "required|min:3|max:255",
            'espaco_horario_quarta'               =>   "required|min:3|max:255",
            'espaco_horario_quinta'               =>   "required|min:3|max:255",
            'espaco_horario_sexta'                =>   "required|min:3|max:255",
            'espaco_horario_sabado'               =>   "required|min:3|max:255",
            'espaco_horario_domingo'              =>   "required|min:3|max:255",         
        ];
    }
}
