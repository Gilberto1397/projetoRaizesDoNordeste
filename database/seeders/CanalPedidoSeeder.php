<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanalPedidoSeeder extends Seeder
{
    public function run()
    {
        DB::table('canaispedidos')->insert([
            ['canaispedidos_descricao' => 'APP'],
            ['canaispedidos_descricao' => 'TOTEM'],
            ['canaispedidos_descricao' => 'BALCÃO'],
            ['canaispedidos_descricao' => 'WEB'],
        ]);
    }
}
