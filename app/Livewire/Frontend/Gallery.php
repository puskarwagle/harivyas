<?php

namespace App\Livewire\Frontend;

use App\Models\GalleryImage;
use Livewire\Component;

class Gallery extends Component
{
    public array $images = [];

    public function mount()
    {
        $this->images = $this->loadGalleryImages();
    }

    protected function loadGalleryImages(): array
    {
        return GalleryImage::with('post')->get()->map(function ($image) {
            return [
                'id' => $image->id,
                'url' => $image->url,
                'title' => $image->post->title,
                'description' => $image->post->description,
                'tags' => $image->post->tags ?? [],
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.frontend.gallery', [
            'images' => $this->images,
        ]);
    }
}
