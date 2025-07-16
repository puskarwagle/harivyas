<?php
namespace App\Livewire\Backend\Gallery\GalleryImage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GalleryImage;

class Index extends Component
{
    use WithPagination;
    
    public $search = '';
    public $groupBy = 'date'; // 'date' or 'post'
    public $selectedImages = [];
    public $showModal = false;
    public $modalImage = null;
    
    protected $updatesQueryString = ['search', 'groupBy'];
    
    public function updatingSearch() { $this->resetPage(); }
    public function updatingGroupBy() { $this->resetPage(); }
    
    public function toggleImageSelection($imageId)
    {
        if (in_array($imageId, $this->selectedImages)) {
            $this->selectedImages = array_diff($this->selectedImages, [$imageId]);
        } else {
            $this->selectedImages[] = $imageId;
        }
    }
    
    public function selectAllInGroup($groupImages)
    {
        $imageIds = collect($groupImages)->pluck('id')->toArray();
        $this->selectedImages = array_unique(array_merge($this->selectedImages, $imageIds));
    }
    
    public function clearSelection()
    {
        $this->selectedImages = [];
    }
    
    public function deleteSelected()
    {
        if (empty($this->selectedImages)) return;
        
        GalleryImage::whereIn('id', $this->selectedImages)->delete();
        $this->selectedImages = [];
        $this->resetPage();
        
        session()->flash('message', 'Selected images deleted successfully.');
    }
    
    public function openModal($imageId)
    {
        $this->modalImage = GalleryImage::with(['post.user'])->findOrFail($imageId);
        $this->showModal = true;
    }
    
    public function closeModal()
    {
        $this->showModal = false;
        $this->modalImage = null;
    }
    
public function render()
{
    $query = GalleryImage::with(['post.user']);
    
    if ($this->groupBy === 'post') {
        $query->orderBy('post_id')
              ->orderByDesc('created_at');
    } else {
        $query->orderByDesc('created_at');
    }
    
    if ($this->search) {
        $query->where(function($q) {
            $q->where('caption', 'like', "%{$this->search}%")
              ->orWhereHas('post', function($postQuery) {
                  $postQuery->where('title', 'like', "%{$this->search}%");
              });
        });
    }
    
    $images = $query->paginate(50);
    $groupedImages = $this->groupImages($images);
    
    // Debug - remove this after testing
    if ($this->groupBy === 'post') {
        dd([
            'groupBy' => $this->groupBy,
            'first_image' => $images->first(),
            'first_post' => $images->first()?->post,
            'grouped_keys' => $groupedImages->keys(),
            'total_groups' => $groupedImages->count()
        ]);
    }
    
    return view('livewire.backend.gallery.gallery-image.index', [
        'images' => $images,
        'groupedImages' => $groupedImages,
        'selectedCount' => count($this->selectedImages)
    ])->layout('components.layouts.app');
}

private function groupImages($images)
{
    if ($this->groupBy === 'post') {
        return $images->groupBy('post.title')->sortKeys();
    }
    
    return $images->groupBy(function($image) {
        return $image->created_at->format('Y-m-d');
    })->sortKeysDesc();
}

}