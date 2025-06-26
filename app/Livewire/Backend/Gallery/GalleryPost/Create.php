<?php

namespace App\Livewire\Backend\Gallery\GalleryPost;

use Livewire\Component;
use App\Models\GalleryPost;

class Create extends Component
{
    public $title;
    public $description;
    public $tags = [];
    public $show_in_homepage = false;
    public $location;
    public $year;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|array',
        'tags.*' => 'string',
        'show_in_homepage' => 'boolean',
        'location' => 'nullable|string|max:255',
        'year' => 'nullable|string|max:10',
    ];

    public function submit()
    {
        $this->validate();

        GalleryPost::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'tags' => $this->tags,
            'show_in_homepage' => $this->show_in_homepage,
            'location' => $this->location,
            'year' => $this->year,
        ]);

        session()->flash('message', 'Gallery Post created successfully.');

        return redirect()->route('galleryManager.posts.index');
    }

    public function render()
    {
        return view('livewire.backend.gallery.gallery-post.create')->layout('components.layouts.app');
    }
}

