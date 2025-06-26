<div class="max-w-2xl mx-auto p-4">
    <h2 class="text-xl font-bold mb-6">Edit Image</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div class="form-control">
            <label class="label">Gallery Post</label>
            <select wire:model="image.gallery_post_id" class="select select-bordered">
                <option value="">Select a post</option>
                @foreach ($posts as $id => $title)
                    <option value="{{ $id }}">{{ $title }}</option>
                @endforeach
            </select>
            @error('image.gallery_post_id') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="form-control">
            <label class="label">Caption</label>
            <input type="text" wire:model.defer="image.caption" class="input input-bordered" />
            @error('image.caption') <span class="text-error text-sm">{{ $message }}</span> @enderror
        </div>

        <button class="btn btn-warning w-full">Update Image</button>
    </form>
</div>