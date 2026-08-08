<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $statuspagamentos_id
 * @property string $statuspagamentos_descricao
 */
class StatusPagamento extends Model
{
    protected $table = 'statuspagamentos';
    protected $primaryKey = 'statuspagamentos_id';
    public $timestamps = false;
}
