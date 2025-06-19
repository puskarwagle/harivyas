{{-- faq.blade.php --}}

<div class="container mx-auto px-4 py-8 max-w-4xl" 
     x-data="faqData(@json($faqs), @json($categories))" 
     x-init="init()">

    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">
            Frequently Asked Questions
        </h1>
        <p class="text-lg text-base-content max-w-2xl mx-auto">
            Find answers to common questions about Nimbarka Sampradaya, ashram life, and spiritual practice
        </p>
    </div>

    <div class="mb-8">
        <div class="form-control max-w-md mx-auto">
            <div class="input-group flex">
                <input type="text" 
                       placeholder="Search FAQs..." 
                       class="input input-bordered w-full" 
                       x-model="searchQuery" 
                       @input.debounce.300ms="filterFAQs">
            </div>
        </div>
    </div>

    <div class="tabs tabs-boxed justify-center mb-8 flex-wrap">
        <template x-for="category in categories" :key="category.slug">
            <a class="tab" 
               :class="{ 'tab-active': activeCategory === category.slug }" 
               @click="filterByCategory(category.slug)" 
               x-text="category.name">
            </a>
        </template>
    </div>

    <div class="text-center mb-6" x-show="searchQuery.length > 0">
        <div class="badge badge-outline">
            <span x-text="filteredFAQs.length"></span> results found
        </div>
    </div>

    <div class="space-y-4">
        <template x-for="faq in filteredFAQs" :key="faq.id">
            <div class="collapse collapse-plus bg-base-200 shadow-sm">
                <input type="checkbox" :id="'faq-' + faq.id" />
                <div class="collapse-title text-lg font-medium flex items-start gap-3">
                    <div class="badge badge-primary badge-sm mt-1 flex-shrink-0" x-text="faq.category.name"></div>
                    <span class="flex-1 text-primary" x-text="faq.question"></span>
                </div>
                <div class="collapse-content">
                    <div class="pt-2">
                        <div class="prose prose-sm text-base-content max-w-none" x-html="faq.answer"></div>
                        <div class="mt-4 flex flex-wrap gap-2" x-show="faq.tags.length > 0">
                            <template x-for="tag in faq.tags" :key="tag.id">
                                <div class="badge badge-base-content badge-sm" x-text="tag.name"></div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <div class="text-center py-12" x-show="!filteredFAQs.length && faqs.length > 0">
        <div class="text-6xl mb-4">🤔</div>
        <h3 class="text-xl font-semibold mb-2">No matching questions found</h3>
        <p class="text-base-content/70 mb-4">Try adjusting your search or browse different categories</p>
        <button class="btn btn-primary btn-sm" @click="resetFilters">Clear Filters</button>
    </div>

    <div class="mt-16 text-center">
        <div class="card bg-primary/5 border border-primary/20">
            <div class="card-body">
                <h3 class="card-title justify-center text-primary">Still have questions?</h3>
                <p class="text-base-content/70">We're here to help you on your spiritual journey</p>
                <div class="card-actions justify-center">
                    <button class="btn btn-primary">Contact Us</button>
                    <button class="btn btn-outline">Visit Ashram</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function faqData(faqs, categories) {
        return {
            // --- DATA PROPERTIES ---
            // FIX: Added trailing commas and removed comma-first style. This fixes the SyntaxError.
            searchQuery: '',
            activeCategory: 'all',
            // FIX: The backend now provides the full category list, so we just use it directly.
            categories: categories || [], 
            faqs: faqs || [],
            filteredFAQs: [],

            // --- METHODS ---

            // FIX: init() is now called by x-init in the HTML to set the initial state.
            init() {
                this.filteredFAQs = this.faqs;
            },

            filterFAQs() {
                this.filteredFAQs = this.faqs.filter(faq => {
                    const matchesSearch = this.searchQuery === '' ||
                        faq.question.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        faq.answer.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        faq.tags.some(tag => tag.name.toLowerCase().includes(this.searchQuery.toLowerCase()));

                    const matchesCategory = this.activeCategory === 'all' ||
                        faq.category.slug === this.activeCategory;

                    return matchesSearch && matchesCategory;
                });
            },

            filterByCategory(slug) {
                this.activeCategory = slug;
                this.filterFAQs();
            },

            resetFilters() {
                this.searchQuery = '';
                this.activeCategory = 'all';
                this.filterFAQs(); // Re-run the filter to show all items
            }
        }
    }
</script>