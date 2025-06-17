<x-layouts.app :title="__('Gallery Manager')">
    <div class="min-h-screen" x-data="galleryManager()">
        <!-- Header -->
        <div class="bg-base-100/80 border-b border-base-300 flex">
            <div class="container mx-auto px-6 py-8">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                    <span x-show="lang === 'hi'">गैलरी प्रबंधक</span>
                    <span x-show="lang === 'en'">Gallery Manager</span>
                </h1>
            </div>
            <div class="flex items-center gap-2 px-6">
                <span class="text-sm font-medium" x-show="lang === 'hi'">हिन्दी</span>
                <span class="text-sm font-medium" x-show="lang === 'en'">EN</span>
                <input type="checkbox" class="toggle" @change="lang = $event.target.checked ? 'en' : 'hi'" />
            </div>
        </div>

        <div class="container mx-auto py-8">
            <!-- Upload Form Card -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-base-100/70 backdrop-blur-sm rounded-2xl shadow-xl border border-base-300 overflow-hidden">
                    <div class="p-8">
                        <!-- Form Header -->
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-base-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-base-content" x-show="lang === 'en'">Upload New Image</h2>
                            <h2 class="text-xl font-semibold text-base-content" x-show="lang === 'hi'">नया चित्र अपलोड करें</h2>
                            <p class="text-base-content/70 mt-1" x-show="lang === 'en'">Add beautiful imagery to your gallery</p>
                            <p class="text-base-content/70 mt-1" x-show="lang === 'hi'">अपनी गैलरी में सुंदर चित्र जोड़ें</p>
                        </div>

                        <!-- Alerts -->
                        @if(session('success'))
                        <div class="alert alert-success mb-6" x-show="true" x-init="setTimeout(() => $el.style.display = 'none', 5000)">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-error mb-6">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Upload Form -->
                        <form action="{{ route('gallerymanager.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <!-- Image Upload Area -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium text-base-content" x-show="lang === 'en'">Image</span>
                                    <span class="label-text font-medium text-base-content" x-show="lang === 'hi'">चित्र</span>
                                </label>
                                <div class="relative">
                                    <input type="file" name="photo" id="photo" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" @change="handleFileSelect($event)">
                                    <div class="border-2 border-dashed border-base-300 rounded-xl p-8 text-center hover:border-primary transition-colors duration-200" :class="{'border-primary bg-primary/10': dragOver}" @dragover.prevent="dragOver = true" @dragleave.prevent="dragOver = false" @drop.prevent="handleDrop($event)">
                                        <div x-show="!selectedFile">
                                            <svg class="w-12 h-12 text-base-content/40 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <p class="text-base-content font-medium" x-show="lang === 'en'">Drop your image here, or click to browse</p>
                                            <p class="text-base-content font-medium" x-show="lang === 'hi'">यहाँ अपना चित्र छोड़ें, या ब्राउज़ करने के लिए क्लिक करें</p>
                                            <p class="text-base-content/50 text-sm mt-1" x-show="lang === 'hi'">PNG, JPG, WEBP तक 10MB</p>
                                            <p class="text-base-content/50 text-sm mt-1" x-show="lang === 'en'">PNG, JPG, WEBP up to 10MB</p>
                                        </div>
                                        <div x-show="selectedFile" class="flex items-center justify-center space-x-3">
                                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-base-content font-medium" x-text="selectedFile?.name"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Title -->
                                <div class="form-control md:col-span-2">
                                    <label for="title" class="label">
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'en'">Title</span>
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'hi'">शीर्षक</span>
                                    </label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" required class="input input-bordered w-full">
                                </div>

                                <!-- Category -->
                                {{-- <div class="form-control">
                                    <label for="category" class="label">
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'en'">Category</span>
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'hi'">श्रेणी</span>
                                    </label>
                                    <input type="text" name="category" id="category" value="{{ old('category') }}" class="input input-bordered w-full" placeholder="e.g., Janmoutsav, Holi, Bhandara">
                                </div> --}}

                                <!-- Location -->
                                <div class="form-control">
                                    <label for="location" class="label">
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'en'">Location</span>
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'hi'">स्थान</span>
                                    </label>
                                    <input type="text" name="location" id="location" value="{{ old('location') }}" class="input input-bordered w-full" placeholder="e.g., Vrindavan, Bhaktapur, Ashram">
                                </div>

                                <!-- Tags -->
                                <div class="form-control md:col-span-2">
                                    <label for="tags" class="label">
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'en'">Tags #</span>
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'hi'">टैग #</span>
                                    </label>
                                    <input type="text" name="tags" id="tags" value="{{ old('tags') }}" class="input input-bordered w-full" placeholder="radha, krishna, vrindavan, temple (comma separated)">
                                </div>

                                <!-- Description -->
                                <div class="form-control md:col-span-2">
                                    <label for="description" class="label">
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'en'">Description</span>
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'hi'">विवरण</span>
                                    </label>
                                    <textarea name="description" id="description" rows="4" class="textarea textarea-bordered w-full resize-none" placeholder="Describe the spiritual significance or context of this image...">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <!-- Toggle & Submit -->
                            <div class="flex items-center justify-between pt-6 border-t border-base-300">
                                <div class="form-control">
                                    <label class="label cursor-pointer flex items-center space-x-3">
                                        <input type="checkbox" name="show_in_homepage" class="toggle toggle-accent" {{ old('show_in_homepage') ? 'checked' : '' }}>
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'en'">Feature on homepage</span>
                                        <span class="label-text font-medium text-base-content" x-show="lang === 'hi'">होमपेज पर विशेषता</span>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary px-8 gap-2" x-show="lang === 'en'">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    Upload Image
                                </button>
                                <button type="submit" class="btn btn-primary px-8 gap-2" x-show="lang === 'hi'">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    चित्र अपलोड करें
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Gallery Table -->
                @if($images->count())
                <div class="mt-8">
                    <div class="bg-base-100 backdrop-blur-sm rounded-2xl shadow-xl border border-base-300 overflow-hidden">
                        <div class="p-6 border-b border-base-300">
                            <h3 class="text-lg font-semibold text-base-content" x-show="lang === 'en'">Gallery Images</h3>
                            <h3 class="text-lg font-semibold text-base-content" x-show="lang === 'hi'">गैलरी चित्र</h3>
                            <p class="text-sm text-base-content/70 mt-1" x-show="lang === 'en'">{{ $images->count() }} images uploaded</p>
                            <p class="text-sm text-base-content/70 mt-1" x-show="lang === 'hi'">{{ $images->count() }} चित्र अपलोड किए गए</p>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="table w-full">
                                <thead class="bg-base-200/70 sticky">
                                    <tr>
                                        <th class="font-medium text-base-content" x-show="lang === 'en'">Image</th>
                                        <th class="font-medium text-base-content" x-show="lang === 'en'">Title</th>
                                        <th class="font-medium text-base-content" x-show="lang === 'en'">Details</th>
                                        {{-- <th class="font-medium text-base-content" x-show="lang === 'en'">Category</th> --}}
                                        <th class="font-medium text-base-content" x-show="lang === 'en'">Status</th>
                                        {{-- <th class="font-medium text-base-content" x-show="lang === 'en'">Date</th> --}}
                                        <th class="font-medium text-base-content" x-show="lang === 'en'">Options</th>
                                        <th class="font-medium text-base-content" x-show="lang === 'hi'">चित्र</th>
                                        <th class="font-medium text-base-content" x-show="lang === 'hi'">शीर्षक</th>
                                        <th class="font-medium text-base-content" x-show="lang === 'hi'">विवरण</th>
                                        {{-- <th class="font-medium text-base-content" x-show="lang === 'hi'">श्रेणी</th> --}}
                                        <th class="font-medium text-base-content" x-show="lang === 'hi'">स्थिति</th>
                                        {{-- <th class="font-medium text-base-content" x-show="lang === 'hi'">तारीख</th> --}}
                                        <th class="font-medium text-base-content" x-show="lang === 'hi'">विकल्प</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($images as $image)
                                    <tr class="hover:bg-base-200/60">
                                        {{-- image --}}
                                        <td>
                                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-base-200">
                                                <img src="{{ asset($image->url) }}" alt="{{ $image->title }}" class="w-full h-full object-cover">
                                            </div>
                                        </td>
                                        {{-- title --}}
                                        <td>
                                            <div class="font-medium text-base-content">{{ $image->title }}</div>
                                        </td>
                                        {{-- description --}}
                                        <td>
                                            <div class="space-y-1">
                                                <div class="text-sm text-base-content/60">{{ Str::limit($image->description, 60) }}</div>
                                                @if($image->tags && is_array($image->tags))
                                                <div class="flex flex-wrap gap-1 mt-2">
                                                    @foreach(array_slice($image->tags, 0, 3) as $tag)
                                                    <span class="badge badge-sm bg-primary/10 text-primary border-primary/30">{{ $tag }}</span>
                                                    @endforeach
                                                    @if(count($image->tags) > 3)
                                                    <span class="badge badge-sm badge-ghost">+{{ count($image->tags) - 3 }}</span>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                        {{-- category --}}
                                        {{-- <td>
                                            @if($image->category)
                                            <span class="badge badge-outline">{{ $image->category }}</span>
                                            @endif
                                            @if($image->location)
                                            <div class="text-sm text-base-content/50 mt-1 flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                {{ $image->location }}
                                            </div>
                                            @endif
                                        </td> --}}
                                        {{-- status --}}
                                        <td>
                                            <div class="flex items-center space-x-2">
                                                <span class="badge {{ $image->show_in_homepage ? 'badge-success' : 'badge-ghost' }}">
                                                    {{ $image->show_in_homepage ? 'Homepage+' : 'Only gallery' }}
                                                </span>
                                            </div>
                                        </td>
                                        {{-- date --}}
                                        {{-- <td class="text-sm text-base-content/60">
                                            {{ $image->created_at->format('M j, Y') }}
                                        </td> --}}
                                        {{-- options --}}
                                        <td>
                                            <div class="flex justify-end">
                                                <button class="btn btn-sm text-warning">Edit</button>
                                                <button class="btn btn-sm text-error">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>

    <script>
        function galleryManager() {
            return {
                selectedFile: null
                , dragOver: false
                , lang: 'hi',

                toggleLang() {
                    this.lang = this.lang === 'hi' ? 'en' : 'hi';
                },

                handleFileSelect(event) {
                    this.selectedFile = event.target.files[0];
                },

                handleDrop(event) {
                    this.dragOver = false;
                    const files = event.dataTransfer.files;
                    if (files.length > 0) {
                        this.selectedFile = files[0];
                        document.getElementById('photo').files = files;
                    }
                }
            }
        }

    </script>
</x-layouts.app>
