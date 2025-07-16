<div class="container mx-auto p-6">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="flex justify-between items-center mb-6">
                <h2 class="card-title text-2xl" data-trans="nibandhaBackend.management">निबंध प्रबंधन</h2>

                <div class="flex gap-2">
                    <!-- Content Language Switcher (unlimited languages) -->
                    <div class="tooltip tooltip-bottom" data-tip="Essay Content Language">
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-primary btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                </svg>
                                {{ strtoupper($currentLocale) }}
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40 max-h-60 overflow-y-auto">
                                @forelse($availableLocales as $locale)
                                    <li>
                                        <a wire:click="switchContentLanguage('{{ $locale }}')"
                                            class="{{ $currentLocale === $locale ? 'active' : '' }}">
                                            {{ strtoupper($locale) }}
                                        </a>
                                    </li>
                                @empty
                                    <li><a
                                            wire:click="switchContentLanguage('{{ $currentLocale }}')">{{ strtoupper($currentLocale) }}</a>
                                    </li>
                                @endforelse
                                <!-- Add new language option -->
                                <li class="border-t mt-2 pt-2">
                                    <a wire:click="$set('showAddLanguage', true)" class="text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span data-trans="nibandhaBackend.add_language">Add Language</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            @endif

            <!-- Form Section -->
            <form wire:submit.prevent="save" class="mb-8">
                <div class="grid grid-cols-1 gap-6">
                    <div class="form-control">
                        <label class="label" for="title">
                            <span class="label-text" data-trans="nibandhaBackend.title">शीर्षक</span>
                        </label>
                        <input type="text" id="title" wire:model="title" class="input input-bordered w-full"
                            placeholder="निबंध का शीर्षक दर्ज करें"
                            data-trans-placeholder="nibandhaBackend.title_placeholder">
                        @error('title')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Collapsible Description -->
                    <div class="collapse collapse-arrow bg-base-200">
                        <input type="checkbox" class="peer" />
                        <div class="collapse-title text-sm font-medium" data-trans="nibandhaBackend.description">
                            विवरण (वैकल्पिक)
                        </div>
                        <div class="collapse-content">
                            <div class="form-control">
                                <textarea id="description" wire:model="description" rows="3"
                                    class="textarea textarea-bordered w-full" placeholder="निबंध का संक्षिप्त विवरण"
                                    data-trans-placeholder="nibandhaBackend.description_placeholder"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label" for="essay">
                            <span class="label-text" data-trans="nibandhaBackend.content">निबंध</span>
                        </label>
                        <textarea id="essay" wire:model="essay" rows="10" class="textarea textarea-bordered w-full"
                            placeholder="यहाँ अपना निबंध लिखें"
                            data-trans-placeholder="nibandhaBackend.content_placeholder"></textarea>
                        @error('essay')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    @if($isEditing && !empty($availableTranslations))
                        <div class="alert alert-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="stroke-current shrink-0 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <div class="font-bold" data-trans="nibandhaBackend.available_translations">उपलब्ध अनुवाद:
                                </div>
                                <div class="text-sm">
                                    @foreach(['title', 'description', 'essay'] as $field)
                                        @if(isset($availableTranslations[$field]) && count($availableTranslations[$field]) > 0)
                                            <span class="badge badge-outline mr-2">
                                                <span
                                                    data-trans="nibandhaBackend.{{ $field === 'essay' ? 'content' : $field }}">{{ ucfirst($field) }}</span>:
                                                {{ implode(', ', array_map(fn($l) => strtoupper($l), $availableTranslations[$field])) }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="flex gap-4">
                        <button type="submit" class="btn btn-primary">
                            <span
                                data-trans="{{ $isEditing ? 'nibandhaBackend.update_button' : 'nibandhaBackend.create_button' }}">
                                {{ $isEditing ? 'निबंध अपडेट करें' : 'निबंध बनाएं' }}
                            </span>
                        </button>

                        @if($isEditing)
                            <button type="button" wire:click="cancel" class="btn btn-neutral">
                                <span data-trans="nibandhaBackend.cancel_button">रद्द करें</span>
                            </button>
                        @endif
                    </div>
                </div>
            </form>

            <!-- Table Section -->
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th data-trans="nibandhaBackend.title">शीर्षक</th>
                            <th data-trans="nibandhaBackend.author">लेखक</th>
                            <th data-trans="nibandhaBackend.created">बनाया गया</th>
                            <th data-trans="nibandhaBackend.actions">कार्य</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nibandhas as $nibandha)
                            <tr class="hover cursor-pointer" wire:click="edit({{ $nibandha->id }})">
                                <td>
                                    <div class="font-bold">
                                        {{ $nibandha->translate('title', $currentLocale) ?? 'शीर्षकहीन' }}
                                    </div>
                                    <div class="text-sm opacity-50">
                                        {{ Str::limit($nibandha->translate('description', $currentLocale) ?? '', 50) }}
                                    </div>
                                    @if($nibandha->getAllTranslations())
                                        <div class="flex gap-1 mt-1">
                                            @php
                                                $allTranslations = $nibandha->getAllTranslations();
                                                $availableLocales = [];
                                                foreach (['title', 'description', 'essay'] as $field) {
                                                    if (isset($allTranslations[$field])) {
                                                        $availableLocales = array_merge($availableLocales, array_keys($allTranslations[$field]));
                                                    }
                                                }
                                                $availableLocales = array_unique($availableLocales);
                                            @endphp
                                            @foreach($availableLocales as $locale)
                                                <span
                                                    class="badge badge-xs {{ $locale === $currentLocale ? 'badge-primary' : 'badge-outline' }}">
                                                    {{ strtoupper($locale) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $nibandha->user->name }}</td>
                                <td>{{ $nibandha->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="flex gap-2">
                                        <button wire:click.stop="edit({{ $nibandha->id }})"
                                            class="btn btn-ghost btn-xs text-primary">
                                            <span data-trans="nibandhaBackend.edit_button">संपादित करें</span>
                                        </button>
                                        <button wire:click.stop="delete({{ $nibandha->id }})"
                                            onclick="return confirm('क्या आप वाकई इस निबंध को हटाना चाहते हैं?')"
                                            class="btn btn-ghost btn-xs text-error">
                                            <span data-trans="nibandhaBackend.delete_button">हटाएं</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-8">
                                                <div class="text-base-content/60" data-trans="nibandhaBackend.no_essays"></div>
                                                कोई निबंध नहीं मिला। ऊपर अपना पहला निबंध बनाएं।
                            </div>
                            </td>
                            </tr>
                        @endforelse
            </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $nibandhas->links() }}
        </div>
    </div>
</div>

<!-- Add Language Modal -->
@if($showAddLanguage)
    <div class="modal modal-open">
        <div class="modal-box">
            <h3 class="font-bold text-lg" data-trans="essay.add_new_language">Add New Language</h3>
            <form wire:submit.prevent="addNewLanguage" class="py-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text" data-trans="essay.language_code">Language Code (e.g., fr, de, ja,
                            zh)</span>
                    </label>
                    <input type="text" wire:model="newLanguageCode" class="input input-bordered w-full"
                        placeholder="Enter language code..." data-trans-placeholder="essay.language_code_placeholder">
                    @error('newLanguageCode')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $errors->first('title') }}</span>
                        </label>
                    @enderror
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary" data-trans="essay.add_language">Add Language</button>
                    <button type="button" wire:click="$set('showAddLanguage', false)" class="btn"
                        data-trans="essay.cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endif
</div>