<?php

namespace App\Http\Controllers\Pdf;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PDFUsuariosController extends Controller
{


    public function __invoke()
    {

        $usuarios = User::all();

        return Pdf::loadView('pdf.usuarios', compact('usuarios'))
            ->setPaper('a4', 'portrait')
            ->download('classificacao.pdf');
    }
}
