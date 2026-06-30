<?php

namespace App\Http\Controllers;

use App\Http\Requests\NovoPedidoRequest;
use App\Models\Pedido;

class PedidoController extends Controller
{
    const ATENDENTE = 1;
    const CLIENTE = 2;

    public function criarPedido(NovoPedidoRequest $request)
    {
        try {
            if ($this->autenticar($request) !== self::ATENDENTE) {
                throw new \DomainException('Usuário não autorizado a realizar pedidos!', 401);
            }

            if (!$this->realizarPagamento()) {
                throw new \DomainException('Erro ao processar pagamento!', 500);
            }

            $pedido = Pedido::create([
                'pedidos_canalpedido' => $request->input('canalPedido'),
                'pedidos_nomecliente' => $request->input('nomeCliente', ''),
                'pedidos_cadastradorpor' => 1,
                'pedidos_observacao' => $request->input('observacao', ''),
                'pedidos_created_at' => now(),
            ]);
            if (!$pedido) {
                throw new \DomainException('Erro ao criar o pedido!', 500);
            }
            $resposta = (object)[
                "error" => false,
                "message" => "Pedido realizado com sucesso",
                "data" => null
            ];
            return response()->json($resposta, 201);
        } catch (\DomainException $e) {
            $resposta = (object)[
                "error" => true,
                "message" => $e->getMessage(),
                "data" => null
            ];
            return response()->json($resposta, $e->getCode());
        }
    }

    private function realizarPagamento()
    {
        return random_int(0, 1) === 1;
    }

    public function autenticar(NovoPedidoRequest $request)
    {
        if ($request->input('email', '') === 'atendente1@mail.com' && $request->input('senha', '') === '123456') {
            return self::ATENDENTE;
        }

        if ($request->input('email', '') === 'atendente2@mail.com' && $request->input('senha', '') === '12345678') {
            return self::CLIENTE;
        }
        throw new \DomainException('Credenciais inválidas', 401);
    }
}
