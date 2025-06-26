<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Media Preview</h2>

    @if ($image->post && $image->post->images->count())
        <div class="carousel rounded-box space-x-4 overflow-x-auto flex snap-x snap-mandatory scroll-smooth scrollbar-hide">
            @foreach ($image->post->images as $media)
                @php
                    $ext = pathinfo($media->url, PATHINFO_EXTENSION);
                    $isVideo = in_array(strtolower($ext), ['mp4','mov','webm','avi']);
                @endphp

                <div class="carousel-item w-full md:w-[500px] snap-start flex-shrink-0">
                    @if ($isVideo)
                        <video controls class="w-full h-64 object-contain rounded">
                            <source src="{{ $media->url }}">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <img src="{{ asset(str_replace('public/', 'storage/', $media->url)) }}" class="w-full h-64 object-contain rounded" />
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-gray-500 italic">No associated media found.</div>
    @endif

    <div class="mt-6 space-y-2 text-lg">
        <p><strong>Caption:</strong> {{ $image->caption ?: '—' }}</p>
        <p><strong>Attached to Post:</strong> {{ $image->post->title ?? '—' }}</p>
        <p><strong>Uploaded:</strong> {{ $image->created_at->format('Y-m-d H:i') }}</p>
    </div>

    <div class="mt-6 flex justify-end gap-2">
        <a href="{{ route('galleryManager.images.edit', $image) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('galleryManager.images.index') }}" class="btn btn-outline">Back</a>
    </div>
</div>
