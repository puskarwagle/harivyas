<?php

namespace App\Livewire;

use Livewire\Component;

class Festivals extends Component
{
    public function render()
    {
        return view('livewire.festivals')->layout('welcome');
    }
}
