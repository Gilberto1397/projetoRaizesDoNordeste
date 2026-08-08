<?php

namespace App\Services;

use App\Repositories\PedidoRepository;
use App\Services\Gateway\PagamentoGateway;
use Illuminate\Support\Facades\DB;

class NovoPedidoService
{
    private PedidoRepository $pedidoRepository;
    private PagamentoGateway $pagamentoGateway;

    // Status de Pedido
    const STATUS_COZINHA = 1;
    const STATUS_PRONTO = 2;
    const STATUS_ENTREGUE = 3;
    const STATUS_CANCELADO = 4;

    public function __construct(
        PedidoRepository $pedidoRepository,
        PagamentoGateway $pagamentoGateway
    )
    {
        $this->pedidoRepository = $pedidoRepository;
        $this->pagamentoGateway = $pagamentoGateway;
    }

    public function criar(array $dados): array
    {
        return DB::transaction(function () use ($dados) {
            // 1. Processar pagamento via gateway
            $resultadoPagamento = $this->pagamentoGateway->processar();

            if (!$resultadoPagamento['aprovado']) {
                throw new \DomainException($resultadoPagamento['mensagem'], 500);
            }

            // 2. Criar pedido
            $pedido = $this->pedidoRepository->criar([
                'canalPedido' => $dados['canalPedido'],
                'nomeCliente' => $dados['nomeCliente'],
                'clienteId' => $dados['clienteId'] ?? null,
                'funcionarioId' => $dados['funcionarioId'] ?? null,
            ]);

            // 3. Adicionar produtos ao pedido
            $this->pedidoRepository->adicionarProdutos($pedido->pedidos_id, $dados['itens']);

            // 4. Registrar pagamento
            $this->pedidoRepository->registrarPagamento($pedido->pedidos_id, [
                'formaPagamento' => $dados['formaPagamento'],
                'statusPagamento' => $resultadoPagamento['status'],
                'resposta' => $resultadoPagamento['resposta_gateway'],
            ]);

            // 5. Registrar movimentação inicial (Cozinha)
            $this->pedidoRepository->registrarMovimentacao(
                $pedido->pedidos_id,
                self::STATUS_COZINHA,
                $dados['funcionarioId'] ?? null
            );

            return [
                'sucesso' => true,
                'mensagem' => 'Pedido realizado com sucesso',
                'pedidoId' => $pedido->pedidos_id,
                'idTransacao' => $resultadoPagamento['id_transacao'],
                'status' => 'cozinha'
            ];
        });
    }
}
