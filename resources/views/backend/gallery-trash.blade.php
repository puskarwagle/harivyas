<div x-data="{ open: false }" class="w-full">
    <!-- Dropdown Toggle -->
    <div class="collapse bg-base-100/70 backdrop-blur-sm rounded-2xl shadow-xl border border-base-300 mt-8">
        <input type="checkbox" x-model="open" class="peer" />
        <div class="collapse-title text-xl font-medium text-primary-content cursor-pointer">
            <div class="flex items-center justify-between">
                <span>🗑️ Trash Gallery ({{ $trashedImages->count() }} items)</span>
                <svg class="w-5 h-5 transition-transform duration-200" 
                     :class="{ 'rotate-180': open }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>
        
        <!-- Dropdown Content -->
        <div class="collapse-content bg-base-100 !p-0">
            <div class="max-h-96 overflow-y-auto">
                @if($trashedImages->count() > 0)
                    <!-- Desktop Table View -->
                    <div class="hidden lg:block">
                        <div class="overflow-x-auto">
                            <table class="table w-full">
                                <thead>
                                    <tr class="bg-base-300">
                                        <th class="w-20">Image</th>
                                        <th>Title</th>
                                        <th>Year</th>
                                        <th>Location</th>
                                        <th>Tags</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trashedImages as $image)
                                    <tr class="hover:bg-base-200">
                                        <td>
                                            <img src="{{ asset($image->url) }}" 
                                                 alt="{{ $image->title }}" 
                                                 class="w-16 h-16 object-cover rounded-lg shadow-sm">
                                        </td>
                                        <td>
                                            <div class="font-semibold text-sm">{{ $image->title }}</div>
                                            @if($image->description)
                                                <div class="text-xs text-base-content/70 truncate max-w-xs">{{ $image->description }}</div>
                                            @endif
                                        </td>
                                        <td class="text-sm">{{ $image->year ?? 'N/A' }}</td>
                                        <td class="text-sm">{{ $image->location ?? 'N/A' }}</td>
                                        <td>
                                            @if($image->tags)
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach(array_slice($image->tags, 0, 2) as $tag)
                                                        <span class="badge badge-ghost badge-xs">{{ $tag }}</span>
                                                    @endforeach
                                                    @if(count($image->tags) > 2)
                                                        <span class="badge badge-ghost badge-xs">+{{ count($image->tags) - 2 }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="flex gap-2">
                                                <form action="{{ route('gallerymanager.restore', $image->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-xs" title="Restore">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                                <form action="{{ route('gallerymanager.destroy', $image->id) }}" method="POST" class="inline" 
                                                      onsubmit="return confirm('Permanently delete this image? This cannot be undone.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-error btn-xs" title="Delete Forever">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Mobile Grid View -->
                    <div class="lg:hidden grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($trashedImages as $image)
                        <div class="card bg-base-200 shadow-sm">
                            <figure class="px-2 pt-2">
                                <img src="{{ asset($image->url) }}" 
                                     alt="{{ $image->title }}" 
                                     class="w-full h-32 object-cover rounded-lg">
                            </figure>
                            <div class="card-body p-3">
                                <h3 class="card-title text-sm">{{ Str::limit($image->title, 20) }}</h3>
                                <div class="text-xs text-base-content/70">
                                    {{ $image->year ?? 'N/A' }} • {{ Str::limit($image->location ?? 'N/A', 15) }}
                                </div>
                                @if($image->tags)
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        @foreach(array_slice($image->tags, 0, 2) as $tag)
                                            <span class="badge badge-ghost badge-xs">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="card-actions justify-center mt-2">
                                    <form action="{{ route('gallerymanager.restore', $image->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-xs">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('gallerymanager.destroy', $image->id) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Delete forever?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error btn-xs">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-base-content/50">
                        <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <p class="text-lg">Trash is empty</p>
                        <p class="text-sm">Deleted images will appear here</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>