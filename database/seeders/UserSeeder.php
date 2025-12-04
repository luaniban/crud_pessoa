<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Endereco;
use App\Models\Documento;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $enderecos = Endereco::all();
        $documentos = Documento::all();

        User::create([
            'name'        => 'João Silva',
            'email'       => 'joao@example.com',
            'password'    => bcrypt('123456'),
            'endereco_id' => $enderecos[0]->id,
            'documento_id'=> $documentos[0]->id,
        ]);

        User::create([
            'name'        => 'Maria Souza',
            'email'       => 'maria@example.com',
            'password'    => bcrypt('123456'),
            'endereco_id' => $enderecos[1]->id,
            'documento_id'=> $documentos[1]->id,
        ]);

        User::create([
            'name'        => 'Carlos Santos',
            'email'       => 'carlos@example.com',
            'password'    => bcrypt('123456'),
            'endereco_id' => $enderecos[2]->id,
            'documento_id'=> $documentos[2]->id,
        ]);
    }
}
