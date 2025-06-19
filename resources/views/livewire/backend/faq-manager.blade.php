<div class="p-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-base-content">FAQ Manager</h1>
        </div>
        <button class="btn btn-primary" wire:click="openCreateModal">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            New FAQ
        </button>
    </div>

    {{-- Flash Messages --}}
    @if (session()->has('success'))
        <div class="alert alert-success mb-4">
            <svg class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Filters --}}
    <div class="card bg-base-100 shadow-sm border mb-6">
        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                {{-- Search --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Search</span>
                    </label>
                    <input type="text" 
                           placeholder="Search questions or answers..." 
                           class="input input-bordered"
                           wire:model.live.debounce.300ms="search">
                </div>

                {{-- Category Filter --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Category</span>
                    </label>
                    <select class="select select-bordered" wire:model.live="categoryFilter">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option class="text-accent" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Status Filter --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Status</span>
                    </label>
                    <select class="select select-bordered" wire:model.live="statusFilter">
                        <option value="">All Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                {{-- Reset Filters --}}
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">&nbsp;</span>
                    </label>
                    <button class="btn btn-outline" wire:click="resetFilters">
                        Reset Filters
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- FAQ Table --}}
    <div class="card bg-base-100 shadow-sm border">
        <div class="card-body p-0">
            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                            <th>
                                <button class="btn btn-ghost btn-xs" wire:click="sortBy('question')">
                                    Question
                                    @if($sortBy === 'question')
                                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                    @endif
                                </button>
                            </th>
                            <th>
                                <button class="btn btn-ghost btn-xs" wire:click="sortBy('category_id')">
                                    Category
                                    @if($sortBy === 'category_id')
                                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                    @endif
                                </button>
                            </th>
                            <th>Tags</th>
                            <th>
                                <button class="btn btn-ghost btn-xs" wire:click="sortBy('is_active')">
                                    Status
                                    @if($sortBy === 'is_active')
                                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                    @endif
                                </button>
                            </th>
                            <th>
                                <button class="btn btn-ghost btn-xs" wire:click="sortBy('created_at')">
                                    Created
                                    @if($sortBy === 'created_at')
                                        @if($sortDirection === 'asc') ↑ @else ↓ @endif
                                    @endif
                                </button>
                            </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($faqs as $faq)
                            <tr>
                                <td>
                                    <div class="max-w-xs">
                                        <div class="font-medium truncate">{{ $faq->question }}</div>
                                        <div class="text-sm text-base-content/70 truncate">
                                            {{ Str::limit(strip_tags($faq->answer), 60) }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-outline">
                                        {{ $faq->category->name ?? 'No Category' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($faq->tags->take(3) as $tag)
                                            <div class="badge badge-sm">{{ $tag->name }}</div>
                                        @endforeach
                                        @if($faq->tags->count() > 3)
                                            <div class="badge badge-sm badge-ghost">+{{ $faq->tags->count() - 3 }}</div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-xs {{ $faq->is_active ? 'btn-success' : 'btn-error' }}"
                                            wire:click="toggleStatus({{ $faq->id }})">
                                        {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </td>
                                <td>
                                    <div class="text-sm text-base-content/70">
                                        {{ $faq->created_at->format('M d, Y') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <button class="btn btn-sm btn-ghost" 
                                                wire:click="openEditModal({{ $faq->id }})">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-ghost text-error" 
                                                wire:click="openDeleteModal({{ $faq->id }})">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8">
                                    <div class="text-base-content/50">
                                        No FAQs found. Create your first FAQ to get started.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $faqs->links() }}
    </div>

    {{-- Create/Edit Modal --}}
    @if($showCreateModal || $showEditModal)
        <div class="modal modal-open">
            <div class="modal-box max-w-2xl">
                <h3 class="font-bold text-lg mb-4">
                    {{ $showCreateModal ? 'Create New FAQ' : 'Edit FAQ' }}
                </h3>
                
                <form wire:submit.prevent="{{ $showCreateModal ? 'create' : 'update' }}">
                    {{-- Question --}}
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">Question <span class="text-error">*</span></span>
                        </label>
                        <input type="text" 
                               class="input input-bordered @error('question') input-error @enderror" 
                               wire:model="question"
                               placeholder="Enter the question...">
                        @error('question')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    {{-- Answer --}}
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">Answer <span class="text-error">*</span></span>
                        </label>
                        <textarea class="textarea textarea-bordered h-32 @error('answer') textarea-error @enderror" 
                                  wire:model="answer"
                                  placeholder="Enter the answer..."></textarea>
                        @error('answer')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">Category <span class="text-error">*</span></span>
                        </label>
                        <select class="select select-bordered @error('category_id') select-error @enderror" 
                                wire:model="category_id">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    {{-- Tags --}}
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">Tags</span>
                        </label>
                        <div class="grid grid-cols-2 gap-2 max-h-32 overflow-y-auto p-2 border rounded">
                            @foreach($availableTags as $tag)
                                <label class="label cursor-pointer justify-start">
                                    <input type="checkbox" 
                                           class="checkbox checkbox-sm" 
                                           value="{{ $tag->id }}"
                                           wire:model="tags">
                                    <span class="label-text ml-2">{{ $tag->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Status and Sort Order --}}
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Active</span>
                                <input type="checkbox" 
                                       class="toggle toggle-primary" 
                                       wire:model="is_active">
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Sort Order</span>
                            </label>
                            <input type="number" 
                                   class="input input-bordered input-sm" 
                                   wire:model="sort_order"
                                   min="0">
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="modal-action">
                        <button type="button" class="btn btn-ghost" wire:click="closeModals">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $showCreateModal ? 'Create FAQ' : 'Update FAQ' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Delete Modal --}}
    @if($showDeleteModal)
        <div class="modal modal-open">
            <div class="modal-box">
                <h3 class="font-bold text-lg text-error mb-4">Delete FAQ</h3>
                <p class="mb-6">
                    Are you sure you want to delete this FAQ? This action cannot be undone.
                </p>
                <div class="bg-base-200 p-4 rounded mb-4">
                    <div class="font-medium">{{ $selectedFaq->question }}</div>
                </div>
                <div class="modal-action">
                    <button class="btn btn-ghost" wire:click="closeModals">Cancel</button>
                    <button class="btn btn-error" wire:click="delete">Delete FAQ</button>
                </div>
            </div>
        </div>
    @endif
</div>