<div class="p-4">
    <ul class="menu menu-xs bg-base-200 rounded-box max-w-xs w-full">
        @foreach ($routes as $node)
            @include('livewire.partials.route-node', ['node' => $node])
        @endforeach
    </ul>
</div>
