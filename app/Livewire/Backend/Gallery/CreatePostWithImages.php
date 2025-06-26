<?php

namespace App\Livewire\Backend\Gallery;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GalleryPost;
use App\Models\GalleryImage;

class CreatePostWithImages extends Component
{
    use WithFileUploads;

    // Post fields
    public $title;
    public $description;
    public $tags = [];
    public $show_in_homepage = false;
    public $location;
    public $year;

    // Image fields
    public $images = [];
    public $singleImage;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
            'show_in_homepage' => 'boolean',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:10',
            'images' => 'nullable|array',
            'images.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,webm|max:10240',
        ];
    }

    public function submitPostWithImages()
    {
        $this->validate();

        // Step 1: Create the gallery post
        $post = GalleryPost::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'tags' => $this->tags,
            'show_in_homepage' => $this->show_in_homepage,
            'location' => $this->location,
            'year' => $this->year,
        ]);

        // Step 2: Prepare images
        $allImages = $this->images;
        if (empty($allImages) && $this->singleImage) {
            $allImages = [$this->singleImage];
        }

        // Step 3: Store images
        foreach ($allImages as $img) {
            $path = $img->store('gallery', 'public');

            GalleryImage::create([
                'gallery_post_id' => $post->id,
                'url' => "/storage/{$path}",
                'caption' => null,
            ]);
        }

        session()->flash('message', 'Gallery Post and images uploaded successfully.');

        return redirect()->route('galleryManager.posts.index');
    }

    public function render()
    {
        return view('livewire.backend.gallery.create-post-with-images')->layout('components.layouts.app');
    }
}
