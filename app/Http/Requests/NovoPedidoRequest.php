<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovoPedidoRequest extends FormRequest
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
            "formaPagamento" => "required|integer|between:1,4",
            "canalPedido" => "required|integer|between:1,5",
            "nomeCliente" => "string",
            "observacao" => "string",
            "email" => "required|string",
            "senha" => "required|string",
            "itens" => "array|required",
            "itens.*.quantidade" => "required|integer",
            "itens.*.produtoId" => "required|integer",
        ];
    }
}
