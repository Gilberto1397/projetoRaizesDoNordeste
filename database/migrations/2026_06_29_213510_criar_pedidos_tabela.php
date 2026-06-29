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
        DB::unprepared(<<<SQL
CREATE TABLE "pedidos" (
  "pedidos_canalpedido" smallint NOT NULL,
  "pedidos_nomecliente" varchar,
  "pedidos_cadastradorpor" smallint,
  "pedidos_observacao" varchar,
  "pedidos_status" varchar,
  "pedidos_created_at" datetime DEFAULT (now())
);
SQL);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
