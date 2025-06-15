<?php
namespace App\Livewire\Backend;

use Livewire\Component;

use Livewire\WithFileUploads;
use App\Models\GalleryImage;
use Illuminate\Support\Str;

class GalleryManager extends Component
{
    use WithFileUploads;

    public $message = "Livewire component is connected!";
    public $testCounter = 0;

    public $photo;
    public $title;
    public $description;

    public function increment()
    {
        $this->testCounter++;
    }

    // public function upload()
    // {
    //     dd([
    //         'photo' => $this->photo,
    //         'title' => $this->title,
    //         'description' => $this->description,
    //     ]);

    //     $this->validate([
    //         'photo' => 'required|image|max:2048', // 2MB Max
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //     ]);

    //     $filename = Str::uuid() . '.' . $this->photo->getClientOriginalExtension();
    //     $this->photo->storeAs('public/gallery', $filename);

    //     GalleryImage::create([
    //         'title' => $this->title,
    //         'description' => $this->description,
    //         'url' => "storage/gallery/{$filename}",
    //     ]);

    //     $this->reset(['photo', 'title', 'description']);
    //     session()->flash('message', 'Image uploaded successfully.');
    // }

    public function upload()
    {
        dd([
            'photo_exists' => $this->photo !== null,
            'photo_type' => gettype($this->photo),
            'photo_value' => $this->photo,
            'title' => $this->title,
            'description' => $this->description,
            'all_properties' => get_object_vars($this),
        ]);
    }

    public function render()
    {
        return view('livewire.backend.gallery-manager')
            ->layout('components.layouts.app', ['title' => __('Gallery')]);
    }
}
