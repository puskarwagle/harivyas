<div class="min-h-screen bg-base-100 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 mb-8">
            <div>
                <h1 class="text-4xl font-bold text-base-content" data-trans="quotesBackend.title">Quote Management</h1>
                <p class="text-base-content/70 mt-2 text-lg" data-trans="quotesBackend.subtitle">Manage daily quotes</p>
            </div>
            <div class="join">
                @foreach($availableLanguages as $locale)
                    <button wire:click="switchLocale('{{ $locale }}')" 
                            class="btn btn-sm join-item {{ $currentLocale === $locale ? 'btn-active' : '' }} text-base">
                        {{ $this->getLanguageDisplayName($locale) }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Alerts -->
        @if (session()->has('message'))
        <div class="alert alert-success mb-6 text-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('message') }}
        </div>
        @endif

        <!-- Quote Form -->
        <div class="card bg-base-100 shadow-xl mb-8 border-2 border-base-300">
            <div class="card-body p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-primary" data-trans="{{ $editingQuote ? 'quotesBackend.edit_quote' : 'quotesBackend.add_new_quote' }}">
                        {{ $editingQuote ? 'Edit Quote' : 'Add New Quote' }}
                    </h2>
                    @if($editingQuote)
                        <button wire:click="$set('editingQuote', null)" class="btn btn-outline btn-sm text-base" data-trans="quotesBackend.cancel_edit">
                            Cancel Edit
                        </button>
                    @endif
                </div>

                <form wire:submit.prevent="saveQuote" class="space-y-6">
                    @if($editingQuote)
                        <!-- Language Management (Only in Edit Mode) -->
                        <div class="bg-base-200 p-6 rounded-lg">
                            <div class="flex flex-wrap gap-3 mb-4">
                                <span class="text-lg font-medium" data-trans="quotesBackend.languages">Languages:</span>
                                @foreach($activeFormLanguages as $locale)
                                    <div class="badge badge-primary badge-lg gap-2 text-base py-3">
                                        {{ $this->getLanguageDisplayName($locale) }}
                                        @if($locale !== 'hi')
                                            <button type="button" wire:click="removeLanguageFromForm('{{ $locale }}')" class="btn btn-ghost btn-xs">×</button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            
                            @if(count($availableLanguages) > count($activeFormLanguages))
                                <div class="dropdown">
                                    <label tabindex="0" class="btn btn-outline text-base" data-trans="quotesBackend.add_language">Add Language</label>
                                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                        @foreach($availableLanguages as $locale)
                                            @if(!in_array($locale, $activeFormLanguages))
                                                <li><a wire:click="addLanguageToForm('{{ $locale }}')" class="text-base py-2">{{ $this->getLanguageDisplayName($locale) }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Quote Fields -->
                    @if($editingQuote)
                        <div class="grid gap-6">
                            @foreach($activeFormLanguages as $locale)
                                <div class="bg-base-50 border-2 border-base-300 rounded-xl p-6">
                                    <h3 class="text-xl font-semibold text-primary mb-4">{{ $this->getLanguageDisplayName($locale) }}</h3>
                                    
                                    <div class="grid gap-4">
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text text-lg font-medium" data-trans="quotesBackend.quote">Quote</span>
                                                @if($locale === 'hi')<span class="text-error text-lg">*</span>@endif
                                            </label>
                                            <textarea wire:model="quote.{{ $locale }}" 
                                                      class="textarea textarea-bordered h-32 text-lg w-full @error('quote.'.$locale) textarea-error @enderror" 
                                                      placeholder="Enter quote in {{ $this->getLanguageDisplayName($locale) }}..."></textarea>
                                            @error('quote.'.$locale)
                                                <label class="label"><span class="label-text-alt text-error text-base">{{ $message }}</span></label>
                                            @enderror
                                        </div>

                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text text-lg font-medium" data-trans="quotesBackend.author">Author</span>
                                                @if($locale === 'hi')<span class="text-error text-lg">*</span>@endif
                                            </label>
                                            <input wire:model="author.{{ $locale }}" 
                                                   type="text" 
                                                   class="input input-bordered input-lg text-lg w-full @error('author.'.$locale) input-error @enderror" 
                                                   placeholder="Author name in {{ $this->getLanguageDisplayName($locale) }}">
                                            @error('author.'.$locale)
                                                <label class="label"><span class="label-text-alt text-error text-base">{{ $message }}</span></label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Hindi-only form for creation -->
                        <div class="bg-base-50 border-2 border-base-300 rounded-xl p-6">
                            <h3 class="text-xl font-semibold text-primary mb-4">हिंदी (Hindi)</h3>
                            
                            <div class="grid gap-4">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-lg font-medium" data-trans="quotesBackend.quote">Quote</span>
                                        <span class="text-error text-lg">*</span>
                                    </label>
                                    <textarea wire:model="quote.hi" 
                                              class="textarea textarea-bordered textarea-lg h-32 text-lg w-full @error('quote.hi') textarea-error @enderror" 
                                              data-trans="quotesBackend.hindi_form_quote" 
                                              placeholder="Enter quote in Hindi..."></textarea>
                                    @error('quote.hi')
                                        <label class="label"><span class="label-text-alt text-error text-base">{{ $message }}</span></label>
                                    @enderror
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-lg font-medium" data-trans="quotesBackend.author">Author</span>
                                        <span class="text-error text-lg">*</span>
                                    </label>
                                    <input wire:model="author.hi" 
                                           type="text" 
                                           class="input input-bordered input-lg text-lg w-full @error('author.hi') input-error @enderror" 
                                           data-trans="quotesBackend.hindi_form_author" 
                                           placeholder="Author name in Hindi">
                                    @error('author.hi')
                                        <label class="label"><span class="label-text-alt text-error text-base">{{ $message }}</span></label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Display Date -->
                    <div class="form-control max-w-md flex flex-col">
                        <label class="label">
                            <span class="label-text text-lg font-medium" data-trans="quotesBackend.display_date">Display Date</span>
                            <span class="text-error text-lg">*</span>
                        </label>
                        <input wire:model="display_date" type="date" class="input input-bordered input-lg text-lg @error('display_date') input-error @enderror">
                        @error('display_date')
                            <label class="label"><span class="label-text-alt text-error text-base">{{ $message }}</span></label>
                        @enderror
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="btn btn-primary btn-lg text-lg px-8" data-trans="{{ $editingQuote ? 'quotesBackend.update_quote' : 'quotesBackend.create_quote' }}">
                            {{ $editingQuote ? 'Update Quote' : 'Create Quote' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Search -->
        <div class="card bg-base-100 shadow-xl mb-8">
            <div class="card-body p-6">
                <div class="form-control">
                    <input wire:model.live="search" type="text" 
                           data-trans="quotesBackend.search_quotes" 
                           placeholder="Search quotes..." 
                           class="input input-bordered input-lg text-lg w-full">
                </div>
            </div>
        </div>

        <!-- Quotes Table -->
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body p-6">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr class="text-lg">
                                <th class="text-lg font-bold py-4" data-trans="quotesBackend.quote">Quote</th>
                                <th class="text-lg font-bold py-4" data-trans="quotesBackend.author">Author</th>
                                <th class="text-lg font-bold py-4" data-trans="quotesBackend.display_date">Display Date</th>
                                <th class="text-lg font-bold py-4" data-trans="quotesBackend.actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($quotes as $quote)
                            <tr wire:click="editQuote({{ $quote->id }})" class="cursor-pointer hover:bg-base-200 transition-colors">
                                <td class="max-w-md py-4">
                                    <div class="text-base leading-relaxed">
                                        "{{ Str::limit($quote->translate('quote', $currentLocale) ?? $quote->translate('quote', 'hi') ?? 'No translation', 100) }}"
                                    </div>
                                </td>
                                <td class="font-medium text-base py-4">
                                    {{ $quote->translate('author', $currentLocale) ?? $quote->translate('author', 'hi') ?? 'No translation' }}
                                </td>
                                <td class="text-base py-4">{{ $quote->display_date->format('M d, Y') }}</td>
                                <td class="py-4">
                                    <button wire:click.stop="deleteQuote({{ $quote->id }})" 
                                            class="btn btn-error btn-sm text-base" 
                                            title="Delete" 
                                            onclick="return confirm('Delete this quote?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span data-trans="quotesBackend.delete">Delete</span>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-12 text-base-content/60 text-lg" data-trans="quotesBackend.no_quotes">
                                    No quotes found. Add your first quote above.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $quotes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>