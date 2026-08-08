<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $pedidos_id
 * @property int $pedidos_canalpedido
 * @property int $pedidos_cliente
 * @property string $pedidos_nomecliente
 * @property int $pedidos_cadastradorpor
 * @property string $pedidos_created_at
 */
class Pedido extends Model
{
    protected $table = "pedidos";
    protected $primaryKey = "pedidos_id";
    public $timestamps = false;

    protected $fillable = [
        "pedidos_canalpedido",
        "pedidos_cliente",
        "pedidos_nomecliente",
        "pedidos_cadastradorpor",
        "pedidos_created_at"
    ];
}
