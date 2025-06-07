<div>
    <div x-data="paramparaData()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-gradient-to-br from-base-100 via-base-100 to-base-100 py-20">
            <div class="hero-content text-center">
                <div class="max-w-4xl">
                    <h1 class="text-6xl font-bold text-primary mb-4">गुरु परम्परा</h1>
                    <h2 class="text-3xl font-semibold text-primary mb-6">Divine Lineage</h2>
                    <p class="text-lg text-base-content max-w-2xl mx-auto leading-relaxed">
                        The sacred succession of divine teachers in the Nimbarka Sampradaya,
                        carrying the eternal flame of Radha-Krishna bhakti through centuries of devotion.
                    </p>
                    <div class="mt-8">
                        <div class="badge badge-outline badge-lg text-primary border-primary">
                            <i class="fas fa-infinity mr-2"></i>
                            Eternal Divine Flow
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Navigation -->
        <div class="bg-base-200 py-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center gap-4">
                    <button @click="scrollToSection('timeline')" class="btn btn-outline btn-primary btn-sm">
                        <i class="fas fa-stream mr-2"></i>Timeline
                    </button>
                    <button @click="scrollToSection('acharyas')" class="btn btn-outline btn-secondary btn-sm">
                        <i class="fas fa-users mr-2"></i>Main Acharyas
                    </button>
                    <button @click="scrollToSection('lineage')" class="btn btn-outline btn-accent btn-sm">
                        <i class="fas fa-sitemap mr-2"></i>Full Lineage
                    </button>
                </div>
            </div>
        </div>

        <!-- Timeline Section -->
        <div id="timeline" class="py-16 bg-gradient-to-b from-base-100 to-base-200">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-primary mb-4">Sacred Timeline</h2>
                <p class="text-center text-base-content mb-12 max-w-2xl mx-auto">
                    Journey through the divine succession of our revered acharyas
                </p>

                <!-- Desktop Timeline -->
                <div class="hidden lg:block">
                    <div class="relative">
                        <!-- Timeline Line -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-primary to-primary"></div>

                        <!-- Timeline Items -->
                        <div class="space-y-12">
                            <template x-for="(acharya, index) in timelineAcharyas" :key="acharya.id">
                                <div class="relative flex items-center" :class="index % 2 === 0 ? 'justify-start' : 'justify-end'" x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false">
                                    <!-- Timeline Dot -->
                                    <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-white shadow-lg z-10"></div>

                                    <!-- Content Card -->
                                    <div class="w-5/12 cursor-pointer transform transition-all duration-300" :class="hovered ? 'scale-105' : ''" @click="openModal(acharya)">
                                        <div class="card bg-base-100 shadow-xl border border-base-200 hover:shadow-2xl transition-shadow">
                                            <div class="card-body p-6">
                                                <div class="flex items-center gap-4">
                                                    <div class="avatar">
                                                        <div class="w-16 h-16 rounded-full border-2 border-orange-200">
                                                            <img :src="acharya.image" :alt="acharya.name" class="object-cover">
                                                        </div>
                                                    </div>
                                                    <div class="flex-1">
                                                        <h3 class="card-title text-primary" x-text="acharya.name"></h3>
                                                        <p class="text-sm text-base-content" x-text="acharya.period"></p>
                                                        <div class="flex gap-2 mt-2">
                                                            <div class="badge badge-outline badge-sm" x-text="acharya.tradition"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-sm text-base-content mt-3 line-clamp-2" x-text="acharya.brief"></p>
                                                <div class="card-actions justify-end mt-4">
                                                    <button class="btn btn-primary btn-sm">
                                                        Learn More
                                                        <i class="fas fa-arrow-right ml-2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Mobile Timeline -->
                <div class="lg:hidden">
                    <div class="relative pl-8">
                        <!-- Timeline Line -->
                        <div class="absolute left-4 top-0 h-full w-0.5 bg-gradient-to-b from-primary to-primary"></div>

                        <!-- Timeline Items -->
                        <div class="space-y-8">
                            <template x-for="acharya in timelineAcharyas" :key="acharya.id">
                                <div class="relative">
                                    <!-- Timeline Dot -->
                                    <div class="absolute -left-6 top-6 w-4 h-4 bg-primary rounded-full border-2 border-white"></div>

                                    <!-- Content Card -->
                                    <div class="card bg-base-100 shadow-lg border border-base-200 cursor-pointer" @click="openModal(acharya)">
                                        <div class="card-body p-4">
                                            <div class="flex items-center gap-3">
                                                <div class="avatar">
                                                    <div class="w-12 h-12 rounded-full border border-orange-200">
                                                        <img :src="acharya.image" :alt="acharya.name" class="object-cover">
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <h3 class="font-bold text-primary" x-text="acharya.name"></h3>
                                                    <p class="text-xs text-base-content" x-text="acharya.period"></p>
                                                </div>
                                            </div>
                                            <p class="text-sm text-base-content mt-2" x-text="acharya.brief"></p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Acharyas Grid -->
        <div id="acharyas" class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-primary mb-4">प्रमुख आचार्य</h2>
                <h3 class="text-2xl font-semibold text-center text-primary mb-12">Main Acharyas</h3>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="acharya in mainAcharyas" :key="acharya.id">
                        <div class="card bg-base-100 shadow-xl border border-base-200 hover:shadow-2xl transition-all duration-300 cursor-pointer group" @click="openModal(acharya)">
                            <figure class="px-6 pt-6">
                                <div class="avatar">
                                    <div class="w-24 h-24 rounded-full border-4 border-primary group-hover:border-primary transition-colors">
                                        <img :src="acharya.image" :alt="acharya.name" class="object-cover">
                                    </div>
                                </div>
                            </figure>
                            <div class="card-body text-center">
                                <h3 class="card-title justify-center text-primary" x-text="acharya.name"></h3>
                                <p class="text-sm text-base-content" x-text="acharya.period"></p>
                                <div class="flex justify-center gap-2 my-3">
                                    <div class="badge badge-outline badge-sm" x-text="acharya.tradition"></div>
                                    <div class="badge badge-primary badge-outline badge-sm" x-text="acharya.contribution"></div>
                                </div>
                                <p class="text-sm text-base-content line-clamp-3" x-text="acharya.brief"></p>
                                <div class="card-actions justify-center mt-4">
                                    <button class="btn btn-primary btn-sm group-hover:btn-secondary transition-colors">
                                        <i class="fas fa-book-open mr-2"></i>
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Full Lineage Button -->
        <div id="lineage" class="py-16 bg-base-200">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl font-bold text-primary mb-6">Complete Lineage</h2>
                <p class="text-lg text-base-content mb-8 max-w-2xl mx-auto">
                    Explore the complete divine succession from Shri Krishna to the present day
                </p>
                <a href="/parampara/full-lineage" class="btn btn-primary btn-lg">
                    <i class="fas fa-sitemap mr-3"></i>
                    View Full Lineage Tree
                    <i class="fas fa-external-link-alt ml-3"></i>
                </a>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" x-transition class="modal modal-open" @click.away="closeModal">
            <div class="modal-box max-w-4xl">
                <div x-show="selectedAcharya">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center gap-4">
                            <div class="avatar">
                                <div class="w-20 h-20 rounded-full border-4 border-primary">
                                    <img :src="selectedAcharya?.image" :alt="selectedAcharya?.name" class="object-cover">
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-2xl text-primary" x-text="selectedAcharya?.name"></h3>
                                <p class="text-base-content" x-text="selectedAcharya?.period"></p>
                                <div class="flex gap-2 mt-2">
                                    <div class="badge badge-outline" x-text="selectedAcharya?.tradition"></div>
                                    <div class="badge badge-primary badge-outline" x-text="selectedAcharya?.contribution"></div>
                                </div>
                            </div>
                        </div>
                        <button @click="closeModal" class="btn btn-sm btn-circle btn-ghost">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h4 class="font-semibold text-lg text-primary mb-2">About</h4>
                            <p class="text-base-content leading-relaxed" x-text="selectedAcharya?.description"></p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-lg text-primary mb-2">Key Contributions</h4>
                            <ul class="list-disc list-inside space-y-1 text-base-content">
                                <template x-for="contribution in selectedAcharya?.contributions" :key="contribution">
                                    <li x-text="contribution"></li>
                                </template>
                            </ul>
                        </div>

                        <div class="modal-action">
                            <a :href="'/parampara/acharyas/' + selectedAcharya?.slug" class="btn btn-primary">
                                <i class="fas fa-book-open mr-2"></i>
                                Full Biography
                            </a>
                            <button @click="closeModal" class="btn btn-ghost">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function paramparaData() {
            return {
                showModal: false
                , selectedAcharya: null,

                timelineAcharyas: [{
                        id: 1
                        , name: 'Shri Nimbarkacharya'
                        , period: '1130-1200 CE'
                        , tradition: 'Founder'
                        , contribution: 'Dvaita-Advaita'
                        , brief: 'The divine founder who established the philosophical foundation of Dvaita-Advaita.'
                        , image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face'
                        , slug: 'nimbarkacharya'
                        , description: 'Shri Nimbarkacharya, the illustrious founder of the Nimbarka Sampradaya, was a divine incarnation who revealed the profound philosophy of Dvaita-Advaita (dualistic non-dualism). His teachings harmonized the apparent contradictions between duality and non-duality, showing the eternal relationship between the individual soul, the world, and the Supreme Reality.'
                        , contributions: [
                            'Established the Dvaita-Advaita philosophy'
                            , 'Authored Vedanta Parijata Saurabha'
                            , 'Revealed the eternal nature of Radha-Krishna bhakti'
                            , 'Founded the Nimbarka Sampradaya tradition'
                        ]
                    }
                    , {
                        id: 2
                        , name: 'Shri Shrinivasa Acharya'
                        , period: '1200-1270 CE'
                        , tradition: 'Second Acharya'
                        , contribution: 'Systematizer'
                        , brief: 'The great systematizer who organized and expanded the teachings of Nimbarkacharya.'
                        , image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face'
                        , slug: 'shrinivyas'
                        , description: 'Shri Shrinivasa Acharya was the brilliant systematizer who organized and expanded upon the foundational teachings of Nimbarkacharya. His scholarly works and organizational abilities helped establish the sampradaya on solid theological and practical foundations.'
                        , contributions: [
                            'Systematized the philosophical teachings'
                            , 'Established monastic traditions'
                            , 'Authored commentaries on key texts'
                            , 'Organized the community structure'
                        ]
                    }
                    , {
                        id: 3
                        , name: 'Shri Keshava Kashmiri'
                        , period: '1270-1340 CE'
                        , tradition: 'Third Acharya'
                        , contribution: 'Scholar'
                        , brief: 'The renowned scholar who defended the sampradaya through debates and writings.'
                        , image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=150&h=150&fit=crop&crop=face'
                        , slug: 'keshavakashmiri'
                        , description: 'Shri Keshava Kashmiri was a formidable scholar and debater who defended the principles of the Nimbarka Sampradaya against philosophical challenges of his time. His erudition and logical prowess established the intellectual credibility of the tradition.'
                        , contributions: [
                            'Defended sampradaya in scholarly debates'
                            , 'Authored philosophical treatises'
                            , 'Established centers of learning'
                            , 'Trained generations of scholars'
                        ]
                    }
                    , {
                        id: 4
                        , name: 'Shri Bhatta Deva'
                        , period: '1340-1410 CE'
                        , tradition: 'Fourth Acharya'
                        , contribution: 'Mystic'
                        , brief: 'The great mystic who deepened the devotional practices and spiritual disciplines.'
                        , image: 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=150&h=150&fit=crop&crop=face'
                        , slug: 'bhattadev'
                        , description: 'Shri Bhatta Deva was a realized mystic who emphasized the devotional aspect of the tradition. His spiritual practices and mystical experiences provided practical guidance for sincere seekers on the path of divine love.'
                        , contributions: [
                            'Developed devotional practices'
                            , 'Authored spiritual guides'
                            , 'Established pilgrimage traditions'
                            , 'Guided numerous disciples to realization'
                        ]
                    }
                    , {
                        id: 5
                        , name: 'Shri Harivyasa Deva'
                        , period: '1470-1540 CE'
                        , tradition: 'Fifth Acharya'
                        , contribution: 'Revitalizer'
                        , brief: 'The great revitalizer who renewed and spread the teachings throughout India.'
                        , image: 'https://images.unsplash.com/photo-1507591064344-4c6ce005b128?w=150&h=150&fit=crop&crop=face'
                        , slug: 'harivyasdev'
                        , description: 'Shri Harivyasa Deva was the great revitalizer of the Nimbarka Sampradaya who renewed its practices and spread its teachings far and wide. His dynamic leadership brought fresh energy to the tradition during a crucial period.'
                        , contributions: [
                            'Revitalized the sampradaya traditions'
                            , 'Established new centers across India'
                            , 'Authored devotional literature'
                            , 'Integrated regional devotional practices'
                        ]
                    }
                ],

                mainAcharyas: [{
                        id: 1
                        , name: 'Shri Nimbarkacharya'
                        , period: '1130-1200 CE'
                        , tradition: 'Founder'
                        , contribution: 'Philosophy'
                        , brief: 'The divine founder who established the philosophical foundation of Dvaita-Advaita and revealed the eternal nature of Radha-Krishna bhakti.'
                        , image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face'
                        , slug: 'nimbarkacharya'
                        , description: 'Shri Nimbarkacharya, the illustrious founder of the Nimbarka Sampradaya, was a divine incarnation who revealed the profound philosophy of Dvaita-Advaita (dualistic non-dualism). His teachings harmonized the apparent contradictions between duality and non-duality, showing the eternal relationship between the individual soul, the world, and the Supreme Reality.'
                        , contributions: [
                            'Established the Dvaita-Advaita philosophy'
                            , 'Authored Vedanta Parijata Saurabha'
                            , 'Revealed the eternal nature of Radha-Krishna bhakti'
                            , 'Founded the Nimbarka Sampradaya tradition'
                        ]
                    }
                    , {
                        id: 2
                        , name: 'Shri Shrinivasa Acharya'
                        , period: '1200-1270 CE'
                        , tradition: 'Systematizer'
                        , contribution: 'Organization'
                        , brief: 'The great systematizer who organized the teachings and established the monastic traditions of the sampradaya.'
                        , image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face'
                        , slug: 'shrinivyas'
                        , description: 'Shri Shrinivasa Acharya was the brilliant systematizer who organized and expanded upon the foundational teachings of Nimbarkacharya. His scholarly works and organizational abilities helped establish the sampradaya on solid theological and practical foundations.'
                        , contributions: [
                            'Systematized the philosophical teachings'
                            , 'Established monastic traditions'
                            , 'Authored commentaries on key texts'
                            , 'Organized the community structure'
                        ]
                    }
                    , {
                        id: 5
                        , name: 'Shri Harivyasa Deva'
                        , period: '1470-1540 CE'
                        , tradition: 'Revitalizer'
                        , contribution: 'Expansion'
                        , brief: 'The great revitalizer who renewed the tradition and established our beloved Vrindavan center.'
                        , image: 'https://images.unsplash.com/photo-1507591064344-4c6ce005b128?w=150&h=150&fit=crop&crop=face'
                        , slug: 'harivyasdev'
                        , description: 'Shri Harivyasa Deva was the great revitalizer of the Nimbarka Sampradaya who renewed its practices and spread its teachings far and wide. His dynamic leadership brought fresh energy to the tradition during a crucial period.'
                        , contributions: [
                            'Revitalized the sampradaya traditions'
                            , 'Established new centers across India'
                            , 'Authored devotional literature'
                            , 'Integrated regional devotional practices'
                        ]
                    }
                ],

                openModal(acharya) {
                    this.selectedAcharya = acharya;
                    this.showModal = true;
                    document.body.style.overflow = 'auto';
                },

                closeModal() {
                    this.showModal = false;
                    this.selectedAcharya = null;
                    document.body.style.overflow = 'auto';
                },

                scrollToSection(sectionId) {
                    document.getElementById(sectionId).scrollIntoView({
                        behavior: 'smooth'
                        , block: 'start'
                    });
                }
            }
        }

    </script>
</div>
