<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function autenticar(Request $request)
    {
        $objeto = (object)[
            "error" => false,
            "message" => "Usuário logado com sucesso",
            "data" => null
        ];

        if ($request->input('email', '') === 'atendente1@mail.com' && $request->input('senha', '') === '123456') {
            return response()->json($objeto);
        }

        if ($request->input('email', '') === 'atendente2@mail.com' && $request->input('senha', '') === '12345678') {
            return response()->json($objeto);
        }

        $objeto = (object)[
            "error" => true,
            "message" => "Credenciais inválidas",
            "data" => null
        ];
        return response()->json($objeto, 401);
    }
}
