<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*
 * @property int $movimentacoespedidos_id
 * @property int $movimentacoespedidos_pedido
 * @property int $movimentacoespedidos_statuspedido
 * @property int $movimentacoespedidos_cadastradorpor
 * @property string $movimentacoespedidos_created_at
 */
class MovimentacaoPedido extends Model
{
    protected $table = 'movimentacoespedidos';
    protected $primaryKey = 'movimentacoespedidos_id';
    public $timestamps = false;

    protected $fillable = [
        'movimentacoespedidos_pedido',
        'movimentacoespedidos_statuspedido',
        'movimentacoespedidos_cadastradorpor',
        'movimentacoespedidos_created_at'
    ];
}
