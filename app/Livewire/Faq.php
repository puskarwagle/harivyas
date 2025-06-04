<?php

namespace App\Livewire;

use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        return view('livewire.faq')->layout('welcome');
    }
}
