<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $formaspagamentos_id
 * @property string $formaspagamentos_descricao
 */
class FormaPagamento extends Model
{
    protected $table = 'formaspagamentos';
    protected $primaryKey = 'formaspagamentos_id';
    public $timestamps = false;
}
