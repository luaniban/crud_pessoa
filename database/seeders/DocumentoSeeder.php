<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    public function run(): void
    {
        Documento::create([
            'cpf' => '123.456.789-00',
            'rg'  => '12.345.678-9',
            'cnh' => '12345678900',
        ]);

        Documento::create([
            'cpf' => '987.654.321-00',
            'rg'  => '98.765.432-1',
            'cnh' => '99887766554',
        ]);

        Documento::create([
            'cpf' => '111.222.333-44',
            'rg'  => '55.444.333-2',
            'cnh' => '44556677889',
        ]);
    }
}
