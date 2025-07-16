<div>
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">
                {{ __('Spiritual Questions Bank') }}
            </h1>
            <p class="text-lg text-base-content max-w-2xl mx-auto">
                {{ __('Find answers to your spiritual questions and explore various topics related to spirituality.') }}
            </p>
        </div>

        {{-- Language Switch + Search Row --}}
        <div class="flex flex-col md:flex-row gap-4 mb-8 items-center justify-between">
            {{-- Language Toggle --}}
            <div class="flex items-center gap-2">
                <!-- <span class="text-sm font-medium">{{ __('Language') }}:</span> -->
                <div class="btn-group">
                    <button 
                        class="btn btn-sm {{ $currentLang === 'hi' ? 'btn-primary' : 'btn-outline' }}"
                        wire:click="switchLanguage('hi')"
                    >
                        हिंदी
                    </button>
                    <button 
                        class="btn btn-sm {{ $currentLang === 'en' ? 'btn-primary' : 'btn-outline' }}"
                        wire:click="switchLanguage('en')"
                    >
                        English
                    </button>
                </div>
            </div>

            {{-- Search Input --}}
            <div class="form-control max-w-md">
                <div class="input-group flex">
                    <input 
                        type="text" 
                        placeholder="{{ __('Search FAQs...') }}" 
                        class="input input-bordered w-full" 
                        wire:model.live.debounce.300ms="searchTerm"
                    >
                    @if(strlen($searchTerm) > 0)
                        <button class="btn btn-square btn-outline" wire:click="clearFilters">
                            ✕
                        </button>
                    @endif
                </div>
            </div>
        </div>

        {{-- Category Tabs --}}
        <div class="tabs tabs-boxed justify-center mb-8 flex-wrap">
            @foreach($categories as $category)
            <button 
                class="tab {{ $selectedCategory === $category['id'] ? 'tab-active' : '' }}" 
                wire:click="filterByCategory({{ $category['id'] }})"
            >
                {{ $category['name'] }}
            </button>
            @endforeach
        </div>

        {{-- Search Results Counter --}}
        @if(strlen($searchTerm) > 0)
        <div class="text-center mb-6">
            <div class="badge badge-outline">
                {{ count($filteredFaqs) }} {{ __('results found') }}
            </div>
        </div>
        @endif

        {{-- FAQ Items --}}
        <div class="space-y-4">
            @foreach($filteredFaqs as $faq)
            <div class="collapse collapse-plus bg-base-200 shadow-sm">
                <input type="checkbox" id="faq-{{ $faq->id }}" />
                <label for="faq-{{ $faq->id }}" class="collapse-title text-lg font-medium flex items-start gap-3 cursor-pointer">
                    <div class="badge badge-primary badge-sm mt-1 flex-shrink-0">
                        {{ $faq->faqCategory->translate('name', $currentLang) ?: $faq->faqCategory->translate('name', 'hi') ?: 'General' }}
                    </div>
                    <span class="flex-1 text-primary">{{ $faq->translate('question', $currentLang) ?: $faq->translate('question', 'hi') ?: 'No question available' }}</span>
                </label>
                <div class="collapse-content">
                    <div class="pt-2">
                        <div class="prose prose-sm text-base-content max-w-none">
                            {!! $faq->translate('answer', $currentLang) ?: $faq->translate('answer', 'hi') ?: 'No answer available' !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- No Results Message --}}
        @if(count($filteredFaqs) === 0 && $faqs > 0)
        <div class="text-center py-12">
            <div class="text-6xl mb-4">🤔</div>
            <h3 class="text-xl font-semibold mb-2">{{ __('No matching questions found') }}</h3>
            <p class="text-base-content/70 mb-4">{{ __('Try adjusting your search or browse different categories') }}</p>
            <button class="btn btn-primary btn-sm" wire:click="clearFilters">
                {{ __('Clear Filters') }}
            </button>
        </div>
        @endif

        {{-- Empty State (no FAQs at all) --}}
        @if($faqs === 0)
        <div class="text-center py-12">
            <div class="text-6xl mb-4">📝</div>
            <h3 class="text-xl font-semibold mb-2">{{ __('No FAQs available') }}</h3>
            <p class="text-base-content/70 mb-4">{{ __('FAQs will appear here once they are added.') }}</p>
        </div>
        @endif

        {{-- Contact Section --}}
        <div class="mt-16 text-center">
            <div class="card bg-primary/5 border border-primary/20">
                <div class="card-body">
                    <h3 class="card-title justify-center text-primary">{{ __('Still have questions?') }}</h3>
                    <p class="text-base-content/70">{{ __("We're here to help you on your journey.") }}</p>
                    <div class="card-actions justify-center">
                        <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Contact Us') }}</a>
                        <a href="{{ route('home') }}" class="btn btn-outline">{{ __('Learn More') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>