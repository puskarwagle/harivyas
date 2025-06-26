<?php

namespace App\Livewire\Backend\Gallery\GalleryImage;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GalleryImage;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch() { $this->resetPage(); }

    public function delete(int $id)
    {
        $image = GalleryImage::findOrFail($id);
        $image->delete();

        session()->flash('message', 'Image deleted successfully.');

        // Refresh the list
        $this->resetPage();
    }

    public function render()
    {
        $query = GalleryImage::with(['post.user'])->orderByDesc('created_at');
        
        if ($this->search) {
            $query->where(function($q) {
                $q->where('caption', 'like', "%{$this->search}%")
                  ->orWhereHas('post', function($postQuery) {
                      $postQuery->where('title', 'like', "%{$this->search}%");
                  });
            });
        }
        
        $images = $query->paginate(10);

        return view('livewire.backend.gallery.gallery-image.index', compact('images'))
            ->layout('components.layouts.app');
    }
}
