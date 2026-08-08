<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $canaispedidos_id
 * @property string $canaispedidos_descricao
 */
class CanalPedido extends Model
{
    protected $table = 'canaispedidos';
    protected $primaryKey = 'canaispedidos_id';
    public $timestamps = false;
}
