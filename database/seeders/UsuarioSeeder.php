<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            'usuarios_email' => 'email@funcionario.com',
            'usuarios_senha' => Hash::make('senha123'),
            'usuarios_created_at' => now(),
            'usuarios_updated_at' => now(),
        ]);
    }
}
