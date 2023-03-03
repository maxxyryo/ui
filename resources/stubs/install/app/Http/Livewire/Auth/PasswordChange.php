<?php

namespace App\Http\Livewire\Auth;

use Maxxyryo\Ui\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PasswordChange extends Component
{
    use WithModel;

    public function render()
    {
        return view('auth.password-change');
    }

    public function rules()
    {
        return [
            'current_password' => ['required', 'password'],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function save()
    {
        $this->validateModel();

        Auth::user()->update($this->getModel(['password']));

        $this->emit('hideModal');
    }
}
