<div>
    <div class="min-h-screen">
        <!-- Hero Audio Player -->
        <div class="hero bg-gradient-to-r from-orange-50 to-amber-50 py-16">
            <div class="hero-content text-center max-w-4xl">
                <div class="w-full">
                    <h1 class="text-5xl font-bold text-orange-800 mb-2">कीर्तन</h1>
                    <h2 class="text-2xl font-semibold text-orange-700 mb-8">Divine Kirtan</h2>

                    <!-- Current Playing Card -->
                    <div class="card bg-white/80 backdrop-blur shadow-xl border border-orange-200 mb-8">
                        <div class="card-body">
                            <div class="flex flex-col md:flex-row items-center gap-6">
                                <!-- Album Art -->
                                <div class="avatar">
                                    <div class="w-32 h-32 rounded-xl shadow-lg">
                                        <img :src="currentTrack.image" :alt="currentTrack.title" class="object-cover">
                                    </div>
                                </div>

                                <!-- Track Info -->
                                <div class="flex-1 text-center md:text-left">
                                    <h3 class="text-2xl font-bold text-orange-800 mb-2" x-text="currentTrack.title"></h3>
                                    <p class="text-orange-600 font-semibold mb-1" x-text="currentTrack.artist"></p>
                                    <p class="text-gray-600 mb-4" x-text="currentTrack.duration"></p>

                                    <!-- Progress Bar -->
                                    <div class="flex items-center gap-4 mb-4">
                                        <span class="text-sm text-gray-500" x-text="formatTime(currentTime)"></span>
                                        <progress class="progress progress-primary flex-1" :value="progress" max="100" @click="seekTo($event)"></progress>
                                        <span class="text-sm text-gray-500" x-text="currentTrack.duration"></span>
                                    </div>

                                    <!-- Controls -->
                                    <div class="flex justify-center items-center gap-4">
                                        <button @click="previousTrack()" class="btn btn-circle btn-outline btn-primary">
                                            <i class="fas fa-step-backward"></i>
                                        </button>
                                        <button @click="togglePlay()" class="btn btn-circle btn-primary btn-lg">
                                            <i :class="isPlaying ? 'fas fa-pause' : 'fas fa-play'"></i>
                                        </button>
                                        <button @click="nextTrack()" class="btn btn-circle btn-outline btn-primary">
                                            <i class="fas fa-step-forward"></i>
                                        </button>
                                        <button @click="toggleShuffle()" class="btn btn-circle btn-outline" :class="{'btn-primary': shuffleMode}">
                                            <i class="fas fa-random"></i>
                                        </button>
                                        <button @click="toggleRepeat()" class="btn btn-circle btn-outline" :class="{'btn-primary': repeatMode}">
                                            <i class="fas fa-repeat"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex flex-col gap-2">
                                    <button @click="openLyrics()" class="btn btn-outline btn-primary">
                                        <i class="fas fa-scroll mr-2"></i>
                                        Lyrics
                                    </button>
                                    <button @click="downloadTrack()" class="btn btn-outline btn-secondary">
                                        <i class="fas fa-download mr-2"></i>
                                        Download
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row gap-4 mb-8">
                <!-- Search -->
                <div class="form-control flex-1">
                    <div class="input-group">
                        <input type="text" x-model="searchQuery" placeholder="Search kirtans..." class="input input-bordered flex-1">
                        <button class="btn btn-square btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="flex gap-2 flex-wrap">
                    <select x-model="filterMood" class="select select-bordered">
                        <option value="">All Moods</option>
                        <option value="devotional">Devotional</option>
                        <option value="peaceful">Peaceful</option>
                        <option value="celebratory">Celebratory</option>
                        <option value="meditative">Meditative</option>
                    </select>

                    <select x-model="filterTime" class="select select-bordered">
                        <option value="">All Times</option>
                        <option value="morning">Morning</option>
                        <option value="evening">Evening</option>
                        <option value="night">Night</option>
                        <option value="anytime">Anytime</option>
                    </select>
                </div>
            </div>

            <!-- Kirtan Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="kirtan in filteredKirtans" :key="kirtan.id">
                    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow border border-orange-100">
                        <figure class="relative">
                            <img :src="kirtan.image" :alt="kirtan.title" class="w-full h-48 object-cover">
                            <div class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button @click="playTrack(kirtan)" class="btn btn-circle btn-primary btn-lg">
                                    <i class="fas fa-play"></i>
                                </button>
                            </div>
                            <!-- Duration Badge -->
                            <div class="badge badge-primary absolute top-2 right-2" x-text="kirtan.duration"></div>
                        </figure>

                        <div class="card-body">
                            <h3 class="card-title text-orange-800" x-text="kirtan.title"></h3>
                            <p class="text-orange-600 font-medium mb-2" x-text="kirtan.artist"></p>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-1 mb-4">
                                <template x-for="tag in kirtan.tags" :key="tag">
                                    <div class="badge badge-outline badge-sm" x-text="tag"></div>
                                </template>
                            </div>

                            <!-- Actions -->
                            <div class="card-actions justify-between items-center">
                                <div class="flex gap-2">
                                    <button @click="playTrack(kirtan)" class="btn btn-primary btn-sm">
                                        <i class="fas fa-play mr-1"></i>
                                        Play
                                    </button>
                                    <button @click="openLyricsFor(kirtan)" class="btn btn-outline btn-sm">
                                        <i class="fas fa-scroll mr-1"></i>
                                        Lyrics
                                    </button>
                                </div>
                                <div class="dropdown dropdown-end">
                                    <button tabindex="0" class="btn btn-ghost btn-sm btn-circle">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li><a @click="addToQueue(kirtan)"><i class="fas fa-plus mr-2"></i>Add to Queue</a></li>
                                        <li><a @click="downloadTrack(kirtan)"><i class="fas fa-download mr-2"></i>Download</a></li>
                                        <li><a @click="shareTrack(kirtan)"><i class="fas fa-share mr-2"></i>Share</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Lyrics Modal -->
        <div x-show="showLyrics" x-transition class="modal modal-open">
            <div class="modal-box max-w-4xl">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="font-bold text-2xl text-orange-800" x-text="selectedLyrics.title"></h3>
                        <p class="text-orange-600" x-text="selectedLyrics.artist"></p>
                    </div>
                    <button @click="closeLyrics()" class="btn btn-circle btn-ghost">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="tabs tabs-lifted mb-6">
                    <button @click="lyricsTab = 'hindi'" class="tab" :class="{'tab-active': lyricsTab === 'hindi'}">
                        हिंदी
                    </button>
                    <button @click="lyricsTab = 'english'" class="tab" :class="{'tab-active': lyricsTab === 'english'}">
                        English
                    </button>
                    <button @click="lyricsTab = 'sanskrit'" class="tab" :class="{'tab-active': lyricsTab === 'sanskrit'}">
                        संस्कृत
                    </button>
                </div>

                <div class="prose max-w-none">
                    <div x-show="lyricsTab === 'hindi'" class="text-lg leading-relaxed" x-html="selectedLyrics.hindi"></div>
                    <div x-show="lyricsTab === 'english'" class="text-lg leading-relaxed" x-html="selectedLyrics.english"></div>
                    <div x-show="lyricsTab === 'sanskrit'" class="text-lg leading-relaxed" x-html="selectedLyrics.sanskrit"></div>
                </div>

                <div class="modal-action">
                    <button @click="printLyrics()" class="btn btn-outline">
                        <i class="fas fa-print mr-2"></i>
                        Print
                    </button>
                    <button @click="closeLyrics()" class="btn btn-primary">Close</button>
                </div>
            </div>
        </div>

        <!-- Queue Sidebar -->
        <div class="drawer drawer-end" :class="{'drawer-open': showQueue}">
            <input type="checkbox" class="drawer-toggle">
            <div class="drawer-content"></div>
            <div class="drawer-side z-50">
                <label @click="toggleQueue()" class="drawer-overlay"></label>
                <div class="p-4 w-80 min-h-full bg-base-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold">Queue</h3>
                        <button @click="toggleQueue()" class="btn btn-circle btn-ghost btn-sm">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="space-y-2">
                        <template x-for="(track, index) in queue" :key="track.id">
                            <div class="card bg-base-100 shadow-sm" :class="{'ring-2 ring-primary': index === currentIndex}">
                                <div class="card-body p-3">
                                    <div class="flex items-center gap-3">
                                        <img :src="track.image" :alt="track.title" class="w-12 h-12 rounded object-cover">
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-semibold text-sm truncate" x-text="track.title"></h4>
                                            <p class="text-xs text-gray-600 truncate" x-text="track.artist"></p>
                                        </div>
                                        <button @click="removeFromQueue(index)" class="btn btn-ghost btn-xs btn-circle">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fixed Queue Button -->
        <button @click="toggleQueue()" class="btn btn-circle btn-primary fixed bottom-4 right-4 z-40 shadow-lg">
            <i class="fas fa-list"></i>
            <div x-show="queue.length > 0" class="badge badge-secondary badge-sm absolute -top-2 -right-2" x-text="queue.length"></div>
        </button>
    </div>

    <script>
        function kirtanPlayer() {
            return {
                kirtans: [{
                        id: 1
                        , title: "राधे कृष्ण राधे कृष्ण"
                        , artist: "Maharaj Ji"
                        , duration: "5:32"
                        , image: "https://images.unsplash.com/photo-1507838153414-b4b713384a76?w=400&h=400&fit=crop"
                        , tags: ["devotional", "morning", "radha-krishna"]
                        , lyrics: {
                            hindi: "राधे कृष्ण राधे कृष्ण<br>कृष्ण कृष्ण राधे राधे<br>राधे श्याम राधे श्याम<br>श्याम श्याम राधे राधे"
                            , english: "Radhe Krishna Radhe Krishna<br>Krishna Krishna Radhe Radhe<br>Radhe Shyam Radhe Shyam<br>Shyam Shyam Radhe Radhe"
                            , sanskrit: "राधे कृष्ण राधे कृष्ण<br>कृष्ण कृष्ण राधे राधे<br>राधे श्याम राधे श्याम<br>श्याम श्याम राधे राधे"
                        }
                    }
                    , {
                        id: 2
                        , title: "हरे कृष्ण महामंत्र"
                        , artist: "Ashram Devotees"
                        , duration: "8:15"
                        , image: "https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=400&h=400&fit=crop"
                        , tags: ["meditative", "anytime", "mahamantra"]
                        , lyrics: {
                            hindi: "हरे कृष्ण हरे कृष्ण<br>कृष्ण कृष्ण हरे हरे<br>हरे राम हरे राम<br>राम राम हरे हरे"
                            , english: "Hare Krishna Hare Krishna<br>Krishna Krishna Hare Hare<br>Hare Rama Hare Rama<br>Rama Rama Hare Hare"
                            , sanskrit: "हरे कृष्ण हरे कृष्ण<br>कृष्ण कृष्ण हरे हरे<br>हरे राम हरे राम<br>राम राम हरे हरे"
                        }
                    }
                    , {
                        id: 3
                        , title: "श्री राधा आरती"
                        , artist: "Temple Singers"
                        , duration: "4:45"
                        , image: "https://images.unsplash.com/photo-1545558014-8692077e9b5c?w=400&h=400&fit=crop"
                        , tags: ["celebratory", "evening", "aarti"]
                        , lyrics: {
                            hindi: "जय राधे जय राधे<br>जय जय राधे श्याम<br>तेरी सूरत निराली<br>जग में सबसे न्यारी"
                            , english: "Jai Radhe Jai Radhe<br>Jai Jai Radhe Shyam<br>Teri surat nirali<br>Jag mein sabse nyari"
                            , sanskrit: "जय राधे जय राधे<br>जय जय राधे श्याम<br>तव मूर्ति अतिसुन्दर<br>जगत्प्रिये नमोऽस्तु ते"
                        }
                    }
                    , {
                        id: 4
                        , title: "गोविंद बोलो हरि गोपाल बोलो"
                        , artist: "Kirtan Mandali"
                        , duration: "6:28"
                        , image: "https://images.unsplash.com/photo-1582662168919-c44c2c7df2d5?w=400&h=400&fit=crop"
                        , tags: ["peaceful", "morning", "govind"]
                        , lyrics: {
                            hindi: "गोविंद बोलो हरि गोपाल बोलो<br>राधा रमण हरि गोपाल बोलो<br>वृंदावन के सांवरे गोपाल बोलो"
                            , english: "Govind bolo Hari Gopal bolo<br>Radha raman Hari Gopal bolo<br>Vrindavan ke sanware Gopal bolo"
                            , sanskrit: "गोविन्द बोलो हरि गोपाल बोलो<br>राधारमण हरि गोपाल बोलो<br>वृन्दावन के श्यामा गोपाल बोलो"
                        }
                    }
                ],

                currentTrack: {}
                , currentIndex: 0
                , queue: []
                , isPlaying: false
                , currentTime: 0
                , progress: 0
                , shuffleMode: false
                , repeatMode: false,

                searchQuery: ''
                , filterMood: ''
                , filterTime: '',

                showLyrics: false
                , selectedLyrics: {}
                , lyricsTab: 'hindi'
                , showQueue: false,

                init() {
                    this.queue = [...this.kirtans];
                    this.currentTrack = this.queue[0];

                    // Simulate progress updates
                    setInterval(() => {
                        if (this.isPlaying) {
                            this.currentTime += 1;
                            this.progress = (this.currentTime / this.durationInSeconds(this.currentTrack.duration)) * 100;

                            if (this.progress >= 100) {
                                this.nextTrack();
                            }
                        }
                    }, 1000);
                },

                get filteredKirtans() {
                    return this.kirtans.filter(kirtan => {
                        const matchesSearch = !this.searchQuery ||
                            kirtan.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            kirtan.artist.toLowerCase().includes(this.searchQuery.toLowerCase());

                        const matchesMood = !this.filterMood || kirtan.tags.includes(this.filterMood);
                        const matchesTime = !this.filterTime || kirtan.tags.includes(this.filterTime);

                        return matchesSearch && matchesMood && matchesTime;
                    });
                },

                playTrack(track) {
                    this.currentTrack = track;
                    this.currentIndex = this.queue.findIndex(t => t.id === track.id);
                    this.isPlaying = true;
                    this.currentTime = 0;
                    this.progress = 0;
                },

                togglePlay() {
                    this.isPlaying = !this.isPlaying;
                },

                nextTrack() {
                    if (this.shuffleMode) {
                        this.currentIndex = Math.floor(Math.random() * this.queue.length);
                    } else {
                        this.currentIndex = (this.currentIndex + 1) % this.queue.length;
                    }
                    this.currentTrack = this.queue[this.currentIndex];
                    this.currentTime = 0;
                    this.progress = 0;
                },

                previousTrack() {
                    this.currentIndex = this.currentIndex > 0 ? this.currentIndex - 1 : this.queue.length - 1;
                    this.currentTrack = this.queue[this.currentIndex];
                    this.currentTime = 0;
                    this.progress = 0;
                },

                toggleShuffle() {
                    this.shuffleMode = !this.shuffleMode;
                },

                toggleRepeat() {
                    this.repeatMode = !this.repeatMode;
                },

                seekTo(event) {
                    const rect = event.target.getBoundingClientRect();
                    const percent = (event.clientX - rect.left) / rect.width;
                    this.progress = percent * 100;
                    this.currentTime = percent * this.durationInSeconds(this.currentTrack.duration);
                },

                addToQueue(track) {
                    if (!this.queue.find(t => t.id === track.id)) {
                        this.queue.push(track);
                    }
                },

                removeFromQueue(index) {
                    this.queue.splice(index, 1);
                    if (index < this.currentIndex) {
                        this.currentIndex--;
                    }
                },

                toggleQueue() {
                    this.showQueue = !this.showQueue;
                },

                openLyrics() {
                    this.selectedLyrics = {
                        title: this.currentTrack.title
                        , artist: this.currentTrack.artist
                        , ...this.currentTrack.lyrics
                    };
                    this.showLyrics = true;
                },

                openLyricsFor(track) {
                    this.selectedLyrics = {
                        title: track.title
                        , artist: track.artist
                        , ...track.lyrics
                    };
                    this.showLyrics = true;
                },

                closeLyrics() {
                    this.showLyrics = false;
                },

                printLyrics() {
                    window.print();
                },

                downloadTrack(track = null) {
                    const t = track || this.currentTrack;
                    alert(`Downloading: ${t.title}`);
                },

                shareTrack(track) {
                    if (navigator.share) {
                        navigator.share({
                            title: track.title
                            , text: `Listen to ${track.title} by ${track.artist}`
                            , url: window.location.href
                        });
                    } else {
                        navigator.clipboard.writeText(window.location.href);
                        alert('Link copied to clipboard!');
                    }
                },

                formatTime(seconds) {
                    const mins = Math.floor(seconds / 60);
                    const secs = Math.floor(seconds % 60);
                    return `${mins}:${secs.toString().padStart(2, '0')}`;
                },

                durationInSeconds(duration) {
                    const [mins, secs] = duration.split(':').map(Number);
                    return mins * 60 + secs;
                }
            }
        }

    </script>
</div>
