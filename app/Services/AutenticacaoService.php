<?php

namespace App\Services;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AutenticacaoService
{
    public function autenticar(array $dados): void
    {
        $credenciais = [
            'usuarios_email' => $dados['email'],
            'password' => $dados['senha'],
        ];

        if (!Auth::once($credenciais)) {
            throw new AuthenticationException('Credenciais inválidas.');
        }
    }
}
