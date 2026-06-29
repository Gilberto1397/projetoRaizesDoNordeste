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
  "pedidos_id" SERIAL PRIMARY KEY,
  "pedidos_canalpedido" smallint NOT NULL,
  "pedidos_nomecliente" varchar,
  "pedidos_cadastradorpor" smallint,
  "pedidos_observacao" varchar,
  "pedidos_status" varchar,
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
