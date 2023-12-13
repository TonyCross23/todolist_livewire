<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Clicker extends Component
{

    public $name = ' ';
    public $email = ' ';
    public $password = ' ';

    public function render()
    {
   
        return view('livewire.clicker');
    }

    public function createUser () {
     User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => Hash::make($this->password),
        ]);
    }
}