<?php

namespace App\Livewire;

use Livewire\Component;

class VisualTailwindEditor extends Component
{
    public function render()
    {
        return view('livewire.visual-tailwind-editor')
        ->layout('welcome');
    }
}
