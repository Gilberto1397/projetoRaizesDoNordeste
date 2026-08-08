<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticacaoRequest;
use App\Services\AutenticacaoService;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{
    public function login(AutenticacaoRequest $request, AutenticacaoService $autenticacaoService)
    {
        try {
            $autenticacaoService->autenticar($request->validated());

            return response()->json([
                'erro' => false,
                'mensagem' => 'Usuário logado com sucesso',
                'dados' => null,
            ]);
        } catch (AuthenticationException $e) {
            return response()->json([
                'erro' => true,
                'mensagem' => $e->getMessage(),
                'dados' => null,
            ], 401);
        }
    }
}
