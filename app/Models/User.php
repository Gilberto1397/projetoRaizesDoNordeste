<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $usuarios_id
 * @property string $usuarios_email
 * @property string $usuarios_senha
 * @property int|null $usuarios_cadastradorpor
 * @property int|null $usuarios_atualizadopor
 * @property string $usuarios_created_at
 * @property string $usuarios_updated_at
 * @property bool $usuarios_ativo
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $primaryKey = 'usuarios_id';

    const CREATED_AT = 'usuarios_created_at';
    const UPDATED_AT = 'usuarios_updated_at';

    public function getAuthPassword()
    {
        return $this->usuarios_senha;
    }
}
