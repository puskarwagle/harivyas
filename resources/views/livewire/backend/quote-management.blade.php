<div class="max-w-6xl mx-auto p-4 space-y-6">
    
    <!-- Form Section -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">
                @if($editingId) Edit Quote @else Add New Quote @endif
            </h2>
            
            <form wire:submit.prevent="save" class="space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Quote</span>
                    </label>
                    <textarea 
                        wire:model="quote" 
                        class="textarea textarea-bordered h-24 w-full @error('quote') textarea-error @enderror"
                        placeholder="Enter the quote here..."
                        rows="3"
                    ></textarea>
                    @error('quote')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Author</span>
                        </label>
                        <input 
                            wire:model="author" 
                            type="text" 
                            class="input input-bordered @error('author') input-error @enderror"
                            placeholder="Author name"
                        >
                        @error('author')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Display Date</span>
                        </label>
                        <input 
                            wire:model="display_date" 
                            type="date" 
                            class="input input-bordered @error('display_date') input-error @enderror"
                        >
                        @error('display_date')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                </div>

                <div class="form-control">
                    <label class="label cursor-pointer justify-start gap-2">
                        <input 
                            wire:model="is_active" 
                            type="checkbox" 
                            class="checkbox checkbox-primary"
                        >
                        <span class="label-text font-semibold">Active</span>
                    </label>
                </div>

                <div class="card-actions justify-end gap-2">
                    @if($editingId)
                        <button wire:click="cancel" type="button" class="btn btn-ghost">
                            Cancel
                        </button>
                    @endif
                    <button type="submit" class="btn btn-primary">
                        @if($editingId) Update Quote @else Add Quote @endif
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table Section -->
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">All Quotes</h2>
            
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Quote</th>
                            <th>Author</th>
                            <th>Display Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($quotes as $quote)
                            <tr>
                                <td class="max-w-md">
                                    <div class="text-sm leading-relaxed">
                                        "{{ Str::limit($quote->quote, 100) }}"
                                    </div>
                                </td>
                                <td class="font-medium">{{ $quote->author }}</td>
                                <td class="text-sm">{{ $quote->display_date->format('M d, Y') }}</td>
                                <td>
                                    <div class="badge {{ $quote->is_active ? 'badge-success' : 'badge-error' }}">
                                        {{ $quote->is_active ? 'Active' : 'Inactive' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <button 
                                            wire:click="edit({{ $quote->id }})" 
                                            class="btn btn-sm btn-ghost"
                                            title="Edit"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        
                                        <button 
                                            wire:click="toggleActive({{ $quote->id }})" 
                                            class="btn btn-sm btn-ghost {{ $quote->is_active ? 'text-warning' : 'text-success' }}"
                                            title="{{ $quote->is_active ? 'Deactivate' : 'Activate' }}"
                                        >
                                            @if($quote->is_active)
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L8.465 8.465M9.878 9.878L3 16.757M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            @endif
                                        </button>
                                        
                                        <button 
                                            wire:click="delete({{ $quote->id }})" 
                                            class="btn btn-sm btn-ghost text-error"
                                            title="Delete"
                                            onclick="return confirm('Delete this quote?')"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-8 text-base-content/60">
                                    No quotes found. Add your first quote above.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $quotes->links() }}
            </div>
        </div>
    </div>
</div>