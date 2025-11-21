<?php

namespace App\Livewire;


use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class UserIndex extends Component
{
    public $modal_create = false;
    public $modal_edit = false;
    public $users;
    public $user;

    public $name;
    public $email;
    public $password;

    public function open_modal_create(){
          $this->name = null;
        $this->email = null;
        $this->password = null;

        $this->modal_create = true;
    }
    public function close_modal_create(){
        $this->modal_create = false;
    }
    public function open_modal_edit(){
        $this->modal_edit = true;
    }
    public function close_modal_edit(){
        $this->modal_edit = false;
    }

    public function create(){


        $this->validate([
            "name" => "required",
            "email" => "unique:users,email",
            "password" => "required",
        ]);

        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
        ]);

        $this->close_modal_create();

        $this->dispatch("user-actions");
    }

    public function edit($id){
        $this->user = User::find($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;

        $this->open_modal_edit();
    }
    public function update(){
        $this->validate([
            "name" => "required",
            "email" => "unique:users,email," . $this->user->id,
        ]);



        $this->user->update([
            "name" => $this->name,
            "email" => $this->email,
        ]);
        $this->dispatch("user-actions");
        $this->close_modal_edit();
    }



    public function delete($id){
        User::find($id)->delete();
        $this->dispatch("user-actions");
    }


    #[On("user-actions")]
    public function mount(){
        $this->users = User::all();

    }


    public function render()
    {
        return view('livewire.user-index');
    }
}
