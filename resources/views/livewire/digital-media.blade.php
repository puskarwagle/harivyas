<div>
    <div x-data="digitalMedia()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-gradient-to-r from-orange-50 to-amber-50 py-16">
            <div class="hero-content text-center">
                <div class="max-w-2xl">
                    <h1 class="text-5xl font-bold text-orange-800 mb-4">डिजिटल मीडिया</h1>
                    <h2 class="text-2xl font-semibold text-orange-700 mb-2">Digital Media</h2>
                    <p class="text-gray-600">Sacred texts, devotional music, and spiritual teachings in digital format</p>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <div class="flex-1">
                    <div class="form-control">
                        <div class="input-group">
                            <input 
                                type="text" 
                                x-model="searchQuery"
                                @input="filterContent"
                                placeholder="Search media..." 
                                class="input input-bordered flex-1 focus:input-primary"
                            >
                            <button class="btn btn-square btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <select 
                        x-model="selectedCategory"
                        @change="filterContent"
                        class="select select-bordered focus:select-primary"
                    >
                        <option value="">All Categories</option>
                        <option value="kirtan">Kirtan</option>
                        <option value="pravachan">Pravachan</option>
                        <option value="bhajan">Bhajan</option>
                        <option value="discourse">Discourse</option>
                        <option value="festival">Festival</option>
                    </select>
                </div>
            </div>

            <!-- Tabs -->
            <div class="tabs tabs-boxed mb-8 flex-wrap justify-center">
                <template x-for="tab in tabs" :key="tab.id">
                    <a 
                        class="tab"
                        :class="{'tab-active': activeTab === tab.id}"
                        @click="activeTab = tab.id; filterContent()"
                        x-text="tab.name"
                    ></a>
                </template>
            </div>

            <!-- Content Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" x-show="filteredContent.length > 0">
                <template x-for="item in filteredContent" :key="item.id">
                    <div class="card bg-base-100 shadow-xl border border-orange-100 hover:shadow-2xl transition-shadow">
                        <figure class="relative">
                            <img 
                                :src="item.thumbnail" 
                                :alt="item.title"
                                class="w-full h-48 object-cover"
                            >
                            <div class="absolute top-4 left-4">
                                <div class="badge badge-primary">
                                    <i :class="getTypeIcon(item.type)" class="mr-1"></i>
                                    <span x-text="item.type.toUpperCase()"></span>
                                </div>
                            </div>
                            <div class="absolute bottom-4 right-4" x-show="item.duration">
                                <div class="badge badge-neutral badge-outline bg-black/50 text-white border-white/20">
                                    <span x-text="item.duration"></span>
                                </div>
                            </div>
                        </figure>
                        
                        <div class="card-body">
                            <h3 class="card-title text-orange-800" x-text="item.title"></h3>
                            <p class="text-gray-600 text-sm mb-2" x-text="item.description"></p>
                            
                            <!-- Metadata -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <template x-for="tag in item.tags" :key="tag">
                                    <div class="badge badge-outline badge-sm" x-text="tag"></div>
                                </template>
                            </div>
                            
                            <div class="text-xs text-gray-500 mb-4">
                                <div class="flex items-center gap-4">
                                    <span x-show="item.date">
                                        <i class="fas fa-calendar mr-1"></i>
                                        <span x-text="item.date"></span>
                                    </span>
                                    <span x-show="item.size">
                                        <i class="fas fa-file mr-1"></i>
                                        <span x-text="item.size"></span>
                                    </span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="card-actions justify-end flex-wrap">
                                <!-- Play/View Button -->
                                <button 
                                    x-show="item.type === 'audio' || item.type === 'video'"
                                    @click="playMedia(item)"
                                    class="btn btn-primary btn-sm"
                                >
                                    <i :class="item.type === 'audio' ? 'fas fa-play' : 'fas fa-play-circle'" class="mr-1"></i>
                                    <span x-text="item.type === 'audio' ? 'Play' : 'Watch'"></span>
                                </button>
                                
                                <button 
                                    x-show="item.type === 'ebook' || item.type === 'wallpaper'"
                                    @click="viewItem(item)"
                                    class="btn btn-primary btn-sm"
                                >
                                    <i class="fas fa-eye mr-1"></i>
                                    View
                                </button>

                                <!-- Download Button -->
                                <button 
                                    @click="downloadItem(item)"
                                    class="btn btn-outline btn-sm"
                                >
                                    <i class="fas fa-download mr-1"></i>
                                    Download
                                </button>

                                <!-- Share Button -->
                                <button 
                                    @click="shareItem(item)"
                                    class="btn btn-ghost btn-sm"
                                >
                                    <i class="fas fa-share mr-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- No Results -->
            <div x-show="filteredContent.length === 0" class="text-center py-16">
                <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-600 mb-2">No media found</h3>
                <p class="text-gray-500">Try adjusting your search or filter criteria</p>
            </div>
        </div>

        <!-- Media Player Modal -->
        <div x-show="showPlayer" class="modal modal-open">
            <div class="modal-box max-w-4xl">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-lg" x-text="currentMedia?.title"></h3>
                    <button @click="closePlayer" class="btn btn-sm btn-circle btn-ghost">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <!-- Video Player -->
                <div x-show="currentMedia?.type === 'video'" class="mb-4">
                    <video 
                        x-ref="videoPlayer"
                        controls 
                        class="w-full rounded-lg"
                        :poster="currentMedia?.thumbnail"
                    >
                        <source :src="currentMedia?.url" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Audio Player -->
                <div x-show="currentMedia?.type === 'audio'" class="mb-4">
                    <div class="bg-gradient-to-r from-orange-100 to-amber-100 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <img 
                                :src="currentMedia?.thumbnail" 
                                :alt="currentMedia?.title"
                                class="w-20 h-20 rounded-lg object-cover mr-4"
                            >
                            <div>
                                <h4 class="font-semibold text-orange-800" x-text="currentMedia?.title"></h4>
                                <p class="text-sm text-gray-600" x-text="currentMedia?.description"></p>
                            </div>
                        </div>
                        <audio 
                            x-ref="audioPlayer"
                            controls 
                            class="w-full"
                        >
                            <source :src="currentMedia?.url" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>

                <!-- Media Info -->
                <div class="text-sm text-gray-600">
                    <p class="mb-2" x-text="currentMedia?.description"></p>
                    <div class="flex flex-wrap gap-4">
                        <span x-show="currentMedia?.date">
                            <i class="fas fa-calendar mr-1"></i>
                            <span x-text="currentMedia?.date"></span>
                        </span>
                        <span x-show="currentMedia?.duration">
                            <i class="fas fa-clock mr-1"></i>
                            <span x-text="currentMedia?.duration"></span>
                        </span>
                        <span x-show="currentMedia?.size">
                            <i class="fas fa-file mr-1"></i>
                            <span x-text="currentMedia?.size"></span>
                        </span>
                    </div>
                </div>

                <div class="modal-action">
                    <button @click="downloadItem(currentMedia)" class="btn btn-primary">
                        <i class="fas fa-download mr-2"></i>
                        Download
                    </button>
                    <button @click="closePlayer" class="btn">Close</button>
                </div>
            </div>
        </div>

        <!-- Download Success Toast -->
        <div x-show="showDownloadToast" x-transition class="toast toast-top toast-end">
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span>Download started!</span>
            </div>
        </div>
    </div>

    <script>
        function digitalMedia() {
            return {
                activeTab: 'audio',
                searchQuery: '',
                selectedCategory: '',
                showPlayer: false,
                currentMedia: null,
                showDownloadToast: false,
                
                tabs: [
                    { id: 'audio', name: 'Audio' },
                    { id: 'video', name: 'Videos' },
                    { id: 'ebook', name: 'E-Books' },
                    { id: 'wallpaper', name: 'Wallpapers' }
                ],

                mediaContent: [
                    // Audio
                    {
                        id: 1,
                        type: 'audio',
                        title: 'Radhe Krishna Kirtan',
                        description: 'Traditional kirtan dedicated to Radha Krishna with classical instruments',
                        thumbnail: 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=400&h=300&fit=crop',
                        url: 'https://www.soundjay.com/misc/sounds/bell-ringing-05.wav',
                        duration: '15:30',
                        size: '22.5 MB',
                        date: '2024-01-15',
                        tags: ['kirtan', 'radha-krishna', 'traditional'],
                        category: 'kirtan'
                    },
                    {
                        id: 2,
                        type: 'audio',
                        title: 'Nimbarka Philosophy Discourse',
                        description: 'Deep explanation of Dvaita-Advaita philosophy by Guruji',
                        thumbnail: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop',
                        url: 'https://www.soundjay.com/misc/sounds/bell-ringing-05.wav',
                        duration: '45:20',
                        size: '65.8 MB',
                        date: '2024-02-01',
                        tags: ['philosophy', 'discourse', 'nimbarka'],
                        category: 'pravachan'
                    },
                    {
                        id: 3,
                        type: 'audio',
                        title: 'Morning Bhajan Collection',
                        description: 'Peaceful bhajans for morning meditation and prayers',
                        thumbnail: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop',
                        url: 'https://www.soundjay.com/misc/sounds/bell-ringing-05.wav',
                        duration: '30:45',
                        size: '44.2 MB',
                        date: '2024-01-20',
                        tags: ['bhajan', 'morning', 'meditation'],
                        category: 'bhajan'
                    },

                    // Video
                    {
                        id: 4,
                        type: 'video',
                        title: 'Janmashtami Celebration 2024',
                        description: 'Complete coverage of Krishna Janmashtami celebration at the ashram',
                        thumbnail: 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=300&fit=crop',
                        url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
                        duration: '1:25:30',
                        size: '850 MB',
                        date: '2024-01-10',
                        tags: ['festival', 'janmashtami', 'celebration'],
                        category: 'festival'
                    },
                    {
                        id: 5,
                        type: 'video',
                        title: 'Daily Aarti Live Stream',
                        description: 'Live recording of evening aarti with complete rituals',
                        thumbnail: 'https://images.unsplash.com/photo-1552719664-6b4b4cd44cdc?w=400&h=300&fit=crop',
                        url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
                        duration: '25:15',
                        size: '180 MB',
                        date: '2024-02-05',
                        tags: ['aarti', 'daily', 'live'],
                        category: 'kirtan'
                    },
                    {
                        id: 6,
                        type: 'video',
                        title: 'Sadhana Practice Guide',
                        description: 'Step-by-step guide for daily spiritual practices',
                        thumbnail: 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=400&h=300&fit=crop',
                        url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
                        duration: '35:40',
                        size: '420 MB',
                        date: '2024-01-25',
                        tags: ['sadhana', 'practice', 'guide'],
                        category: 'discourse'
                    },

                    // E-Books
                    {
                        id: 7,
                        type: 'ebook',
                        title: 'Vedanta Parijata Saurabha',
                        description: 'Complete digital edition with Sanskrit text and Hindi translation',
                        thumbnail: 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=400&h=300&fit=crop',
                        url: '#',
                        size: '5.2 MB',
                        date: '2024-01-01',
                        tags: ['vedanta', 'scripture', 'nimbarka'],
                        category: 'scripture'
                    },
                    {
                        id: 8,
                        type: 'ebook',
                        title: 'Dasha Shloki',
                        description: 'Ten fundamental verses of Nimbarka philosophy with commentary',
                        thumbnail: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop',
                        url: '#',
                        size: '2.8 MB',
                        date: '2024-01-05',
                        tags: ['dasha-shloki', 'philosophy', 'verses'],
                        category: 'scripture'
                    },
                    {
                        id: 9,
                        type: 'ebook',
                        title: 'Ashram Life Guide',
                        description: 'Complete guide for visitors and residents of the ashram',
                        thumbnail: 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=400&h=300&fit=crop',
                        url: '#',
                        size: '3.5 MB',
                        date: '2024-01-12',
                        tags: ['ashram', 'guide', 'lifestyle'],
                        category: 'guide'
                    },

                    // Wallpapers
                    {
                        id: 10,
                        type: 'wallpaper',
                        title: 'Radha Krishna HD Wallpaper',
                        description: 'Beautiful artwork of Radha Krishna for desktop and mobile',
                        thumbnail: 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=300&fit=crop',
                        url: 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=1920&h=1080&fit=crop',
                        size: '2.5 MB',
                        date: '2024-02-01',
                        tags: ['radha-krishna', 'hd', 'desktop'],
                        category: 'devotional'
                    },
                    {
                        id: 11,
                        type: 'wallpaper',
                        title: 'Temple Architecture Collection',
                        description: 'High-resolution images of temple architecture and deities',
                        thumbnail: 'https://images.unsplash.com/photo-1552719664-6b4b4cd44cdc?w=400&h=300&fit=crop',
                        url: 'https://images.unsplash.com/photo-1552719664-6b4b4cd44cdc?w=1920&h=1080&fit=crop',
                        size: '8.9 MB',
                        date: '2024-01-30',
                        tags: ['temple', 'architecture', 'collection'],
                        category: 'devotional'
                    }
                ],

                filteredContent: [],

                init() {
                    this.filterContent();
                },

                filterContent() {
                    let filtered = this.mediaContent.filter(item => {
                        const matchesType = item.type === this.activeTab;
                        const matchesSearch = !this.searchQuery || 
                            item.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            item.description.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            item.tags.some(tag => tag.toLowerCase().includes(this.searchQuery.toLowerCase()));
                        const matchesCategory = !this.selectedCategory || item.category === this.selectedCategory;
                        
                        return matchesType && matchesSearch && matchesCategory;
                    });
                    
                    this.filteredContent = filtered;
                },

                getTypeIcon(type) {
                    const icons = {
                        audio: 'fas fa-music',
                        video: 'fas fa-video',
                        ebook: 'fas fa-book',
                        wallpaper: 'fas fa-image'
                    };
                    return icons[type] || 'fas fa-file';
                },

                playMedia(item) {
                    this.currentMedia = item;
                    this.showPlayer = true;
                    
                    // Wait for modal to render then play
                    this.$nextTick(() => {
                        if (item.type === 'video' && this.$refs.videoPlayer) {
                            this.$refs.videoPlayer.load();
                        } else if (item.type === 'audio' && this.$refs.audioPlayer) {
                            this.$refs.audioPlayer.load();
                        }
                    });
                },

                viewItem(item) {
                    if (item.type === 'wallpaper') {
                        window.open(item.url, '_blank');
                    } else {
                        this.currentMedia = item;
                        this.showPlayer = true;
                    }
                },

                closePlayer() {
                    // Pause any playing media
                    if (this.$refs.videoPlayer) {
                        this.$refs.videoPlayer.pause();
                    }
                    if (this.$refs.audioPlayer) {
                        this.$refs.audioPlayer.pause();
                    }
                    
                    this.showPlayer = false;
                    this.currentMedia = null;
                },

                downloadItem(item) {
                    // Simulate download
                    this.showDownloadToast = true;
                    setTimeout(() => {
                        this.showDownloadToast = false;
                    }, 3000);
                    
                    // In real implementation, trigger actual download
                    console.log('Downloading:', item.title);
                },

                shareItem(item) {
                    if (navigator.share) {
                        navigator.share({
                            title: item.title,
                            text: item.description,
                            url: window.location.href
                        });
                    } else {
                        // Fallback - copy to clipboard
                        navigator.clipboard.writeText(window.location.href);
                        alert('Link copied to clipboard!');
                    }
                }
            }
        }
    </script>
</div>
