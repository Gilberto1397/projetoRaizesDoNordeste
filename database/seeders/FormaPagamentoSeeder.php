<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormaPagamentoSeeder extends Seeder
{
    public function run()
    {
        DB::table('formaspagamentos')->insert([
            ['formaspagamentos_descricao' => 'Dinheiro'],
            ['formaspagamentos_descricao' => 'Débito'],
            ['formaspagamentos_descricao' => 'Crédito'],
            ['formaspagamentos_descricao' => 'PIX'],
        ]);
    }
}
