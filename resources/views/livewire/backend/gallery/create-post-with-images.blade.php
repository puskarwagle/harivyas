{{-- <div class="min-h-screen bg-base-200 p-4"> --}}
    <div class="max-w-md mx-auto bg-base-100 rounded-2xl shadow-xl overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-secondary p-6 text-primary-content">
            <h1 class="text-xl font-bold">Create Post</h1>
        </div>

        <div class="p-6">
            @if (session()->has('message'))
                <div class="alert alert-success mb-4 rounded-xl">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="submitPostWithImages" x-data="{
                tags: @entangle('tags'),
                newTag: '',
                dragActive: false,
                addTag() {
                    if (this.newTag.trim() && !this.tags.includes(this.newTag.trim())) {
                        this.tags.push(this.newTag.trim());
                        this.newTag = '';
                    }
                },
                removeTag(index) {
                    this.tags.splice(index, 1);
                },
                handleDrop(e) {
                    e.preventDefault();
                    this.dragActive = false;
                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        // Trigger Livewire file upload
                        $wire.uploadMultiple('images', files);
                    }
                },
                handleDragOver(e) {
                    e.preventDefault();
                    this.dragActive = true;
                },
                handleDragLeave() {
                    this.dragActive = false;
                }
            }">
                <!-- Title -->
                <div class="form-control mb-6">
                    <input 
                        type="text" 
                        wire:model.defer="title" 
                        placeholder="Caption" 
                        class="input input-bordered input-lg w-full rounded-xl" 
                        required 
                    />
                    @error('title') <span class="text-error text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Upload Zone - Big and Inviting -->
                <div class="mb-6">
                    <div 
                        class="border-2 border-dashed rounded-2xl p-8 text-center transition-all duration-300 cursor-pointer hover:border-primary hover:bg-primary/5"
                        :class="dragActive ? 'border-primary bg-primary/10' : 'border-base-300'"
                        @drop="handleDrop"
                        @dragover="handleDragOver"
                        @dragleave="handleDragLeave"
                        @click="$refs.fileInput.click()"
                    >
                        <div class="mb-4">
                            <svg class="w-16 h-16 mx-auto text-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Drop files here</h3>
                        <p class="text-base-content/60 mb-2">or click to browse</p>
                        <p class="text-sm text-base-content/40">Images & videos supported</p>
                        
                        <input 
                            type="file" 
                            wire:model="images" 
                            multiple 
                            accept="image/*,video/*"
                            class="hidden" 
                            x-ref="fileInput"
                        />
                    </div>
                    @error('images') <span class="text-error text-sm mt-1">{{ $message }}</span> @enderror
                    @error('images.*') <span class="text-error text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Image Previews -->
                @if ($images)
                    <div class="grid grid-cols-2 gap-3 mb-6">
                        @foreach (is_array($images) ? $images : [$images] as $tempImage)
                            <div class="relative rounded-xl overflow-hidden bg-base-200">
                                @php
                                    $isVideo = in_array(strtolower($tempImage->getClientOriginalExtension()), ['mp4','mov','avi','webm']);
                                @endphp
                                @if ($isVideo)
                                    <video controls class="w-full h-24 object-cover">
                                        <source src="{{ $tempImage->temporaryUrl() }}" type="video/{{ $tempImage->getClientOriginalExtension() }}">
                                    </video>
                                @else
                                    <img src="{{ $tempImage->temporaryUrl() }}" alt="Preview" class="w-full h-24 object-cover" />
                                @endif
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-2">
                                    <p class="text-xs text-white truncate">{{ $tempImage->getClientOriginalName() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Collapsible Details -->
                <div class="collapse collapse-arrow bg-base-200 rounded-xl mb-6">
                    <input type="checkbox" />
                    <div class="collapse-title text-base font-medium">
                        📝 Additional Details
                    </div>
                    <div class="collapse-content space-y-4">
                        <!-- Description -->
                        <div class="form-control">
                            <textarea 
                                wire:model.defer="description" 
                                placeholder="Description..."
                                class="textarea textarea-bordered rounded-xl resize-none w-full" 
                                rows="4"
                            ></textarea>
                            @error('description') <span class="text-error text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Location -->
                        <div class="form-control">
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-base-content/40 z-10">📍</span>
                                <input 
                                    type="text" 
                                    wire:model.defer="location" 
                                    placeholder="Location"
                                    class="input input-bordered rounded-xl pl-10 w-full" 
                                />
                            </div>
                            @error('location') <span class="text-error text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Year -->
                        <div class="form-control">
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-base-content/40 z-10">📅</span>
                                <input 
                                    type="text" 
                                    wire:model.defer="year" 
                                    placeholder="Year"
                                    maxlength="10"
                                    class="input input-bordered rounded-xl pl-10 w-full" 
                                />
                            </div>
                            @error('year') <span class="text-error text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Tags -->
                        <div class="form-control">
                            <div class="flex flex-wrap gap-2 mb-3">
                                <template x-for="(tag, index) in tags" :key="index">
                                    <div 
                                        class="badge badge-primary cursor-pointer hover:badge-error transition-colors" 
                                        @click="removeTag(index)" 
                                        x-text="tag"
                                    ></div>
                                </template>
                            </div>
                            <div class="join w-full">
                                <input 
                                    type="text" 
                                    placeholder="Add tag..." 
                                    x-model="newTag" 
                                    class="input input-bordered join-item flex-1 rounded-l-xl" 
                                    @keydown.enter.prevent="addTag()" 
                                />
                                <button 
                                    type="button" 
                                    @click="addTag()" 
                                    class="btn btn-primary join-item rounded-r-xl"
                                >
                                    +
                                </button>
                            </div>
                            @error('tags') <span class="text-error text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Homepage Toggle -->
                <div class="form-control mb-6">
                    <label class="label cursor-pointer bg-base-200 rounded-xl p-4">
                        <span class="label-text font-medium">🏠 Show on Homepage</span>
                        <input type="checkbox" wire:model.defer="show_in_homepage" class="toggle toggle-primary" />
                    </label>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="btn btn-primary btn-lg w-full rounded-xl" 
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>🚀 Create Post</span>
                    <span wire:loading class="loading loading-spinner loading-sm"></span>
                    <span wire:loading>Saving...</span>
                </button>
            </form>
        </div>
    </div>
{{-- </div> --}}