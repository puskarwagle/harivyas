<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Gallery Images</h2>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Search by caption..." class="input input-bordered w-full sm:max-w-xs" />
        <a href="{{ route('galleryManager.images.create') }}" class="btn btn-primary">Add Image</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Caption</th>
                    <th>Post</th>
                    <th>Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($images as $img)
                <tr>
                    <td>
                        <img src="{{ $img->url }}" alt="preview" class="h-16 rounded">
                    </td>
                    <td>{{ $img->caption ?? '—' }}</td>
                    <td>
                        <div class="font-semibold">{{ optional($img->post)->title ?? '—' }}</div>
                        <div class="text-xs text-gray-500">
                            {{ optional($img->post)->images()->count() ?? 0 }} image(s)
                        </div>
                    </td>
                    <td>
                        {{ optional($img->post?->user)->name ?? '—' }}
                    </td>
                    <td>{{ $img->created_at->format('Y-m-d') }}</td>
                    <td class="text-center space-x-1">
                        <a href="{{ route('galleryManager.images.show', $img) }}" class="btn btn-xs btn-info">View</a>
                        <a href="{{ route('galleryManager.images.edit', $img) }}" class="btn btn-xs btn-warning">Edit</a>
                        <button wire:click="delete({{ $img->id }})" onclick="confirm('Are you sure you want to delete this image?') || event.stopImmediatePropagation()" class="btn btn-xs btn-error" type="button">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No images found.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-4">
        {{ $images->links() }}
    </div>
</div>
