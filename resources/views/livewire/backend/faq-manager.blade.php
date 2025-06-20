<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">FAQ Manager</h1>
    
    <!-- Header row for visual consistency -->
    <div class="grid grid-cols-12 gap-4 mb-4 p-4 bg-base-300 rounded-lg font-semibold text-sm">
        <div class="col-span-1">ID</div>
        <div class="col-span-3">Question</div>
        <div class="col-span-2">Category</div>
        <div class="col-span-2">Tags</div>
        <div class="col-span-2">Status</div>
        <div class="col-span-2">Actions</div>
    </div>

    <!-- FAQ Cards with gaps -->
    <div class="space-y-4">
        @foreach ($faqs as $faq)
        <div class="bg-base-200 rounded-lg shadow-sm border">
            <!-- FAQ Header Row -->
            <div class="grid grid-cols-12 gap-4 p-4 items-center">
                <div class="col-span-1 font-mono text-sm">{{ $faq->id }}</div>
                <div class="col-span-3 truncate">{{ $faq->translate('question') }}</div>
                <div class="col-span-2 text-sm">{{ $faq->getCategoryName() }}</div>
                <div class="col-span-2 text-sm truncate">{{ implode(', ', $faq->getTagsArray()) }}</div>
                <div class="col-span-2">
                    <span class="badge {{ $faq->is_active ? 'badge-success' : 'badge-error' }}">
                        {{ $faq->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <div class="col-span-2 flex items-center space-x-2">
                    <button class="btn btn-xs btn-outline btn-warning">Edit</button>
                    <button class="btn btn-xs btn-outline btn-error">Delete</button>
                </div>
            </div>
            
            <!-- FAQ Answer Row -->
            <div class="border-t border-base-300 p-4 bg-base-100">
                <strong class="text-sm text-base-content/70">Answer:</strong>
                <div class="mt-2 text-sm">{{ $faq->translate('answer') }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>