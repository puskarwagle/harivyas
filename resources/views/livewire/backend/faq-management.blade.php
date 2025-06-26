<div class="min-h-screen bg-base-100 p-4">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold text-base-content">FAQ Management</h1>
                <p class="text-base-content/70 mt-1">Manage questions and categories</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2">
                <!-- Locale Switcher -->
                <div class="join">
                    <button wire:click="switchLocale('en')" class="btn btn-xs join-item {{ $currentLocale === 'en' ? 'btn-active' : '' }}">EN</button>
                    <button wire:click="switchLocale('hi')" class="btn btn-xs join-item {{ $currentLocale === 'hi' ? 'btn-active' : '' }}">हि</button>
                </div>
                <button wire:click="createCategory" class="btn btn-outline btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Category
                </button>
                <button wire:click="createFaq" class="btn btn-primary btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add FAQ
                </button>
            </div>
        </div>

        <!-- Alerts -->
        @if (session()->has('message'))
        <div class="alert alert-success mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('message') }}
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-error mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            {{ session('error') }}
        </div>
        @endif

        <!-- Filters -->
        <div class="card bg-base-200 shadow-sm mb-6">
            <div class="card-body p-4">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="form-control flex-1">
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search FAQs..." class="input input-bordered input-sm w-full">
                    </div>
                    <div class="form-control sm:w-48">
                        <select wire:model.live="filterCategory" class="select select-bordered select-sm">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->translate('name', $currentLocale) ?: $category->translate('name', 'en') ?: 'Unnamed' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="card bg-base-200 shadow-sm mb-6">
            <div class="card-body p-4">
                <h2 class="card-title text-lg mb-3">Categories</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach($categories as $category)
                    <div class="badge badge-lg gap-2 {{ $category->id === 1 ? 'badge-primary' : 'badge-secondary' }}">
                        {{ $category->translate('name', $currentLocale) ?: $category->translate('name', 'en') ?: 'Unnamed' }}
                        @if($category->id !== 1)
                        <button wire:click="editCategory({{ $category->id }})" class="hover:text-warning">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                            </svg>
                        </button>
                        <button wire:click="deleteCategory({{ $category->id }})" class="hover:text-error">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- FAQs Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
            @forelse($faqs as $faq)
            <div class="card bg-base-100 shadow-sm border">
                <div class="card-body p-4">
                    <div class="flex justify-between items-start gap-3 mb-2">
                        <div class="badge badge-sm {{ $faq->faqCategory->id === 1 ? 'badge-primary' : 'badge-secondary' }}">
                            {{ $faq->faqCategory->translate('name', $currentLocale) ?: $faq->faqCategory->translate('name', 'en') ?: 'Unnamed' }}
                        </div>
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-xs">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                            </div>
                            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-32 p-2 shadow border">
                                <li><button wire:click="editFaq({{ $faq->id }})" class="text-sm">Edit</button></li>
                                <li><button wire:click="deleteFaq({{ $faq->id }})" class="text-sm text-error">Delete</button></li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="font-semibold text-base-content mb-2 line-clamp-2">{{ $faq->translate('question', $currentLocale) ?: $faq->translate('question', 'en') ?: 'No question' }}</h3>
                    <p class="text-base-content/70 text-sm line-clamp-3">{{ $faq->translate('answer', $currentLocale) ?: $faq->translate('answer', 'en') ?: 'No answer' }}</p>
                    <div class="text-xs text-base-content/50 mt-2">
                        {{ $faq->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <div class="text-base-content/50 text-lg">No FAQs found</div>
                <button wire:click="createFaq" class="btn btn-primary btn-sm mt-4">Create First FAQ</button>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        {{ $faqs->links() }}

        <!-- FAQ Modal -->
        @if($showModal)
        <div class="modal modal-open">
            <div class="modal-box max-w-2xl">
                <h3 class="font-bold text-lg mb-4">
                    {{ $editingFaq ? 'Edit FAQ' : 'Create FAQ' }}
                </h3>
                <div class="space-y-4">
                    <div class="form-control">
                        <label class="label"><span class="label-text">Category</span></label>
                        <select wire:model="faq_category_id" class="select select-bordered">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->translate('name', $currentLocale) ?: $category->translate('name', 'en') ?: 'Unnamed' }}</option>
                            @endforeach
                        </select>
                        @error('faq_category_id') <span class="text-error text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <!-- English Fields -->
                    <div class="divider">English</div>
                    <div class="form-control">
                        <label class="label"><span class="label-text">Question (English)</span></label>
                        <input wire:model="question.en" type="text" class="input input-bordered" placeholder="Enter question in English">
                        @error('question.en') <span class="text-error text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text">Answer (English)</span></label>
                        <textarea wire:model="answer.en" class="textarea textarea-bordered h-32" placeholder="Enter answer in English"></textarea>
                        @error('answer.en') <span class="text-error text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <!-- Hindi Fields -->
                    <div class="divider">हिंदी</div>
                    <div class="form-control">
                        <label class="label"><span class="label-text">प्रश्न (हिंदी)</span></label>
                        <input wire:model="question.hi" type="text" class="input input-bordered" placeholder="हिंदी में प्रश्न दर्ज करें">
                        @error('question.hi') <span class="text-error text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text">उत्तर (हिंदी)</span></label>
                        <textarea wire:model="answer.hi" class="textarea textarea-bordered h-32" placeholder="हिंदी में उत्तर दर्ज करें"></textarea>
                        @error('answer.hi') <span class="text-error text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-action">
                    <button wire:click="closeModal" class="btn btn-ghost">Cancel</button>
                    <button wire:click="saveFaq" class="btn btn-primary">
                        {{ $editingFaq ? 'Update' : 'Create' }}
                    </button>
                </div>
            </div>
        </div>
        @endif

        <!-- Category Modal -->
        @if($showCategoryModal)
        <div class="modal modal-open">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-4">
                    {{ $editingCategory ? 'Edit Category' : 'Create Category' }}
                </h3>
                <div class="space-y-4">
                    <div class="form-control">
                        <label class="label"><span class="label-text">Category Name (English)</span></label>
                        <input wire:model="categoryName.en" type="text" class="input input-bordered" placeholder="Enter category name in English">
                        @error('categoryName.en') <span class="text-error text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text">श्रेणी का नाम (हिंदी)</span></label>
                        <input wire:model="categoryName.hi" type="text" class="input input-bordered" placeholder="हिंदी में श्रेणी का नाम दर्ज करें">
                        @error('categoryName.hi') <span class="text-error text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-action">
                    <button wire:click="closeCategoryModal" class="btn btn-ghost">Cancel</button>
                    <button wire:click="saveCategory" class="btn btn-primary">
                        {{ $editingCategory ? 'Update' : 'Create' }}
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>