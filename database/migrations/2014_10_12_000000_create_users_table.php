<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(<<<SQL
CREATE TABLE "usuarios" (
  "usuarios_nome" varchar NOT NULL,
  "usuarios_email" varchar UNIQUE NOT NULL,
  "usuarios_telefone" varchar NOT NULL,
  "usuarios_cpf" varchar UNIQUE NOT NULL,
  "usuarios_senha" varchar NOT NULL,
  "usuarios_pontos" int,
  "usuarios_perfil" smallint NOT NULL,
  "usuarios_cadastradorpor" bigint,
  "usuarios_atualizadopor" bigint,
  "usuarios_created_at" datetime DEFAULT (now()),
  "usuarios_updated_at" datetime DEFAULT (now()),
  "usuarios_ativo" boolean DEFAULT true
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
        Schema::dropIfExists('usuarios');
    }
}
