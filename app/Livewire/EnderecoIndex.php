<?php

namespace App\Livewire;

use App\Models\Endereco;
use Livewire\Component;
use Livewire\Attributes\On;

class EnderecoIndex extends Component
{
    public $modal_create = false;
    public $modal_edit = false;
    public $enderecos;
    public $endereco;

    public $rua;
    public $bairro;

    public function open_modal_create()
    {
        $this->rua = null;
        $this->bairro = null;

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
            "rua" => "required",
            "bairro" => "required",
        ]);

        Endereco::create([
            "rua" => $this->rua,
            "bairro" => $this->bairro,
        ]);

        $this->close_modal_create();
        $this->dispatch("endereco-actions");
    }

    public function edit($id)
    {
        $this->endereco = Endereco::find($id);

        $this->rua = $this->endereco->rua;
        $this->bairro = $this->endereco->bairro;

        $this->open_modal_edit();
    }

    public function update()
    {
        $this->validate([
            "rua" => "required",
            "bairro" => "required",
        ]);

        $this->endereco->update([
            "rua" => $this->rua,
            "bairro" => $this->bairro,
        ]);

        $this->dispatch("endereco-actions");
        $this->close_modal_edit();
    }

    public function delete($id)
    {
        Endereco::find($id)->delete();
        $this->dispatch("endereco-actions");
    }

    #[On("endereco-actions")]
    public function mount()
    {
        $this->enderecos = Endereco::all();
    }

    public function render()
    {
        return view('livewire.endereco-index');
    }
}
