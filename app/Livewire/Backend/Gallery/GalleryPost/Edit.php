<?php

namespace App\Livewire\Backend\Gallery\GalleryPost;

use Livewire\Component;
use App\Models\GalleryPost;

class Edit extends Component
{
    public GalleryPost $post;

    protected $rules = [
        'post.title' => 'required|string|max:255',
        'post.description' => 'nullable|string',
        'post.tags' => 'nullable|array',
        'post.tags.*' => 'string',
        'post.show_in_homepage' => 'boolean',
        'post.location' => 'nullable|string|max:255',
        'post.year' => 'nullable|string|max:10',
    ];

    public function mount(GalleryPost $post)
    {
        $this->post = $post;
    }

    public function submit()
    {
        $this->validate();

        $this->post->save();

        session()->flash('message', 'Gallery Post updated successfully.');

        return redirect()->route('galleryManager.posts.index');
    }

    public function render()
    {
        return view('livewire.backend.gallery.gallery-post.edit')->layout('components.layouts.app');
    }
}

