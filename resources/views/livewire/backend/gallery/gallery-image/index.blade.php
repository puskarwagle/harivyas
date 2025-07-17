<div>
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4" data-trans="galleryImage.title">Gallery Images</h2>

        <!-- Controls -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">
            <div class="flex flex-col sm:flex-row gap-2">
            <input type="text" wire:model.debounce.500ms="search" placeholder="Search" class="input input-bordered w-full sm:max-w-xs" />
                <select wire:model="groupBy" class="select select-bordered w-full sm:w-auto" aria-label="Group by select">
                    <option value="date" data-trans="galleryImage.group_by_date">Group by Date</option>
                    <option value="post" data-trans="galleryImage.group_by_post">Group by Post</option>
                </select>
            </div>

            <div class="flex gap-2">
                @if($selectedCount > 0)
                <button wire:click="deleteSelected" onclick="confirm('@lang('galleryImage.delete_confirm', ['count' => $selectedCount])') || event.stopImmediatePropagation()" class="btn btn-error btn-sm" data-trans="galleryImage.delete_selected">
                    Delete Selected ({{ $selectedCount }})
                </button>
                <button wire:click="clearSelection" class="btn btn-dash btn-warning btn-sm" data-trans="galleryImage.clear">Clear</button>
                @endif
                <a href="{{ route('galleryManager.posts.create') }}" class="btn btn-primary btn-sm" data-trans="galleryImage.new_post">New Post</a>
            </div>
        </div>

        <!-- Pinterest Grid -->
        <div class="space-y-8">
            @forelse ($groupedImages as $groupName => $groupImages)
            <div class="group-section">
                <!-- Group Header -->
                <div class="flex items-center justify-between mb-4 p-3 bg-base-200 rounded-lg">
                    <h3 class="text-lg font-semibold">
                        {{ $groupBy === 'date' ? \Carbon\Carbon::parse($groupName)->format('M d, Y') : $groupName }}
                        <span class="text-sm text-gray-500">({{ count($groupImages) }} images)</span>
                    </h3>
                    <button wire:click="selectAllInGroup({{ $groupImages->toJson() }})" class="btn btn-soft" data-trans="galleryImage.select_all">
                        Select All
                    </button>
                </div>

                <!-- Pinterest Masonry Grid -->
                <div class="columns-2 sm:columns-3 md:columns-4 lg:columns-5 xl:columns-6 gap-4 space-y-4">
                    @foreach ($groupImages as $img)
                    <div class="break-inside-avoid mb-4 relative group">
                        <!-- Image Container -->
                        <div class="relative bg-base-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                            <!-- Selection Checkbox -->
                            <div class="absolute top-2 left-2 z-10">
                                <input type="checkbox" wire:click="toggleImageSelection({{ $img->id }})" @if(in_array($img->id, $selectedImages)) checked @endif
                                class="checkbox checkbox-primary checkbox-sm bg-white/80 backdrop-blur-sm" />
                            </div>

                            <!-- Image -->
                            <img src="{{ $img->url }}" alt="{{ $img->caption ?? __('galleryImage.gallery_image_alt') }}" class="w-full h-auto cursor-pointer hover:scale-105 transition-transform duration-300" wire:click="openModal({{ $img->id }})" loading="lazy" />

                            <!-- Image Overlay Info -->
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                @if($img->caption)
                                <p class="text-white text-sm font-medium mb-1">{{ Str::limit($img->caption, 50) }}</p>
                                @endif
                                @if($img->post)
                                <p class="text-white/80 text-xs">{{ $img->post->title }}</p>
                                @endif
                                <p class="text-white/60 text-xs">{{ $img->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <p class="text-gray-500" data-trans="galleryImage.no_images_found">No images found.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $images->links() }}
        </div>

        <!-- Modal for Image Details -->
        @if($showModal && $modalImage)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4" wire:click="closeModal">
            <div class="bg-base-100 rounded-lg max-w-4xl max-h-[90vh] overflow-hidden" @click.stop>
                <div class="flex flex-col md:flex-row">
                    <!-- Image -->
                    <div class="md:w-2/3 bg-black flex items-center justify-center">
                        <img src="{{ $modalImage->url }}" alt="{{ $modalImage->caption ?? __('galleryImage.gallery_image_alt') }}" class="max-w-full max-h-[60vh] object-contain" />
                    </div>

                    <!-- Details -->
                    <div class="md:w-1/3 p-6 space-y-4">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold" data-trans="galleryImage.image_details">Image Details</h3>
                            <button wire:click="closeModal" class="btn btn-ghost btn-sm" aria-label="Close modal">✕</button>
                        </div>

                        <div class="space-y-3">
                            @if($modalImage->caption)
                            <div>
                                <label class="text-sm font-medium text-gray-600" data-trans="galleryImage.caption">Caption</label>
                                <p class="text-sm">{{ $modalImage->caption }}</p>
                            </div>
                            @endif

                            @if($modalImage->post)
                            <div>
                                <label class="text-sm font-medium text-gray-600" data-trans="galleryImage.post">Post</label>
                                <p class="text-sm">{{ $modalImage->post->title }}</p>
                            </div>
                            @endif

                            @if($modalImage->post?->user)
                            <div>
                                <label class="text-sm font-medium text-gray-600" data-trans="galleryImage.uploaded_by">Uploaded by</label>
                                <p class="text-sm">{{ $modalImage->post->user->name }}</p>
                            </div>
                            @endif

                            <div>
                                <label class="text-sm font-medium text-gray-600" data-trans="galleryImage.date">Date</label>
                                <p class="text-sm">{{ $modalImage->created_at->format('M d, Y g:i A') }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-600" data-trans="galleryImage.file_size">File Size</label>
                                <p class="text-sm">{{ $modalImage->file_size ?? __('galleryImage.unknown') }}</p>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2 pt-4">
                            <button wire:click="toggleImageSelection({{ $modalImage->id }})" class="btn btn-sm {{ in_array($modalImage->id, $selectedImages) ? 'btn-error' : 'btn-primary' }}" data-trans="{{ in_array($modalImage->id, $selectedImages) ? 'galleryImage.deselect' : 'galleryImage.select' }}">
                                {{ in_array($modalImage->id, $selectedImages) ? __('galleryImage.deselect') : __('galleryImage.select') }}
                            </button>
                            <a href="{{ $modalImage->url }}" target="_blank" class="btn btn-sm btn-ghost" data-trans="galleryImage.view_full_size">View Full Size</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <style>
        /* Pinterest-style masonry responsive adjustments */
        @media (max-width: 640px) {
            .columns-2 {
                columns: 2;
            }
        }

        @media (min-width: 641px) and (max-width: 768px) {
            .columns-3 {
                columns: 3;
            }
        }
    </style>
</div>
