<?php

namespace App\Http\Controllers;

use App\Http\Requests\NovoPedidoRequest;
use App\Services\NovoPedidoService;

class PedidoController extends Controller
{
    public function novoPedido(NovoPedidoRequest $request, NovoPedidoService $novoPedidoService)
    {
        try {
            $resultado = $novoPedidoService->criar($request->validated());

            return response()->json([
                'erro' => false,
                'mensagem' => $resultado['mensagem'],
                'dados' => [
                    'pedidoId' => $resultado['pedidoId'],
                    'idTransacao' => $resultado['idTransacao'],
                    'status' => $resultado['status']
                ]
            ], 201);
        } catch (\DomainException $e) {
            return response()->json(['erro' => true, 'mensagem' => $e->getMessage(), 'dados' => null], $e->getCode());
        } catch (\Exception $e) {
            return response()->json(['erro' => true, 'mensagem' => 'Erro ao processar pedido', 'dados' => null], 500);
        }
    }
}
