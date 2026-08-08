<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('/pedidos', [PedidoController::class, 'novoPedido']);
    Route::post('/auth/login', [AutenticacaoController::class, 'autenticar']);

    Route::get('teste-api', function () {
        return response()->json(['message' => 'API está funcionando!']);
    });
});
