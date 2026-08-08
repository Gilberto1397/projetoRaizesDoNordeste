<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FuncionarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('funcionarios')->insert([
            'funcionarios_usuario' => 1
        ]);
    }
}
