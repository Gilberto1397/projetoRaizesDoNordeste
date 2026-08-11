<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 * @property string $senha
 */
class AutenticacaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'senha' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'E-mail é obrigatório.',
            'email.email' => 'O e-mail informado é inválido.',
            'senha.required' => 'Senha é obrigatória.',
            'senha.string' => 'A senha informada é inválida.',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'senha' => strip_tags($this->senha),
        ]);
    }
}
