<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateResponsavelEvento extends FormRequest
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
            'responsavel_evento_nome'           =>   "required|min:3|max:255",
            'responsavel_evento_empresa'        =>   "required|min:3|max:255",
            'responsavel_evento_telefone'       =>   "required|min:8|max:255",
            'responsavel_evento_telefone2'      =>   "nullable|min:8|max:255",
            'responsavel_evento_telefone3'      =>   "nullable|min:8|max:255",
            'responsavel_evento_email'          =>   "required|min:3|max:255",
        ];
    }
}
