<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPedidoSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuspedidos')->insert([
            ['statuspedidos_descricao' => 'Cozinha', 'statuspedidos_ativo' => true],
            ['statuspedidos_descricao' => 'Pronto', 'statuspedidos_ativo' => true],
            ['statuspedidos_descricao' => 'Entregue', 'statuspedidos_ativo' => true],
            ['statuspedidos_descricao' => 'Cancelado', 'statuspedidos_ativo' => true],
        ]);
    }
}
