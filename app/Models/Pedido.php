<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        "pedidos_observacao",
        "pedidos_created_at"
    ];
}
