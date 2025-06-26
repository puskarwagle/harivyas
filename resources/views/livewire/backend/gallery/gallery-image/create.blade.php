<div class="max-w-2xl mx-auto p-4">
    <h2 class="text-xl font-bold mb-6">Upload New Image</h2>
    
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    
    <form wire:submit.prevent="submit" class="space-y-4">
        <div class="form-control">
            <label class="label">Gallery Post</label>
            <select wire:model="gallery_post_id" class="select select-bordered">
                <option value="">Select a post</option>
                @foreach ($posts as $id => $title)
                    <option value="{{ $id }}">{{ $title }}</option>
                @endforeach
            </select>
            @error('gallery_post_id') 
                <span class="text-error text-sm">{{ $message }}</span> 
            @enderror
        </div>
        
        <div class="form-control">
            <label class="label">Upload Images (Multiple)</label>
            <input 
                type="file" 
                wire:model="images" 
                multiple 
                accept="image/*,video/*"
                class="file-input file-input-bordered w-full" 
            />
            @error('images') 
                <span class="text-error text-sm">{{ $message }}</span> 
            @enderror
            @error('images.*') 
                <span class="text-error text-sm">{{ $message }}</span> 
            @enderror
            
            {{-- Debug info --}}
            @if ($images)
                <div class="text-xs text-gray-500 mt-1">
                    Multiple: {{ gettype($images) }} | 
                    @if(is_array($images))
                        Array with {{ count($images) }} items
                    @else
                        Single item: {{ $images ? get_class($images) : 'null' }}
                    @endif
                </div>
            @endif
        </div>

        <div class="divider">OR</div>
        
        <div class="form-control">
            <label class="label">Upload Single Image (Test)</label>
            <input 
                type="file" 
                wire:model="singleImage" 
                accept="image/*,video/*"
                class="file-input file-input-bordered w-full" 
            />
            @if ($singleImage)
                <div class="text-xs text-gray-500 mt-1">
                    Single: {{ gettype($singleImage) }} | {{ $singleImage ? get_class($singleImage) : 'null' }}
                </div>
            @endif
        </div>
        
        @if ($images)
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                @foreach (is_array($images) ? $images : [$images] as $tempImage)
                    <div class="border p-2 rounded shadow">
                        @php
                            $isVideo = in_array(strtolower($tempImage->getClientOriginalExtension()), ['mp4','mov','avi','webm']);
                        @endphp
                        
                        @if ($isVideo)
                            <video controls class="w-full h-32 object-cover rounded">
                                <source src="{{ $tempImage->temporaryUrl() }}" type="video/{{ $tempImage->getClientOriginalExtension() }}">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ $tempImage->temporaryUrl() }}" alt="Preview" class="h-32 w-full object-cover rounded" />
                        @endif
                        
                        <p class="text-xs mt-1 text-gray-600">{{ $tempImage->getClientOriginalName() }}</p>
                    </div>
                @endforeach
            </div>
        @endif
        
        <button type="submit" class="btn btn-primary w-full" wire:loading.attr="disabled">
            <span wire:loading.remove>Upload All</span>
            <span wire:loading>Uploading...</span>
        </button>
    </form>
</div>