<div>
    <div class="min-h-screen" x-data="galleryData()" x-init="initWithImages(@js($images))">

        <!-- Hero Section -->
        <div class="hero min-h-[40vh] bg-gradient-to-br from-primary/20 via-secondary/10 to-accent/20">
            <div class="hero-content text-center">
                <div class="max-w-2xl">
                    <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent mb-6">
                        Sacred Moments
                    </h1>
                    <p class="text-lg text-base-content/80 mb-8">
                        Journey through the divine beauty of our ashram, festivals, and spiritual celebrations
                    </p>
                    <div class="stats stats-horizontal shadow-lg bg-base-100/80 backdrop-blur-sm">
                        <div class="stat">
                            <div class="stat-value text-primary" x-text="totalImages"></div>
                            <div class="stat-title">Sacred Images</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value text-secondary" x-text="categories.length - 1"></div>
                            <div class="stat-title">Categories</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-12 max-w-7xl">

            <!-- Filter Controls -->
            <div class="flex flex-col lg:flex-row gap-6 items-center justify-between mb-12">

                <!-- Category Tabs -->
                <div class="tabs tabs-boxed bg-base-200/50 backdrop-blur-sm flex-wrap">
                    <template x-for="category in categories" :key="category">
                        <a class="tab transition-all duration-300" :class="{ 
                                'tab-active bg-primary text-primary-content': activeCategory === category,
                                'hover:bg-base-300': activeCategory !== category 
                            }" @click="filterByCategory(category)" x-text="category"></a>
                    </template>
                </div>

                <!-- View Toggle & Search -->
                <div class="flex gap-4 items-center">
                    <div class="join">
                        <button class="join-item btn btn-sm" :class="{ 'btn-active': viewMode === 'masonry' }" @click="viewMode = 'masonry'">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h3a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM10 4a1 1 0 011-1h3a1 1 0 011 1v6a1 1 0 01-1 1h-3a1 1 0 01-1-1V4zM10 14a1 1 0 011-1h3a1 1 0 011 1v2a1 1 0 01-1 1h-3a1 1 0 01-1-1v-2z" />
                            </svg>
                        </button>
                        <button class="join-item btn btn-sm" :class="{ 'btn-active': viewMode === 'grid' }" @click="viewMode = 'grid'">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </button>
                    </div>

                    <div class="form-control">
                        <input type="text" placeholder="Search images..." class="input input-bordered input-sm w-48" x-model="searchQuery" @input="filterImages">
                    </div>
                </div>
            </div>

            <!-- Results Counter -->
            <div class="text-center mb-8" x-show="filteredImages.length !== totalImages">
                <div class="badge badge-outline badge-lg">
                    <span x-text="filteredImages.length"></span> of <span x-text="totalImages"></span> images
                </div>
            </div>

            <!-- Masonry Layout -->
            <div class="masonry fade-in" x-show="viewMode === 'masonry'">
                <template x-for="image in filteredImages" :key="image.id">
                    <div class="masonry-item group cursor-pointer" @click="openModal(image)">
                        <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden">
                            <figure class="relative overflow-hidden">
                                <img :src="image.url" :alt="image.title" class="w-full h-auto zoom-animation object-cover" :class="{ 'loading-skeleton': !image.loaded }" @load="image.loaded = true" loading="lazy">
                                <div class="absolute inset-0 image-overlay bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                                    <div class="p-4 text-white w-full">
                                        <h3 class="font-semibold text-lg mb-1" x-text="image.title"></h3>
                                        <p class="text-sm opacity-90" x-text="image.description"></p>
                                        <div class="flex flex-wrap gap-1 mt-2" x-show="image.tags && image.tags.length">
                                            <template x-for="tag in (image.tags || [])" :key="tag">
                                                <span class="badge badge-xs bg-white/20 text-white border-none" x-text="tag"></span>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 fade-in" x-show="viewMode === 'grid'">
                <template x-for="image in filteredImages" :key="image.id">
                    <div class="group cursor-pointer" @click="openModal(image)">
                        <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden h-80">
                            <figure class="relative overflow-hidden flex-1">
                                <img :src="image.url" :alt="image.title" class="w-full h-full zoom-animation object-cover" :class="{ 'loading-skeleton': !image.loaded }" @load="image.loaded = true" loading="lazy">
                                <div class="absolute inset-0 image-overlay bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                                    <div class="p-4 text-white w-full">
                                        <h3 class="font-semibold mb-1" x-text="image.title"></h3>
                                        <p class="text-sm opacity-90 line-clamp-2" x-text="image.description"></p>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </template>
            </div>

            <!-- No Results -->
            <div class="text-center py-20" x-show="filteredImages.length === 0">
                <div class="text-8xl mb-6">🖼️</div>
                <h3 class="text-2xl font-bold mb-4">No images found</h3>
                <p class="text-base-content/70 mb-6">Try adjusting your search or browse different categories</p>
                <button class="btn btn-primary" @click="resetFilters">View All Images</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" :class="{ 'modal-open': modalOpen }" @click="closeModal()" style="backdrop-filter: blur(8px); background: rgba(0, 0, 0, 0.8);">
            <div class="modal-box max-w-6xl w-full p-0 bg-transparent shadow-none" @click.stop>
                <div class="relative">

                    <!-- Close Button -->
                    <button class="btn btn-sm btn-circle btn-ghost absolute top-4 right-4 z-10 bg-black/50 text-white hover:bg-black/70" @click="closeModal()">✕</button>

                    <!-- Navigation Buttons -->
                    <button class="btn btn-circle btn-ghost absolute left-4 top-1/2 -translate-y-1/2 z-10 bg-black/50 text-white hover:bg-black/70" @click.stop="previousImage()" x-show="currentImageIndex > 0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    <button class="btn btn-circle btn-ghost absolute right-4 top-1/2 -translate-y-1/2 z-10 bg-black/50 text-white hover:bg-black/70" @click.stop="nextImage()" x-show="currentImageIndex < filteredImages.length - 1">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Image -->
                    <div class="bg-black rounded-lg overflow-hidden">
                        <img x-show="selectedImage" :src="selectedImage?.url" :alt="selectedImage?.title" class="w-full h-auto max-h-[70vh] object-contain">
                    </div>

                    <!-- Image Info -->
                    <div class="bg-base-100 p-6 rounded-b-lg" x-show="selectedImage">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2" x-text="selectedImage?.title"></h3>
                                <p class="text-base-content/70 mb-3" x-text="selectedImage?.description"></p>
                                <div class="flex flex-wrap gap-2" x-show="selectedImage?.tags && selectedImage.tags.length">
                                    <template x-for="tag in (selectedImage?.tags || [])" :key="tag">
                                        <span class="badge badge-primary badge-sm" x-text="tag"></span>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- Image Counter -->
                        <div class="text-sm text-base-content/50 text-center">
                            <span x-text="currentImageIndex + 1"></span> of <span x-text="filteredImages.length"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .masonry {
            column-count: 1;
            column-gap: 1rem;
            column-fill: balance;
        }

        @media (min-width: 640px) {
            .masonry { column-count: 2; }
        }

        @media (min-width: 1024px) {
            .masonry { column-count: 3; }
        }

        @media (min-width: 1280px) {
            .masonry { column-count: 4; }
        }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1rem;
        }

        .zoom-animation {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .zoom-animation:hover {
            transform: scale(1.05);
        }

        .fade-in {
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>

    <script>
        function galleryData() {
            return {
                viewMode: 'masonry',
                searchQuery: '',
                activeCategory: 'All',
                modalOpen: false,
                selectedImage: null,
                currentImageIndex: 0,
                categories: ['All', 'Festivals', 'Daily Life', 'Deities', 'Ashram', 'Nature', 'Devotees', 'Architecture'],
                images: [],
                filteredImages: [],

                get totalImages() {
                    return this.images.length;
                },

                initWithImages(liveImages) {
                    this.images = liveImages.map(image => ({
                        ...image,
                        loaded: false,
                        tags: Array.isArray(image.tags) ? image.tags : []
                    }));
                    this.filteredImages = this.images;
                },

                filterByCategory(category) {
                    this.activeCategory = category;
                    this.filterImages();
                },

                filterImages() {
                    this.filteredImages = this.images.filter(image => {
                        const query = this.searchQuery.toLowerCase();
                        const matchesSearch = 
                            this.searchQuery === '' ||
                            image.title.toLowerCase().includes(query) ||
                            (image.description && image.description.toLowerCase().includes(query)) ||
                            (Array.isArray(image.tags) && image.tags.some(tag => tag.toLowerCase().includes(query)));

                        const matchesCategory = 
                            this.activeCategory === 'All' || 
                            image.category === this.activeCategory;

                        return matchesSearch && matchesCategory;
                    });
                },

                resetFilters() {
                    this.searchQuery = '';
                    this.activeCategory = 'All';
                    this.filteredImages = this.images;
                },

                openModal(image) {
                    this.selectedImage = image;
                    this.currentImageIndex = this.filteredImages.indexOf(image);
                    this.modalOpen = true;
                    document.body.style.overflow = 'hidden';
                },

                closeModal() {
                    this.modalOpen = false;
                    this.selectedImage = null;
                    document.body.style.overflow = 'auto';
                },

                nextImage() {
                    if (this.currentImageIndex < this.filteredImages.length - 1) {
                        this.currentImageIndex++;
                        this.selectedImage = this.filteredImages[this.currentImageIndex];
                    }
                },

                previousImage() {
                    if (this.currentImageIndex > 0) {
                        this.currentImageIndex--;
                        this.selectedImage = this.filteredImages[this.currentImageIndex];
                    }
                }
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const galleryEl = document.querySelector('[x-data*="galleryData"]');
            if (galleryEl && galleryEl._x_dataStack && galleryEl._x_dataStack[0]) {
                const gallery = galleryEl._x_dataStack[0];
                if (gallery.modalOpen) {
                    if (e.key === 'Escape') gallery.closeModal();
                    if (e.key === 'ArrowLeft') gallery.previousImage();
                    if (e.key === 'ArrowRight') gallery.nextImage();
                }
            }
        });
    </script>
</div>