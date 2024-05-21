<?php

namespace App\Livewire;

use Livewire\Component;

class Onboarding extends Component
{
    public function render()
    {
        return view('livewire.onboarding', [
            'user' => auth()->user(),
        ]);
    }
}
