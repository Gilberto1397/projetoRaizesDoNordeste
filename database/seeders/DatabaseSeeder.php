<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsuarioSeeder::class,
            FuncionarioSeeder::class,
            StatusPedidoSeeder::class,
            StatusPagamentoSeeder::class,
            CanalPedidoSeeder::class,
            FormaPagamentoSeeder::class,
            ProdutoSeeder::class,
        ]);
    }
}
