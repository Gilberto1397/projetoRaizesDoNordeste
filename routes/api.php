<?php

use App\Http\Controllers\LoginController;
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
    Route::post('/pedidos', [PedidoController::class, 'novoPedido'])->middleware('auth.basic:,usuarios_email');
    Route::post('/auth/login', [LoginController::class, 'login']);

    Route::get('teste-api', function () {
        return response()->json(['message' => 'API está funcionando!']);
    });
});
