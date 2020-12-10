<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class SignUp extends Component
{
    public $name, $email, $password;

    protected $rules = [
        'name' =>          ['required', 'max:150'],
        'email' =>         ['required', 'email', 'max:150', 'unique:users,email'],
        'password' =>      ['required', 'min:8', 'max:100'],
    ];

    public function render() {
        return view('livewire.sign-up');
    }

    public function createUser() {

        $validatedData = $this->validate();
        $plainPassword = $validatedData['password'];
        $validatedData['password'] = Hash::make($plainPassword);

        User::create($validatedData);

        $this->reset();

        $this->resetValidation();

        session()->flash('createUserMessage', 'User created!');

    }
}
