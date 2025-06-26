<?php

namespace App\Livewire\Backend\Gallery\GalleryImage;

use Livewire\Component;
use App\Models\GalleryImage;
use App\Models\GalleryPost;

class Edit extends Component
{
    public GalleryImage $image;

    protected $rules = [
        'image.gallery_post_id' => 'required|exists:gallery_posts,id',
        'image.caption' => 'nullable|string|max:255',
    ];

    public function mount(GalleryImage $image) { $this->image = $image; }

    public function submit()
    {
        $this->validate();
        $this->image->save();
        session()->flash('message', 'Image updated.');
        return redirect()->route('galleryManager.images.index');
    }

    public function render()
    {
        return view('livewire.backend.gallery.gallery-image.edit', [
            'posts' => GalleryPost::pluck('title', 'id')
        ])->layout('components.layouts.app');
    }
}
