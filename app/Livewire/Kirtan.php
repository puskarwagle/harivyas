<?php

namespace App\Livewire;

use Livewire\Component;

class Kirtan extends Component
{
    public function render()
    {
        return view('livewire.kirtan')
            ->layout('welcome');
    }
}
