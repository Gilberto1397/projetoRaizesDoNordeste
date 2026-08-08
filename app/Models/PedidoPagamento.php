<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
 * @property int $pedidospagamentos_id
 * @property int $pedidospagamentos_pedido
 * @property int $pedidospagamentos_formapagamento
 * @property int $pedidospagamentos_statuspagamentos
 * @property string $pedidospagamentos_resposta
 * @property string $pedidospagamentos_created_at
 */
class PedidoPagamento extends Model
{
    protected $table = 'pedidospagamentos';
    protected $primaryKey = 'pedidospagamentos_id';
    public $timestamps = false;

    protected $fillable = [
        'pedidospagamentos_pedido',
        'pedidospagamentos_formapagamento',
        'pedidospagamentos_statuspagamentos',
        'pedidospagamentos_resposta',
        'pedidospagamentos_created_at'
    ];
}
