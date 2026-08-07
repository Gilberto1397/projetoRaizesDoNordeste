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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('usuarios_id');
            $table->string('usuarios_email')->unique();
            $table->string('usuarios_senha');
            $table->bigInteger('usuarios_cadastradorpor')->nullable()->unsigned();
            $table->bigInteger('usuarios_atualizadopor')->nullable()->unsigned();
            $table->timestamp('usuarios_created_at')->useCurrent();
            $table->timestamp('usuarios_updated_at')->useCurrent();
            $table->boolean('usuarios_ativo')->default(true);

            $table->foreign('usuarios_cadastradorpor')
                ->references('usuarios_id')
                ->on('usuarios');
            $table->foreign('usuarios_atualizadopor')
                ->references('usuarios_id')
                ->on('usuarios');
        });

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
