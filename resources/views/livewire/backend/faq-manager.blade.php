<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">FAQ Manager</h1>
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
            {{-- Choose available locales for this FAQ: --}}
                <div class="flex items-center gap-2 text-xs m-2">
                    @foreach ($faqAvailableLocales[$faq->id] as $locale)
                    <button wire:click="changeFaqLocale({{ $faq->id }}, '{{ $locale }}')" class="badge badge-sm 
                        {{ ($faqLocales[$faq->id] ?? $selectedLocale) === $locale 
                                ? 'badge-info' 
                                : 'badge-outline' }}">
                        {{ $availableLocales[$locale] ?? strtoupper($locale) }}
                    </button>
                    @endforeach

                </div>

            <!-- Answer Section -->
            <div class="border-t border-base-300 px-4 py-3 bg-base-100">
                <strong class="text-sm text-base-content/70">
                    Answer ({{ $availableLocales[$selectedLocale] ?? strtoupper($selectedLocale ?? 'N/A') }}):
                </strong>

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
