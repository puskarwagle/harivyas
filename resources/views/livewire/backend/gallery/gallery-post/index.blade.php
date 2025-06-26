<div class="p-4">
    <h1 class="text-3xl font-bold mb-6">Gallery Posts</h1>

    <div class="mb-4 flex justify-between items-center">
        <input type="search" placeholder="Search posts..." wire:model.debounce.300ms="search" class="input input-bordered w-full max-w-xs" />

        <a href="{{ route('galleryManager.posts.create') }}" class="btn btn-primary ml-4">New Post</a>
    </div>

    <table class="table w-full table-zebra">
        <thead>
            <tr>
                <th>Title</th>
                <th>Images</th>
                <th>User</th>
                <th>Tags</th>
                <th>Location</th>
                <th>Year</th>
                <th>Homepage</th>
                <th>Created</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr wire:click="showPost({{ $post->id }})" class="hover cursor-pointer">
                <td>{{ $post->title }}</td>

                <td>
                    @foreach ($post->tags ?? [] as $tag)
                    <span class="badge badge-info mr-1">{{ $tag }}</span>
                    @endforeach
                </td>

                <td>{{ $post->location }}</td>
                <td>{{ $post->year }}</td>

                <td>
                    @if ($post->show_in_homepage)
                    <span class="badge badge-success">Yes</span>
                    @else
                    <span class="badge badge-ghost">No</span>
                    @endif
                </td>

                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                <td>{{ $post->images->count() }}</td>
                <td>{{ $post->user->name ?? '—' }}</td>

                <td class="text-center space-x-2" wire:click.stop>
                    {{-- <a href="{{ route('galleryManager.posts.edit', $post) }}" class="btn btn-xs btn-warning">Edit</a> --}}
                    <button wire:click.stop.prevent="deletePost({{ $post->id }})" class="btn btn-xs btn-error">
                        Delete
                    </button>
                </td>
            </tr>


            @empty
            <tr>
                <td colspan="7" class="text-center">No posts found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>

    <div x-data="{ showModal: @entangle('selectedPost').defer }">
        @if ($selectedPost)
        <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-white rounded-lg max-w-4xl w-full p-6 relative">
                <h2 class="text-xl font-bold mb-2">{{ $selectedPost->title }}</h2>
                <p class="text-sm text-gray-500 mb-4">{{ $selectedPost->description }}</p>

                <!-- Carousel -->
                <div class="carousel w-full mb-4">
                    @foreach ($selectedPost->images as $img)
                    <div class="carousel-item w-full">
                        <img src="{{ $img->url }}" class="w-full h-64 object-cover rounded" />
                    </div>
                    @endforeach
                </div>

                <!-- Meta -->
                <p class="text-gray-600 text-sm">By: {{ $selectedPost->user->name ?? '—' }}</p>
                <p class="text-gray-400 text-xs mt-2">Likes: [coming soon]</p>
                <p class="text-gray-400 text-xs">Comments: [coming soon]</p>

                <!-- Close -->
                <button class="btn btn-sm absolute top-2 right-2" @click="showModal = null">
                    ✕
                </button>
            </div>
        </div>
        @endif

    </div>

</div>
