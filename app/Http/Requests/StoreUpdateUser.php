<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
            'name'              =>      ['required', 'string', 'min:2', 'max:255'],
            'password'          =>      ['required', 'string', 'min:6', 'max:16'],
            'email'             =>      ['required', 'string', 'email', 'min:3', 'max:255' /*,  "unique:users,email,{$id},id" */],
            'email_verified_at' =>      ['nullable'],
            'remember_token'    =>      ['nullable'],

            'usuario_login'     =>      ['nullable'],
            'usuario_imagem'    =>      ['nullable'],
            'usuario_estado'    =>      ['nullable'],
            'orgao_id'          =>      ['min:1', 'max:1'],
            'diretoria_id'      =>      ['min:1', 'max:1'],
            'gerencia_id'       =>      ['min:1', 'max:1'],
        ];

        if ($this->method() == 'PUT') {
            $rules['password'] = ['nullable', 'string', 'min:6', 'max:16'];
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
