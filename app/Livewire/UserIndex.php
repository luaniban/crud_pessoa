<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Endereco;
use App\Models\Documento;
use Livewire\Attributes\On;

class UserIndex extends Component
{
    public $modal_create = false;
    public $modal_edit = false;

    public $users;
    public $user;

    // Dados do usuário
    public $name;
    public $email;
    public $password;

    // Dados do endereço
    public $rua;
    public $bairro;

    // Dados do documento
    public $cpf;
    public $rg;
    public $cnh;

    public function open_modal_create()
    {
        $this->resetInputs();
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

    private function resetInputs()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->rua = null;
        $this->bairro = null;
        $this->cpf = null;
        $this->rg = null;
        $this->cnh = null;
    }

    // ==================================================
    // CREATE
    // ==================================================
    public function create()
    {
        $this->validate([
            "name"        => "required",
            "email"       => "required|email|unique:users,email",
            "password"    => "required",
            "rua"         => "required",
            "bairro"      => "required",
            "cpf"         => "required",
            "rg"          => "required",
            "cnh"         => "required",
        ]);

        // Criar Endereço
        $endereco = Endereco::create([
            "rua"    => $this->rua,
            "bairro" => $this->bairro,
        ]);

        // Criar Documento
        $documento = Documento::create([
            "cpf" => $this->cpf,
            "rg"  => $this->rg,
            "cnh" => $this->cnh,
        ]);

        // Criar Usuário
        User::create([
            "name"         => $this->name,
            "email"        => $this->email,
            "password"     => bcrypt($this->password),
            "endereco_id"  => $endereco->id,
            "documento_id" => $documento->id,
        ]);

        $this->close_modal_create();
        $this->dispatch("user-actions");
    }

    // ==================================================
    // EDIT
    // ==================================================
    public function edit($id)
    {
        $this->user = User::with(['endereco', 'documento'])->findOrFail($id);

      
        $this->name  = $this->user->name;
        $this->email = $this->user->email;


        $this->rua    = $this->user->endereco->rua    ?? '';
        $this->bairro = $this->user->endereco->bairro ?? '';


        $this->cpf = $this->user->documento->cpf ?? '';
        $this->rg  = $this->user->documento->rg  ?? '';
        $this->cnh = $this->user->documento->cnh ?? '';

        $this->open_modal_edit();
    }

    public function update()
    {
        $this->validate([
            "name"   => "required",
            "email"  => "required|email|unique:users,email," . $this->user->id,
            "rua"    => "required",
            "bairro" => "required",
            "cpf"    => "required",
            "rg"     => "required",
            "cnh"    => "required",
        ]);


        if ($this->user->endereco) {
            $this->user->endereco->update([
                "rua"    => $this->rua,
                "bairro" => $this->bairro,
            ]);
        }


        if ($this->user->documento) {
            $this->user->documento->update([
                "cpf" => $this->cpf,
                "rg"  => $this->rg,
                "cnh" => $this->cnh,
            ]);
        }


        $this->user->update([
            "name"  => $this->name,
            "email" => $this->email,
        ]);

        $this->dispatch("user-actions");
        $this->close_modal_edit();
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);


        $user->endereco?->delete();
        $user->documento?->delete();

        $user->delete();

        $this->dispatch("user-actions");
    }


    #[On("user-actions")]
    public function mount()
    {
        $this->users = User::with(['endereco', 'documento'])->get();
    }

    public function render()
    {
        return view('livewire.user-index');
    }
}
