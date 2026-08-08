<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array $produtos
 * @property int $formaPagamento
 * @property int $canalPedido
 * @property string $nomeCliente
 */
class NovoPedidoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'produtos' => 'required|array|min:1',
            'produtos.*.produtoId' => 'required|integer|min:1|exists:produtos,produtos_id',
            'produtos.*.quantidade' => 'required|integer|min:1',
            'formaPagamento' => 'required|integer|min:1|exists:formas_pagamento,formaspagamentos_id',
            'canalPedido' => 'required|integer|min:1|exists:canais_pedido,canaispedidos_id',
            'nomeCliente' => 'string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'produtos.required' => 'Obrigatório informar algum produto no pedido.',
            'produtos.array' => 'Produtos informados incorretamente.',
            'produtos.min' => 'O pedido deve conter pelo menos um produto.',
            'produtos.*.produtoId.exists' => 'O produto informado não existe.',
            'produtos.*.produtoId.required' => 'Produto não identificado.',
            'produtos.*.produtoId.integer' => 'A identidade do produto não está em um formato válido.',
            'produtos.*.quantidade.required' => 'Deve ser informada a quantidade de cada produto escolhido.',
            'produtos.*.quantidade.integer' => 'A quantidade do produto não está em um formato válido.',
            'produtos.*.quantidade.min' => 'Quantidade deve ser no mínimo 1.',

            'formaPagamento.exists' => 'A forma de pagamento informada não existe.',
            'formaPagamento.required' => 'Forma de pagamento é obrigatória.',

            'canalPedido.exists' => 'O canal do pedido informado não existe.',
            'canalPedido.required' => 'Canal do pedido é obrigatório.',

            'nomeCliente.string' => 'O nome do cliente não está em um formato válido.',
            'nomeCliente.max' => 'O nome do cliente é muito longo.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nomeCliente' => strip_tags($this->nomeCliente)
        ]);
    }
}
