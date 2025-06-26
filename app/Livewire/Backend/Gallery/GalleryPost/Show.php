<?php

namespace App\Livewire\Backend\Gallery\GalleryPost;

use Livewire\Component;
use App\Models\GalleryPost;

class Show extends Component
{
    public GalleryPost $post;

    public function mount(GalleryPost $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.backend.gallery.gallery-post.show')->layout('components.layouts.app');
    }
}

