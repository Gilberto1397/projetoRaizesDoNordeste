<?php

namespace App\Http\Controllers;

use App\Http\Requests\NovoPedidoRequest;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function criarPedido(NovoPedidoRequest $request)
    {
        try {
            if (!$this->realizarPagamento()) {
                throw new \DomainException('Erro ao processar pagamento!');
            }

            $pedido = Pedido::create([
                'pedidos_canalpedido' => $request->input('canalPedido'),
                'pedidos_nomecliente' => $request->input('nomeCliente', ''),
                'pedidos_cadastradorpor' => auth()->id(),
                'pedidos_observacao' => $request->input('observacao', ''),
                'pedidos_created_at' => now(),
            ]);
            if (!$pedido) {
                throw new \DomainException('Erro ao criar o pedido!');
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
            return response()->json($resposta, 500);
        } catch (\Exception $e) {
            $resposta = (object)[
                "error" => true,
                "message" => "Falha ao realizar pedido.",
                "data" => null
            ];
            return response()->json($resposta, 500);
        }
    }

    private function realizarPagamento()
    {
        return random_int(0, 1) === 1;
    }
}
