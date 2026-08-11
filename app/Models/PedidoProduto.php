<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $pedidosprodutos_id
 * @property int $pedidosprodutos_pedido
 * @property int $pedidosprodutos_produto
 * @property int $pedidosprodutos_quantidade
 */
class PedidoProduto extends Model
{
    protected $table = 'pedidosprodutos';
    protected $primaryKey = 'pedidosprodutos_id';
    public $timestamps = false;

    protected $fillable = [
        'pedidosprodutos_pedido',
        'pedidosprodutos_produto',
        'pedidosprodutos_quantidade'
    ];
}
