<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPagamentoSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuspagamentos')->insert([
            ['statuspagamentos_descricao' => 'Aprovado'],
            ['statuspagamentos_descricao' => 'Recusado'],
            ['statuspagamentos_descricao' => 'Pendente'],
            ['statuspagamentos_descricao' => 'Cancelado'],
        ]);
    }
}
