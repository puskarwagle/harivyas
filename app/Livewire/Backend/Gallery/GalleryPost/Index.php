<?php

namespace App\Livewire\Backend\Gallery\GalleryPost;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GalleryPost;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public $selectedPost;

    public function confirmDelete($postId)
    {
        $this->selectedPost = GalleryPost::findOrFail($postId);
    }

    public function deletePost($postId)
    {
        $post = GalleryPost::with('images')->findOrFail($postId);

        // Delete image files
        foreach ($post->images as $img) {
            if ($img->url && file_exists(public_path($img->url))) {
                unlink(public_path($img->url));
            }
            $img->delete();
        }

        $post->delete();

        session()->flash('message', 'Post and associated images deleted successfully.');
    }

    public function showPost($postId)
    {
        $this->selectedPost = GalleryPost::with(['images', 'user'])->findOrFail($postId);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = GalleryPost::with(['user', 'images'])
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.backend.gallery.gallery-post.index', compact('posts'))
            ->layout('components.layouts.app');
    }

}
