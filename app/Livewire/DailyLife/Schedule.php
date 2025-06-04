<?php

namespace App\Livewire\DailyLife;

use Livewire\Component;

class Schedule extends Component
{
    public function render()
    {
        return view('livewire.daily-life.schedule')->layout('welcome');
    }
}
