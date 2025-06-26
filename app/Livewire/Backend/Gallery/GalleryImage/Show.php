<?php

namespace App\Livewire\Backend\Gallery\GalleryImage;

use Livewire\Component;
use App\Models\GalleryImage;

class Show extends Component
{
    public GalleryImage $image;

    public function mount(GalleryImage $image) { $this->image = $image; }

    public function render()
    {
        return view('livewire.backend.gallery.gallery-image.show')
            ->layout('components.layouts.app');
    }
}
