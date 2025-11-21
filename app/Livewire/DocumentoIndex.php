<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Documento;
use Livewire\Attributes\On;

class DocumentoIndex extends Component
{

    public $modal_create = false;
    public $modal_edit = false;
    public $documentos;
    public $documento;

    public $cpf;
    public $rg;
    public $cnh;


    public function open_modal_create()
    {
        $this->cpf = null;
        $this->rg = null;
        $this->cnh = null;

        $this->modal_create = true;
    }

    public function close_modal_create()
    {
        $this->modal_create = false;
    }


    public function open_modal_edit()
    {
        $this->modal_edit = true;
    }

    public function close_modal_edit()
    {
        $this->modal_edit = false;
    }

    public function create()
    {
        $this->validate([
            "cpf" => "required|unique:documentos,cpf",
            "rg"  => "required",
            "cnh" => "required",
        ]);

        Documento::create([
            "cpf" => $this->cpf,
            "rg"  => $this->rg,
            "cnh" => $this->cnh,
        ]);

        $this->close_modal_create();

        $this->dispatch("document-actions");
    }


    public function edit($id)
    {
        $this->documento = Documento::find($id);

        $this->cpf = $this->documento->cpf;
        $this->rg  = $this->documento->rg;
        $this->cnh = $this->documento->cnh;

        $this->open_modal_edit();
    }


    public function update()
    {
        $this->validate([
            "cpf" => "required|unique:documentos,cpf," . $this->documento->id,
            "rg"  => "required",
            "cnh" => "required",
        ]);

        $this->documento->update([
            "cpf" => $this->cpf,
            "rg"  => $this->rg,
            "cnh" => $this->cnh,
        ]);

        $this->dispatch("document-actions");
        $this->close_modal_edit();
    }


    public function delete($id)
    {
        Documento::find($id)->delete();
        $this->dispatch("document-actions");
    }

    #[On("document-actions")]
    public function mount()
    {
        $this->documentos = Documento::all();
    }

    public function render()
    {
        return view('livewire.documento-index');
    }
}
