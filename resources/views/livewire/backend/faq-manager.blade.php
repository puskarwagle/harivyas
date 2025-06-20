<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">FAQ Manager</h1>

        <!-- Locale Selector -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-medium">Language: ({{ $selectedLocale }})</span>
            </label>
            <select wire:change="changeLocale($event.target.value)" class="select select-bordered w-40">
                @foreach($availableLocales as $code => $name)
                <option value="{{ $code }}" {{ $selectedLocale === $code ? 'selected' : '' }}>
                    {{ $name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Header row -->
    <div class="grid grid-cols-12 gap-4 mb-4 p-4 bg-base-300 rounded-lg font-semibold text-sm">
        <div class="col-span-1">ID</div>
        <div class="col-span-3">Question</div>
        <div class="col-span-2">Category</div>
        <div class="col-span-2">Tags</div>
        <div class="col-span-2">Status</div>
        <div class="col-span-2">Actions</div>
    </div>

    <!-- FAQ Cards -->
    <div class="space-y-4">
        @forelse ($faqs as $faq)
        <div class="bg-base-200 rounded-lg shadow-sm border">
            <!-- Header Row -->
            <div class="grid grid-cols-12 gap-4 p-4 items-center">
                <div class="col-span-1 font-mono text-sm">{{ $faq->id }}</div>

                <div class="col-span-3">
                    <div class="truncate" title="{{ $this->getTranslatedText($faq, 'question') }}">
                        {{ $this->getTranslatedText($faq, 'question') }}
                    </div>
                </div>

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

            <!-- Answer Section -->
            <div class="border-t border-base-300 px-4 py-3 bg-base-100">
                <div class="mb-2">
                    <strong class="text-sm text-base-content/70">Answer ({{ $availableLocales[$selectedLocale] }}):</strong>
                </div>
                <div class="text-sm text-base-content/90 leading-relaxed">
                    {{ $this->getTranslatedText($faq, 'answer') }}
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-8 text-base-content/60">
            No FAQs found.
        </div>
        @endforelse
    </div>
</div>
