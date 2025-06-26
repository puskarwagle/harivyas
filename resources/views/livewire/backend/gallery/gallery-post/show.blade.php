<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">{{ $post->title }}</h1>

    <div class="mb-4 text-gray-700">
        {{ $post->description }}
    </div>

    <div class="mb-4">
        <strong>Tags:</strong>
        @if ($post->tags)
            @foreach ($post->tags as $tag)
                <span class="badge badge-info mr-1">{{ $tag }}</span>
            @endforeach
        @endif
    </div>

    <div class="mb-4">
        <strong>Location:</strong> {{ $post->location ?? 'N/A' }} <br>
        <strong>Year:</strong> {{ $post->year ?? 'N/A' }}
    </div>

    <div class="mb-4">
        <strong>Show in Homepage:</strong>
        @if($post->show_in_homepage)
            <span class="badge badge-success">Yes</span>
        @else
            <span class="badge badge-ghost">No</span>
        @endif
    </div>

    <div class="mt-8">
        <a href="{{ route('galleryManager.posts.edit', $post) }}" class="btn btn-warning mr-2">Edit</a>
        <a href="{{ route('galleryManager.posts.index') }}" class="btn btn-outline">Back to List</a>
    </div>
</div>
