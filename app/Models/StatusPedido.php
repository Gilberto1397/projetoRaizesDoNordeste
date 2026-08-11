<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $statuspedidos_id
 * @property string $statuspedidos_descricao
 * @property int $statuspedidos_ativo
 */
class StatusPedido extends Model
{
    protected $table = 'statuspedidos';
    protected $primaryKey = 'statuspedidos_id';
    public $timestamps = false;

    protected $fillable = [
        'statuspedidos_descricao',
        'statuspedidos_ativo'
    ];
}
