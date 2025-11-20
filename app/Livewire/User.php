<?php

namespace App\Livewire;

use Livewire\Component;




class User extends Component
{

    public function create(){
        $this->validate([
            "name" => "required",
            "email" => "unique",
            "password" => "required",
        ]);

        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
        ]);

        
    }

    
    public function render()
    {
        return view('livewire.user');
    }
}
