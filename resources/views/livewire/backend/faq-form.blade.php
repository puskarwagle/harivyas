<div class="max-w-4xl mx-auto p-6 space-y-8">
    <!-- Livewire Test -->
    <div class="alert alert-info">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>{{ $livewireTest }}</span>
    </div>

    <!-- Success/Error Messages -->
    @if($successMessage)
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ $successMessage }}</span>
        </div>
    @endif

    @if($errorMessage)
        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ $errorMessage }}</span>
        </div>
    @endif

    <!-- Add New Locale Form -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Add New Language</h2>
            <form wire:submit.prevent="addLocale" class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Locale Code (e.g., en, hi, fr)</span>
                    </label>
                    <input type="text" wire:model="newLocale" class="input input-bordered" placeholder="en" />
                    @error('newLocale') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="card-actions">
                    <button type="submit" class="btn btn-primary">Add Locale</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Create Category Form -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Create Category</h2>
            <form wire:submit.prevent="createCategory" class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Category Name</span>
                    </label>
                    <input type="text" wire:model.live="categoryName" class="input input-bordered" placeholder="General Questions" />
                    @error('categoryName') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Slug (auto-generated)</span>
                    </label>
                    <input type="text" wire:model="categorySlug" class="input input-bordered" readonly />
                    @error('categorySlug') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Language</span>
                    </label>
                    <select wire:model="categoryLocale" class="select select-bordered">
                        <option value="">Select Language</option>
                        @foreach($locales as $locale)
                            <option value="{{ $locale }}">{{ $locale }}</option>
                        @endforeach
                    </select>
                    @error('categoryLocale') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="card-actions">
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Create Tag Form -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Create Tag</h2>
            <form wire:submit.prevent="createTag" class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tag Name</span>
                    </label>
                    <input type="text" wire:model.live="tagName" class="input input-bordered" placeholder="Important" />
                    @error('tagName') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Slug (auto-generated)</span>
                    </label>
                    <input type="text" wire:model="tagSlug" class="input input-bordered" readonly />
                    @error('tagSlug') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Language</span>
                    </label>
                    <select wire:model="tagLocale" class="select select-bordered">
                        <option value="">Select Language</option>
                        @foreach($locales as $locale)
                            <option value="{{ $locale }}">{{ $locale }}</option>
                        @endforeach
                    </select>
                    @error('tagLocale') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="card-actions">
                    <button type="submit" class="btn btn-primary">Create Tag</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Create FAQ Form -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Create FAQ</h2>
            <form wire:submit.prevent="createFaq" class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Question</span>
                    </label>
                    <input type="text" wire:model="question" class="input input-bordered" placeholder="What is your question?" />
                    @error('question') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Answer</span>
                    </label>
                    <textarea wire:model="answer" class="textarea textarea-bordered h-32" placeholder="Your detailed answer here..."></textarea>
                    @error('answer') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Language</span>
                    </label>
                    <select wire:model="faqLocale" class="select select-bordered">
                        <option value="">Select Language</option>
                        @foreach($locales as $locale)
                            <option value="{{ $locale }}">{{ $locale }}</option>
                        @endforeach
                    </select>
                    @error('faqLocale') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Category</span>
                    </label>
                    <select wire:model="selectedCategoryId" class="select select-bordered">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->translations->first()?->content ?? $category->slug }}
                            </option>
                        @endforeach
                    </select>
                    @error('selectedCategoryId') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tags (optional)</span>
                    </label>
                    <div class="space-y-2 max-h-40 overflow-y-auto">
                        @foreach($tags as $tag)
                            <label class="cursor-pointer label justify-start">
                                <input type="checkbox" wire:model="selectedTagIds" value="{{ $tag->id }}" class="checkbox checkbox-sm mr-2" />
                                <span class="label-text">{{ $tag->translations->first()?->content ?? $tag->slug }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                
                <div class="form-control">
                    <label class="cursor-pointer label justify-start">
                        <input type="checkbox" wire:model="isActive" class="checkbox checkbox-sm mr-2" />
                        <span class="label-text">Active</span>
                    </label>
                </div>
                
                <div class="card-actions">
                    <button type="submit" class="btn btn-primary">Create FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>