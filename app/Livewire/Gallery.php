<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GalleryImage;

class Gallery extends Component
{
    public $images = [];

    public function mount()
    {
        $this->images = GalleryImage::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.gallery')->layout('welcome');
    }
}