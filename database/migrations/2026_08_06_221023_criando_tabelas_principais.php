<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriandoTabelasPrincipais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariosautenticados', function (Blueprint $table) {
            $table->bigIncrements('usuariosautenticados_id');
            $table->integer('usuariosautenticados_usuario');
            $table->dateTime('usuariosautenticados_datahora');

            $table->foreign('usuariosautenticados_usuario')
                ->references('usuarios_id')
                ->on('usuarios');
        });

        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('funcionarios_id');
            $table->bigInteger('funcionarios_usuario');
            $table->boolean('funcionarios_ativo')->default(true);
            $table->bigInteger('funcionarios_cadastradopor')->nullable();
            $table->bigInteger('funcionarios_atualizadopor')->nullable();
            $table->timestamp('funcionarios_created_at')->useCurrent();
            $table->timestamp('funcionarios_updated_at')->useCurrent();

            $table->foreign('funcionarios_usuario')
                ->references('usuarios_id')
                ->on('usuarios');
            $table->foreign('funcionarios_cadastradopor')
                ->references('funcionarios_id')
                ->on('funcionarios');
            $table->foreign('funcionarios_atualizadopor')
                ->references('funcionarios_id')
                ->on('funcionarios');
        });

        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('produtos_id');
            $table->string('produtos_nome');
            $table->bigInteger('produtos_cadastradorpor');
            $table->bigInteger('produtos_atualizadopor');
            $table->timestamp('produtos_created_at')->useCurrent();
            $table->timestamp('produtos_updated_at')->useCurrent();

            $table->foreign('produtos_cadastradorpor')
                ->references('funcionarios_id')
                ->on('funcionarios');
            $table->foreign('produtos_atualizadopor')
                ->references('funcionarios_id')
                ->on('funcionarios');
        });

        Schema::create('statuspedidos', function (Blueprint $table) {
            $table->smallIncrements('statuspedidos_id');
            $table->string('statuspedidos_descricao');
            $table->boolean('statuspedidos_ativo')->default(true);
        });

        Schema::create('formaspagamentos', function (Blueprint $table) {
            $table->smallIncrements('formaspagamentos_id');
            $table->string('formaspagamentos_descricao');
        });

        Schema::create('canaispedidos', function (Blueprint $table) {
            $table->smallIncrements('canaispedidos_id');
            $table->string('canaispedidos_descricao');
        });

        Schema::create('statuspagamentos', function (Blueprint $table) {
            $table->smallIncrements('statuspagamentos_id');
            $table->string('statuspagamentos_descricao');
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('pedidos_id');
            $table->smallInteger('pedidos_canalpedido');
            $table->bigInteger('pedidos_cliente')->nullable();
            $table->string('pedidos_nomecliente')->nullable();
            $table->bigInteger('pedidos_cadastradorpor')->nullable();
            $table->timestamp('pedidos_created_at')->useCurrent();

            $table->foreign('pedidos_canalpedido')
                ->references('canaispedidos_id')
                ->on('canaispedidos');
            $table->foreign('pedidos_cliente')
                ->references('usuarios_id')
                ->on('usuarios');
            $table->foreign('pedidos_cadastradorpor')
                ->references('funcionarios_id')
                ->on('funcionarios');
        });

        Schema::create('movimentacoespedidos', function (Blueprint $table) {
            $table->bigIncrements('movimentacoespedidos_id');
            $table->bigInteger('movimentacoespedidos_pedido');
            $table->smallInteger('movimentacoespedidos_statuspedido');
            $table->bigInteger('movimentacoespedidos_cadastradorpor');
            $table->timestamp('movimentacoespedidos_created_at')->useCurrent();

            $table->foreign('movimentacoespedidos_pedido')
                ->references('pedidos_id')
                ->on('pedidos');
            $table->foreign('movimentacoespedidos_statuspedido')
                ->references('statuspedidos_id')
                ->on('statuspedidos');
            $table->foreign('movimentacoespedidos_cadastradorpor')
                ->references('funcionarios_id')
                ->on('funcionarios');
        });

        Schema::create('pedidosprodutos', function (Blueprint $table) {
            $table->bigIncrements('pedidosprodutos_id');
            $table->bigInteger('pedidosprodutos_pedido');
            $table->bigInteger('pedidosprodutos_produto');
            $table->integer('pedidosprodutos_quantidade');

            $table->foreign('pedidosprodutos_pedido')
                ->references('pedidos_id')
                ->on('pedidos');
            $table->foreign('pedidosprodutos_produto')
                ->references('produtos_id')
                ->on('produtos');
        });

        Schema::create('pedidospagamentos', function (Blueprint $table) {
            $table->bigIncrements('pedidospagamentos_id');
            $table->bigInteger('pedidospagamentos_pedido');
            $table->smallInteger('pedidospagamentos_formapagamento');
            $table->smallInteger('pedidospagamentos_statuspagamentos');
            $table->jsonb('pedidospagamentos_resposta');
            $table->timestamp('pedidospagamentos_created_at')->useCurrent();

            $table->foreign('pedidospagamentos_pedido')
                ->references('pedidos_id')
                ->on('pedidos');
            $table->foreign('pedidospagamentos_formapagamento')
                ->references('formaspagamentos_id')
                ->on('formaspagamentos');
            $table->foreign('pedidospagamentos_statuspagamentos')
                ->references('statuspagamentos_id')
                ->on('statuspagamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidospagamentos');
        Schema::dropIfExists('pedidosprodutos');
        Schema::dropIfExists('movimentacoespedidos');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('statuspagamentos');
        Schema::dropIfExists('canaispedidos');
        Schema::dropIfExists('formaspagamentos');
        Schema::dropIfExists('statuspedidos');
        Schema::dropIfExists('produtos');
        Schema::dropIfExists('funcionarios');
        Schema::dropIfExists('usuariosautenticados');
    }
}
