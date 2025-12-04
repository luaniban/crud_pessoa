<?php

use App\Models\User;
use App\Livewire\Index;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', Index::class)->name('index');


Route::get('/export-csv-enderecos', function () {
    $users = User::with('endereco')->get();

    $csv = "Usuario,Email,Rua,Bairro\n";

    foreach ($users as $user) {
        $csv .= "{$user->name},{$user->email}," .
                ($user->endereco->rua ?? 'N/A') . "," .
                ($user->endereco->bairro ?? 'N/A') . "\n";
    }

    return Response::make($csv, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="enderecos_usuarios.csv"',
    ]);
})->name("export-csv-enderecos");

Route::get('/export-json-enderecos', function () {
    $users = User::with('endereco')->get();

    // Montar estrutura JSON
    $data = $users->map(function ($user) {
        return [
            'id'      => $user->id,
            'name'    => $user->name,
            'email'   => $user->email,
            'endereco' => [
                'rua'    => $user->endereco->rua ?? null,
                'bairro' => $user->endereco->bairro ?? null,
            ]
        ];
    });

    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    return Response::make($json, 200, [
        'Content-Type' => 'application/json',
        'Content-Disposition' => 'attachment; filename="usuarios_enderecos.json"',
    ]);
})->name("export-json-enderecos");

route::get('/export-pdf-usuarios', 'App\Http\Controllers\Pdf\PDFUsuariosController')->name('export-pdf-usuarios');