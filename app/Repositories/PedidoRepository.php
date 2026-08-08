<?php

namespace App\Repositories;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\PedidoPagamento;
use App\Models\MovimentacaoPedido;

class PedidoRepository
{
    public function criar(array $dados): Pedido
    {
        return Pedido::create([
            'pedidos_canalpedido' => $dados['canalPedido'],
            'pedidos_nomecliente' => $dados['nomeCliente'],
//            'pedidos_cliente' => $dados['clienteId'] ?? null, //TODO PEGAR USUÁRIO LOGADO
//            'pedidos_cadastradorpor' => $dados['funcionarioId'] ?? null,
            'pedidos_created_at' => now(),
        ]);
    }

    public function adicionarProdutos(int $pedidoId, array $itens): void
    {
        foreach ($itens as $item) {
            PedidoProduto::create([
                'pedidosprodutos_pedido' => $pedidoId,
                'pedidosprodutos_produto' => $item['produtoId'],
                'pedidosprodutos_quantidade' => $item['quantidade'],
            ]);
        }
    }

    public function registrarPagamento(int $pedidoId, array $dadosPagamento): PedidoPagamento
    {
        return PedidoPagamento::create([
            'pedidospagamentos_pedido' => $pedidoId,
            'pedidospagamentos_formapagamento' => $dadosPagamento['formaPagamento'],
            'pedidospagamentos_statuspagamentos' => $dadosPagamento['statusPagamento'],
            'pedidospagamentos_resposta' => $dadosPagamento['resposta'],
            'pedidospagamentos_created_at' => now(),
        ]);
    }

    public function registrarMovimentacao(int $pedidoId, int $statusPedido, ?int $funcionarioId = null): MovimentacaoPedido
    {
        return MovimentacaoPedido::create([
            'movimentacoespedidos_pedido' => $pedidoId,
            'movimentacoespedidos_statuspedido' => $statusPedido,
            'movimentacoespedidos_cadastradorpor' => $funcionarioId ?? 1,
            'movimentacoespedidos_created_at' => now(),
        ]);
    }

    public function obterPorId(int $pedidoId): ?Pedido
    {
        return Pedido::find($pedidoId);
    }
}
