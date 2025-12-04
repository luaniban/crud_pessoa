<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    public function run(): void
    {
        Endereco::create([
            'rua' => 'Rua das Flores',
            'bairro' => 'Centro'
        ]);

        Endereco::create([
            'rua' => 'Avenida Brasil',
            'bairro' => 'Jardim América'
        ]);

        Endereco::create([
            'rua' => 'Rua 7 de Setembro',
            'bairro' => 'Vila Nova'
        ]);
    }
}
