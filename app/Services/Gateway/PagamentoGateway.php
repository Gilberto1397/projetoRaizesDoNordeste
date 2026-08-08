<?php

namespace App\Services\Gateway;

class PagamentoGateway
{
    const STATUS_APROVADO = 1;
    const STATUS_RECUSADO = 2;
    const STATUS_PENDENTE = 3;
    const STATUS_CANCELADO = 4;

    public function processar(): array
    {
        // Simula processamento de pagamento
        // 80% de chance de aprovação
        $aprovado = random_int(1, 100) <= 80;

        if ($aprovado) {
            return [
                'aprovado' => true,
                'status' => self::STATUS_APROVADO,
                'mensagem' => 'Pagamento aprovado com sucesso',
                'id_transacao' => 'TRX_' . uniqid(),
                'resposta_gateway' => json_encode([
                    'timestamp' => now(),
                    'codigo' => '200',
                    'descricao' => 'Transação aprovada'
                ])
            ];
        }

        return [
            'aprovado' => false,
            'status' => self::STATUS_RECUSADO,
            'mensagem' => 'Pagamento recusado',
            'id_transacao' => 'TRX_' . uniqid(),
            'resposta_gateway' => json_encode([
                'timestamp' => now(),
                'codigo' => '500',
                'descricao' => 'Transação recusada pelo gateway'
            ])
        ];
    }
}
