<?php
namespace App\Livewire\Backend\Gallery\GalleryImage;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GalleryImage;
use App\Models\GalleryPost;

class Create extends Component
{
    use WithFileUploads;
    
    public $gallery_post_id;
    public $images = [];
    public $singleImage; // For testing single upload
    public $caption;
    
    protected $rules = [
        'gallery_post_id' => 'required|exists:gallery_posts,id',
        'images.*' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,webm|max:100240',
    ];
    
    protected function rules()
    {
        return [
            'gallery_post_id' => 'required|exists:gallery_posts,id',
            'images' => 'required|array|min:1',
            'images.*' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,webm|max:100240',
        ];
    }
    
    public function submit()
    {
        // Debug logs
        dump('=== SUBMIT CALLED ===');
        dump('gallery_post_id:', $this->gallery_post_id);
        dump('images type:', gettype($this->images));
        dump('images value:', $this->images);
        dump('images count:', is_array($this->images) ? count($this->images) : 'not array');
        dump('singleImage type:', gettype($this->singleImage));
        dump('singleImage value:', $this->singleImage);
        
        // Use single image if multiple is empty
        if (empty($this->images) && $this->singleImage) {
            dump('Using single image fallback');
            $this->images = [$this->singleImage];
        }
        
        if ($this->images) {
            if (is_array($this->images)) {
                dump('images count:', count($this->images));
                foreach ($this->images as $idx => $img) {
                    if ($img) {
                        dump("Image {$idx}:", [
                            'class' => get_class($img),
                            'original_name' => $img->getClientOriginalName(),
                            'size' => $img->getSize(),
                        ]);
                    }
                }
            } else {
                dump('Single image:', [
                    'class' => get_class($this->images),
                    'original_name' => $this->images->getClientOriginalName(),
                    'size' => $this->images->getSize(),
                ]);
            }
        }
        
        try {
            $this->validate();
            dump('=== VALIDATION PASSED ===');
        } catch (\Exception $e) {
            dump('=== VALIDATION FAILED ===');
            dump('Error:', $e->getMessage());
            dump('Errors:', $this->getErrorBag()->toArray());
            return;
        }
        
        // Ensure images is always an array
        $imagesToProcess = is_array($this->images) ? $this->images : [$this->images];
        dump('=== PROCESSING FILES ===');
        dump('Files to process:', count($imagesToProcess));
        
        foreach ($imagesToProcess as $idx => $file) {
            dump("Processing file {$idx}...");
            
            try {
                $path = $file->store('gallery', 'public');
                dump("File stored at: {$path}");
                
                $galleryImage = GalleryImage::create([
                    'gallery_post_id' => $this->gallery_post_id,
                    'url' => "/storage/{$path}",
                    'caption' => null,
                ]);
                dump("DB record created with ID: {$galleryImage->id}");
                
            } catch (\Exception $e) {
                dump("Error processing file {$idx}:", $e->getMessage());
                dump("Exception:", $e);
            }
        }
        
        $count = count($imagesToProcess);
        session()->flash('message', "{$count} image(s) uploaded successfully.");
        dump('=== REDIRECTING ===');
        
        return redirect()->route('galleryManager.images.index');
    }
    
    public function render()
    {
        return view('livewire.backend.gallery.gallery-image.create', [
            'posts' => GalleryPost::pluck('title', 'id')
        ])->layout('components.layouts.app');
    }
}