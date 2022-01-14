<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUsuario extends FormRequest
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
        // $id = $this->segment(3);

        $rules = [
            'usuario_nome'      =>      ['required', 'string', 'min:2', 'max:255'],
            'usuario_login'     =>      ['required', 'string', 'min:3', 'max:255'],
            'usuario_password'  =>      ['required', 'string', 'min:6', 'max:16'],
            'usuario_email'     =>      ['required', 'string', 'email', 'min:3', 'max:255' /*,  "unique:users,email,{$id},id" */],
            'email_verified_at'  =>     ['nullable'],
            'orgao_id'          =>      ['min:1', 'max:255'],
            'diretoria_id'      =>      ['min:1', 'max:255'],
            'gerencia_id'       =>      ['min:1', 'max:255'],
            'remember_token'  =>        ['nullable'],
        ];

        if ($this->method() == 'PUT') {
            $rules['usuario_password'] = ['nullable', 'string', 'min:6', 'max:16'];
        }

        return $rules;

        // return [
        //     'usuario_login'             =>   "required|min:3|max:255",
        //     'usuario_password'          =>   "required|min:3|max:255",
        //     'usuario_email'             =>   "required|min:3|max:255",
        //     'usuario_nome'              =>   "required|min:3|max:255",
        //     // 'usuario_imagem'            =>   "required|min:3|max:255",
        //     'gerencia_id'               =>   "min:1|max:255",
        //     'orgao_id'                  =>   "min:1|max:255",
        //     'diretoria_id'              =>   "min:1|max:255",
        // ];
    }
}
