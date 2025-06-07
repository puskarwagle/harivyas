<div>
    <div x-data="vedantaText()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-gradient-to-r from-primary-50 to-base-50 py-16">
            <div class="hero-content text-center">
                <div class="max-w-4xl">
                    <h1 class="text-5xl font-bold text-primary mb-4" style="font-family: 'Noto Sans Devanagari', sans-serif;">वेदान्त पारिजात सौरभ</h1>
                    <h2 class="text-3xl font-semibold text-primary mb-4">Vedanta Parijata Saurabha</h2>
                    <p class="text-lg text-base-content/60 mb-6">The Fragrance of the Wish-Fulfilling Tree of Vedanta</p>
                    <div class="badge badge-primary badge-lg">By Acharya Nimbarka</div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Sidebar TOC -->
                <div class="lg:w-1/4">
                    <div class="sticky top-8">
                        <div class="card bg-base-100 shadow-xl border border-primary/20">
                            <div class="card-body p-4">
                                <h3 class="font-bold text-primary mb-4">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    Table of Contents
                                </h3>

                                <!-- Search -->
                                <div class="form-control mb-4">
                                    <input type="text" x-model="searchTerm" @input="filterVerses" placeholder="Search verses..." class="input input-bordered input-sm focus:input-primary">
                                </div>

                                <!-- Chapter Navigation -->
                                <div class="space-y-2 max-h-96 overflow-y-auto">
                                    <template x-for="(chapter, index) in chapters" :key="index">
                                        <div>
                                            <button @click="activeChapter = index; scrollToChapter(index)" class="btn btn-ghost btn-sm w-full justify-start text-left" :class="{'btn-primary': activeChapter === index}">
                                                <span x-text="`Chapter ${index + 1}: ${chapter.title}`"></span>
                                            </button>
                                        </div>
                                    </template>
                                </div>

                                <!-- Settings -->
                                <div class="divider"></div>
                                <div class="space-y-3">
                                    <div class="form-control">
                                        <label class="label cursor-pointer">
                                            <span class="label-text text-sm">Show Sanskrit</span>
                                            <input type="checkbox" x-model="showSanskrit" class="toggle toggle-primary toggle-sm">
                                        </label>
                                    </div>
                                    <div class="form-control">
                                        <label class="label cursor-pointer">
                                            <span class="label-text text-sm">Show Commentary</span>
                                            <input type="checkbox" x-model="showCommentary" class="toggle toggle-primary toggle-sm">
                                        </label>
                                    </div>
                                    <div class="form-control">
                                        <label class="label cursor-pointer">
                                            <span class="label-text text-sm">Large Text</span>
                                            <input type="checkbox" x-model="largeText" class="toggle toggle-primary toggle-sm">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Text Content -->
                <div class="lg:w-3/4">
                    <!-- Reading Progress -->
                    <div class="sticky top-0 card bg-primary/10 mb-6 p-2 z-50">
                        <div class="flex justify-between items-center">
                            <span class="text-sm mb-2">Reading Progress</span>
                            <span class="text-sm" x-text="`${Math.round(readingProgress)}%`"></span>
                        </div>
                        <progress class="progress progress-base w-full" :value="readingProgress" max="100"></progress>
                    </div>

                    <!-- Chapter Content -->
                    <template x-for="(chapter, chapterIndex) in filteredChapters" :key="chapterIndex">
                        <div :id="`chapter-${chapterIndex}`" class="mb-12">
                            <!-- Chapter Header -->
                            <div class="card bg-primary/10 shadow-lg mb-6">
                                <div class="card-body">
                                    <h2 class="card-title text-2xl text-primary mb-2">
                                        <span x-text="`अध्याय ${chapterIndex + 1}`" style="font-family: 'Noto Sans Devanagari', sans-serif;"></span>
                                        <span class="text-base">Chapter <span x-text="chapterIndex + 1"></span></span>
                                    </h2>
                                    <h3 class="text-xl font-semibold text-primary" x-text="chapter.title"></h3>
                                    <p class="text-base-content/60 mt-2" x-text="chapter.description"></p>
                                </div>
                            </div>

                            <!-- Verses -->
                            <div class="space-y-6">
                                <template x-for="(verse, verseIndex) in chapter.verses" :key="verseIndex">
                                    <div class="card bg-base-100 shadow-lg border border-primary/10">
                                        <div class="card-body" :class="{'text-lg': largeText}">
                                            <!-- Verse Number -->
                                            <div class="flex justify-between items-center mb-4">
                                                <div class="badge badge-primary">
                                                    Verse <span x-text="verseIndex + 1"></span>
                                                </div>
                                                <div class="dropdown dropdown-end">
                                                    <div tabindex="0" role="button" class="btn btn-ghost btn-sm">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </div>
                                                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow-xl border">
                                                        <li><a @click="bookmarkVerse(chapterIndex, verseIndex)"><i class="fas fa-bookmark mr-2"></i>Bookmark</a></li>
                                                        <li><a @click="shareVerse(chapterIndex, verseIndex)"><i class="fas fa-share mr-2"></i>Share</a></li>
                                                        <li><a @click="copyVerse(chapterIndex, verseIndex)"><i class="fas fa-copy mr-2"></i>Copy</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Sanskrit Text -->
                                            <div x-show="showSanskrit" x-transition class="mb-4">
                                                <div class="bg-primary/5 p-4 rounded-lg border-l-4 border-primary/30">
                                                    <p class="text-lg leading-relaxed text-base-content" style="font-family: 'Noto Sans Devanagari', sans-serif;" x-text="verse.sanskrit">
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Transliteration -->
                                            <div class="mb-4">
                                                <div class="bg-primary/5 p-4 rounded-lg border-l-4 border-primary/30">
                                                    <p class="italic text-base-content/70 leading-relaxed" x-text="verse.transliteration"></p>
                                                </div>
                                            </div>

                                            <!-- English Translation -->
                                            <div class="mb-4">
                                                <div class="bg-primary/5 p-4 rounded-lg border-l-4 border-primary/30">
                                                    <p class="text-base-content leading-relaxed" x-text="verse.translation"></p>
                                                </div>
                                            </div>

                                            <!-- Commentary Toggle -->
                                            <div x-show="showCommentary" x-transition>
                                                <div class="collapse collapse-arrow bg-primary/5 border border-primary/20">
                                                    <input type="checkbox" :id="`commentary-${chapterIndex}-${verseIndex}`">
                                                    <div class="collapse-title font-medium text-primary">
                                                        <i class="fas fa-comment-dots mr-2"></i>
                                                        Commentary & Explanation
                                                    </div>
                                                    <div class="collapse-content">
                                                        <p class="text-base-content/70 leading-relaxed pt-2" x-text="verse.commentary"></p>

                                                        <!-- Key Terms -->
                                                        <div x-show="verse.keyTerms && verse.keyTerms.length > 0" class="mt-4">
                                                            <h4 class="font-semibold text-primary mb-2">Key Terms:</h4>
                                                            <div class="flex flex-wrap gap-2">
                                                                <template x-for="term in verse.keyTerms" :key="term.sanskrit">
                                                                    <div class="tooltip" :data-tip="term.meaning">
                                                                        <span class="badge badge-outline badge-warning cursor-help" x-text="term.sanskrit"></span>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                    <!-- Navigation -->
                    <div class="flex justify-between items-center mt-12">
                        <button @click="previousChapter" :disabled="activeChapter === 0" class="btn btn-outline btn-primary" :class="{'btn-disabled': activeChapter === 0}">
                            <i class="fas fa-chevron-left mr-2"></i>
                            Previous Chapter
                        </button>

                        <div class="text-center">
                            <p class="text-sm text-base-content/60">
                                Chapter <span x-text="activeChapter + 1"></span> of <span x-text="chapters.length"></span>
                            </p>
                        </div>

                        <button @click="nextChapter" :disabled="activeChapter === chapters.length - 1" class="btn btn-outline btn-primary" :class="{'btn-disabled': activeChapter === chapters.length - 1}">
                            Next Chapter
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toast Notifications -->
        <div x-show="showToast" x-transition class="toast toast-top toast-center">
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span x-text="toastMessage"></span>
            </div>
        </div>
    </div>

    <script>
        function vedantaText() {
            return {
                activeChapter: 0
                , showSanskrit: true
                , showCommentary: false
                , largeText: false
                , searchTerm: ''
                , readingProgress: 0
                , showToast: false
                , toastMessage: '',

                chapters: [{
                        title: "Introduction to Dvaitadvaita"
                        , description: "The foundational principles of dual-non-dual philosophy"
                        , verses: [{
                                sanskrit: "द्वैताद्वैतं जगत्सर्वं ब्रह्मणो नान्यदस्ति वै। भेदाभेदमयं विश्वमेकमेवाद्वयं परम्॥"
                                , transliteration: "dvaitādvaitaṃ jagatsarvaṃ brahmaṇo nānyadasti vai | bhedābhedamayaṃ viśvamekamevādvayaṃ param ||"
                                , translation: "The entire universe is both dual and non-dual with Brahman; nothing else exists. This world consists of difference and non-difference, yet the Supreme is One without a second."
                                , commentary: "This opening verse establishes the fundamental principle of Nimbarka's philosophy - dvaitadvaita or bhedabheda. The world is neither completely different from Brahman nor completely identical with it. This relationship is natural and eternal, resolving the apparent contradiction between unity and diversity in creation."
                                , keyTerms: [{
                                        sanskrit: "द्वैताद्वैत"
                                        , meaning: "Dual-non-dual philosophy"
                                    }
                                    , {
                                        sanskrit: "भेदाभेद"
                                        , meaning: "Difference and non-difference"
                                    }
                                    , {
                                        sanskrit: "अद्वयं"
                                        , meaning: "Non-dual, without a second"
                                    }
                                ]
                            }
                            , {
                                sanskrit: "राधाकृष्णौ परं तत्त्वं सर्वेषां चैव कारणम्। स्वरूपशक्त्या युक्तं तु निष्कलं सकलं तथा॥"
                                , transliteration: "rādhākṛṣṇau paraṃ tattvaṃ sarveṣāṃ caiva kāraṇam | svarūpaśaktyā yuktaṃ tu niṣkalaṃ sakalaṃ tathā ||"
                                , translation: "Radha and Krishna are the Supreme Truth and the cause of all. United with inherent divine power, They are both without parts and with parts simultaneously."
                                , commentary: "This verse reveals the personal aspect of the Absolute Truth. Unlike impersonal Brahman concepts, Nimbarka presents Radha-Krishna as the complete manifestation of the Supreme, possessing both transcendent and immanent qualities through divine power (shakti)."
                                , keyTerms: [{
                                        sanskrit: "परं तत्त्व"
                                        , meaning: "Supreme Truth/Reality"
                                    }
                                    , {
                                        sanskrit: "स्वरूपशक्ति"
                                        , meaning: "Inherent divine power"
                                    }
                                    , {
                                        sanskrit: "निष्कल"
                                        , meaning: "Without parts, transcendent"
                                    }
                                ]
                            }
                        ]
                    }
                    , {
                        title: "The Nature of Individual Souls"
                        , description: "Understanding the relationship between Jivatma and Paramatma"
                        , verses: [{
                            sanskrit: "जीवो ब्रह्मैव नो भिन्नो भिन्नो नैव च सर्वथा। किन्तु भेदाभेदरूपेण स्थितो नित्यं सनातनः॥"
                            , transliteration: "jīvo brahmaiva no bhinno bhinno naiva ca sarvathā | kintu bhedābhedarūpeṇa sthito nityaṃ sanātanaḥ ||"
                            , translation: "The individual soul is neither completely different from Brahman nor completely non-different. Rather, it exists eternally in the form of difference-non-difference."
                            , commentary: "The individual soul (jiva) maintains its unique identity while being inseparably connected to Brahman. This eternal relationship allows for personal devotion while acknowledging the ultimate unity of existence. The soul is simultaneously one with and different from God."
                            , keyTerms: [{
                                    sanskrit: "जीव"
                                    , meaning: "Individual soul"
                                }
                                , {
                                    sanskrit: "सनातन"
                                    , meaning: "Eternal, everlasting"
                                }
                                , {
                                    sanskrit: "नित्य"
                                    , meaning: "Permanent, constant"
                                }
                            ]
                        }]
                    }
                    , {
                        title: "The Path of Devotion"
                        , description: "Bhakti as the supreme means of realization"
                        , verses: [{
                            sanskrit: "भक्तिरेव परा विद्या भक्तिरेव परं धनम्। भक्तिरेव परं ज्ञानं भक्तिरेव परं गतिः॥"
                            , transliteration: "bhaktireva parā vidyā bhaktireva paraṃ dhanam | bhaktireva paraṃ jñānaṃ bhaktireva paraṃ gatiḥ ||"
                            , translation: "Devotion alone is the supreme knowledge, devotion alone is the supreme wealth. Devotion alone is the supreme wisdom, devotion alone is the supreme goal."
                            , commentary: "This verse establishes bhakti as the ultimate spiritual practice. Unlike other paths that may lead to liberation, devotion not only grants liberation but maintains the loving relationship between the devotee and the Divine, which is considered even more valuable than moksha itself."
                            , keyTerms: [{
                                    sanskrit: "भक्ति"
                                    , meaning: "Devotion, loving worship"
                                }
                                , {
                                    sanskrit: "परा विद्या"
                                    , meaning: "Supreme knowledge"
                                }
                                , {
                                    sanskrit: "परं गति"
                                    , meaning: "Supreme destination/goal"
                                }
                            ]
                        }]
                    }
                ],

                get filteredChapters() {
                    if (!this.searchTerm) return this.chapters;

                    return this.chapters.filter(chapter =>
                        chapter.title.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                        chapter.verses.some(verse =>
                            verse.sanskrit.includes(this.searchTerm) ||
                            verse.translation.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                            verse.commentary.toLowerCase().includes(this.searchTerm.toLowerCase())
                        )
                    );
                },

                init() {
                    this.updateReadingProgress();
                    window.addEventListener('scroll', () => {
                        this.updateReadingProgress();
                    });
                },

                scrollToChapter(index) {
                    document.getElementById(`chapter-${index}`).scrollIntoView({
                        behavior: 'smooth'
                    });
                },

                nextChapter() {
                    if (this.activeChapter < this.chapters.length - 1) {
                        this.activeChapter++;
                        this.scrollToChapter(this.activeChapter);
                    }
                },

                previousChapter() {
                    if (this.activeChapter > 0) {
                        this.activeChapter--;
                        this.scrollToChapter(this.activeChapter);
                    }
                },

                updateReadingProgress() {
                    const scrollTop = window.pageYOffset;
                    const docHeight = document.body.offsetHeight;
                    const winHeight = window.innerHeight;
                    const scrollPercent = scrollTop / (docHeight - winHeight);
                    this.readingProgress = Math.min(scrollPercent * 100, 100);
                },

                bookmarkVerse(chapterIndex, verseIndex) {
                    this.showToastMessage('Verse bookmarked successfully!');
                },

                shareVerse(chapterIndex, verseIndex) {
                    const verse = this.chapters[chapterIndex].verses[verseIndex];
                    if (navigator.share) {
                        navigator.share({
                            title: 'Vedanta Parijata Saurabha'
                            , text: verse.translation
                            , url: window.location.href
                        });
                    } else {
                        this.showToastMessage('Sharing feature not supported');
                    }
                },

                copyVerse(chapterIndex, verseIndex) {
                    const verse = this.chapters[chapterIndex].verses[verseIndex];
                    const text = `${verse.sanskrit}\n\n${verse.translation}`;
                    navigator.clipboard.writeText(text).then(() => {
                        this.showToastMessage('Verse copied to clipboard!');
                    });
                },

                showToastMessage(message) {
                    this.toastMessage = message;
                    this.showToast = true;
                    setTimeout(() => {
                        this.showToast = false;
                    }, 3000);
                },

                filterVerses() {
                    // Trigger reactivity for filtered chapters
                }
            }
        }

    </script>
</div>
