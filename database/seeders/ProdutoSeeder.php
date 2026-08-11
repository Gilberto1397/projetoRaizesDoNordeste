<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        DB::table('produtos')->insert([
            [
                'produtos_nome' => 'Pastel de Queijo',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Pastel de Carne',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Coxinha de Frango',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Agua Mineral',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Refrigerante Guaraná',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Bolo de Cenoura',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Brigadeiro',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Mousse de Chocolate',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Suco Natural de Laranja',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
            [
                'produtos_nome' => 'Café Expresso',
                'produtos_cadastradorpor' => 1,
                'produtos_atualizadopor' => 1,
                'produtos_created_at' => now(),
                'produtos_updated_at' => now(),
            ],
        ]);
    }
}
