<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $produtos_id
 * @property string $produtos_nome
 * @property int $produtos_cadastradorpor
 * @property int $produtos_atualizadopor
 * @property string $produtos_created_at
 * @property string $produtos_updated_at
 */
class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'produtos_id';
    public $timestamps = false;
}
