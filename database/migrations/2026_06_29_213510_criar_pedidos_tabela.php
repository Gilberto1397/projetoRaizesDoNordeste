<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarPedidosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        <<<SQL
    CREATE TABLE "Pedidos" (
  "pedidos_id" BIGSERIAL PRIMARY KEY,
  "pedidos_canalpedido" smallint NOT NULL,
  "pedidos_cliente" bigint,
  "pedidos_nomecliente" varchar,
  "pedidos_enderecoentrega" bigint,
  "pedidos_cadastradorpor" bigint,
  "pedidos_observacao" varchar,
  "pedidos_created_at" datetime DEFAULT (now())
);
SQL;

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pedidos');
    }
}
