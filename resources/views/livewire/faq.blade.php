    <div class="container mx-auto px-4 py-8 max-w-4xl" x-data="faqData()">

        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">
                Frequently Asked Questions
            </h1>
            <p class="text-lg text-base-content/70 max-w-2xl mx-auto">
                Find answers to common questions about Nimbarka Sampradaya, ashram life, and spiritual practice
            </p>
        </div>

        <!-- Search Bar -->
        <div class="mb-8">
            <div class="form-control max-w-md mx-auto">
                <div class="input-group">
                    <input type="text" placeholder="Search FAQs..." class="input input-bordered w-full" x-model="searchQuery" @input="filterFAQs">
                    <button class="btn btn-square btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Category Tabs -->
        <div class="tabs tabs-boxed justify-center mb-8 flex-wrap">
            <template x-for="category in categories" :key="category">
                <a class="tab" :class="{ 'tab-active': activeCategory === category }" @click="filterByCategory(category)" x-text="category"></a>
            </template>
        </div>

        <!-- FAQ Results Counter -->
        <div class="text-center mb-6" x-show="searchQuery.length > 0">
            <div class="badge badge-outline">
                <span x-text="filteredFAQs.length"></span> results found
            </div>
        </div>

        <!-- FAQ List -->
        <div class="space-y-4">
            <template x-for="faq in filteredFAQs" :key="faq.id">
                <div class="collapse collapse-plus bg-base-200 shadow-sm">
                    <input type="checkbox" :id="'faq-' + faq.id" />
                    <div class="collapse-title text-lg font-medium flex items-start gap-3">
                        <div class="badge badge-primary badge-sm mt-1 flex-shrink-0" x-text="faq.category"></div>
                        <span x-text="faq.question" class="flex-1"></span>
                    </div>
                    <div class="collapse-content">
                        <div class="pt-2">
                            <div class="prose prose-sm max-w-none" x-html="faq.answer"></div>
                            <div class="mt-4 flex flex-wrap gap-2" x-show="faq.tags.length > 0">
                                <template x-for="tag in faq.tags" :key="tag">
                                    <div class="badge badge-ghost badge-sm" x-text="tag"></div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- No Results -->
        <div class="text-center py-12" x-show="filteredFAQs.length === 0">
            <div class="text-6xl mb-4">🤔</div>
            <h3 class="text-xl font-semibold mb-2">No matching questions found</h3>
            <p class="text-base-content/70 mb-4">Try adjusting your search or browse different categories</p>
            <button class="btn btn-primary btn-sm" @click="resetFilters">Clear Filters</button>
        </div>

        <!-- Contact CTA -->
        <div class="mt-16 text-center">
            <div class="card bg-primary/5 border border-primary/20">
                <div class="card-body">
                    <h3 class="card-title justify-center text-primary">Still have questions?</h3>
                    <p class="text-base-content/70">We're here to help you on your spiritual journey</p>
                    <div class="card-actions justify-center">
                        <button class="btn btn-primary">Contact Us</button>
                        <button class="btn btn-outline">Visit Ashram</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function faqData() {
            return {
                searchQuery: ''
                , activeCategory: 'All'
                , categories: ['All', 'Basics', 'Philosophy', 'Practice', 'Ashram', 'Donation', 'Texts'],

                faqs: [{
                        id: 1
                        , category: 'Basics'
                        , question: 'What is Nimbarka Sampradaya?'
                        , answer: '<p>Nimbarka Sampradaya is one of the four major Vaishnava traditions in Hinduism, founded by Acharya Nimbarkacharya in the 12th century. It follows the philosophy of <strong>Dvaitadvaita</strong> (dualistic non-dualism) and emphasizes devotion to Radha-Krishna.</p><p>The tradition teaches that the individual soul is both different and non-different from the Supreme Being, like waves in an ocean.</p>'
                        , tags: ['tradition', 'philosophy', 'vaishnava']
                    }
                    , {
                        id: 2
                        , category: 'Philosophy'
                        , question: 'What is Dvaitadvaita philosophy?'
                        , answer: '<p><strong>Dvaitadvaita</strong> means "dualistic non-dualism." This philosophy teaches that:</p><ul><li>The individual soul (jiva) is both different and non-different from Brahman</li><li>We are distinct entities yet fundamentally connected to the Divine</li><li>Like sun rays are different from the sun yet inseparable from it</li></ul><p>This balanced approach avoids extreme monism and extreme dualism.</p>'
                        , tags: ['dvaitadvaita', 'brahman', 'jiva', 'metaphysics']
                    }
                    , {
                        id: 3
                        , category: 'Practice'
                        , question: 'How do I start practicing Nimbarka Sampradaya?'
                        , answer: '<p>Begin your spiritual journey with these steps:</p><ol><li><strong>Daily Meditation:</strong> Start with 10-15 minutes of Krishna meditation</li><li><strong>Mantra Chanting:</strong> Chant "Hare Krishna" or "Radhe Krishna" regularly</li><li><strong>Study Texts:</strong> Read our foundational texts like Vedanta Parijata Saurabha</li><li><strong>Seva (Service):</strong> Engage in selfless service to deepen your practice</li></ol><p>Consider visiting our ashram for guidance from experienced practitioners.</p>'
                        , tags: ['meditation', 'mantra', 'seva', 'beginner']
                    }
                    , {
                        id: 4
                        , category: 'Ashram'
                        , question: 'Can I stay at the ashram?'
                        , answer: '<p>Yes! We welcome sincere devotees for short-term and long-term stays:</p><ul><li><strong>Day Visits:</strong> Open daily from 5 AM to 9 PM</li><li><strong>Weekend Retreats:</strong> 2-3 day spiritual programs</li><li><strong>Extended Stays:</strong> 1-4 weeks for deep immersion</li><li><strong>Residential Life:</strong> For serious practitioners (application required)</li></ul><p>All stays include participation in daily prayers, meals, and spiritual activities. Contact us to arrange your visit.</p>'
                        , tags: ['accommodation', 'visit', 'retreat', 'schedule']
                    }
                    , {
                        id: 5
                        , category: 'Practice'
                        , question: 'What is the significance of Radha-Krishna worship?'
                        , answer: '<p>In Nimbarka Sampradaya, <strong>Radha-Krishna</strong> represents the complete manifestation of Divine Love:</p><ul><li><strong>Radha:</strong> The divine feminine energy, representing devotion and love</li><li><strong>Krishna:</strong> The supreme consciousness and divine masculine</li><li><strong>Together:</strong> They embody the perfect unity of love and consciousness</li></ul><p>Worshipping them together helps us understand the divine nature of love and achieve spiritual realization through devotion (bhakti).</p>'
                        , tags: ['radha', 'krishna', 'bhakti', 'worship', 'divine-love']
                    }
                    , {
                        id: 6
                        , category: 'Texts'
                        , question: 'Which texts should I study first?'
                        , answer: '<p>For beginners, we recommend this study sequence:</p><ol><li><strong>Dasha Shloki:</strong> Ten essential verses by Nimbarkacharya</li><li><strong>Mahavani:</strong> Core teachings and daily prayers</li><li><strong>Vedanta Parijata Saurabha:</strong> Detailed philosophical commentary</li></ol><p>Start with Dasha Shloki as it contains the essence of our philosophy in simple verses. Our ashram provides guided study sessions for deeper understanding.</p>'
                        , tags: ['study', 'scriptures', 'dasha-shloki', 'vedanta', 'beginner']
                    }
                    , {
                        id: 7
                        , category: 'Ashram'
                        , question: 'What is the daily schedule at the ashram?'
                        , answer: '<p>Our daily routine follows traditional ashram life:</p><ul><li><strong>4:30 AM:</strong> Wake up, personal meditation</li><li><strong>5:00 AM:</strong> Morning prayers and kirtan</li><li><strong>6:30 AM:</strong> Yoga and pranayama</li><li><strong>8:00 AM:</strong> Breakfast and seva</li><li><strong>10:00 AM:</strong> Text study and discussions</li><li><strong>12:00 PM:</strong> Lunch and rest</li><li><strong>4:00 PM:</strong> Afternoon prayers</li><li><strong>6:00 PM:</strong> Evening kirtan</li><li><strong>8:00 PM:</strong> Dinner</li><li><strong>9:00 PM:</strong> Personal study, rest</li></ul>'
                        , tags: ['schedule', 'routine', 'prayers', 'kirtan', 'daily-life']
                    }
                    , {
                        id: 8
                        , category: 'Donation'
                        , question: 'How can I support the ashram?'
                        , answer: '<p>There are many ways to support our mission:</p><ul><li><strong>Monthly Donations:</strong> Regular support for daily operations</li><li><strong>Sponsor Events:</strong> Fund festivals, kirtans, or special programs</li><li><strong>Food Seva:</strong> Sponsor daily meals for residents and visitors</li><li><strong>Book Donations:</strong> Help maintain our spiritual library</li><li><strong>Volunteer Work:</strong> Offer your skills and time</li></ul><p>All donations are used transparently for ashram maintenance, spiritual programs, and community service.</p>'
                        , tags: ['donation', 'support', 'sponsorship', 'volunteer', 'seva']
                    }
                    , {
                        id: 9
                        , category: 'Philosophy'
                        , question: 'What is the path to Moksha in Nimbarka Sampradaya?'
                        , answer: '<p>Moksha (liberation) is achieved through <strong>Bhakti Yoga</strong> - the path of devotion:</p><ol><li><strong>Sadhana:</strong> Regular spiritual practice and discipline</li><li><strong>Surrender:</strong> Complete surrender to Radha-Krishna</li><li><strong>Service:</strong> Selfless service to the Divine and devotees</li><li><strong>Knowledge:</strong> Understanding our true relationship with the Divine</li></ol><p>Liberation means realizing our eternal relationship with Krishna while maintaining our individual identity - the essence of Dvaitadvaita philosophy.</p>'
                        , tags: ['moksha', 'liberation', 'bhakti-yoga', 'surrender', 'sadhana']
                    }
                    , {
                        id: 10
                        , category: 'Basics'
                        , question: 'Do I need to be vegetarian to practice?'
                        , answer: '<p>While not strictly mandatory for beginners, <strong>vegetarianism is highly recommended</strong> for spiritual progress:</p><ul><li><strong>Ahimsa:</strong> Non-violence is fundamental to spiritual growth</li><li><strong>Purity:</strong> Vegetarian diet helps maintain physical and mental clarity</li><li><strong>Compassion:</strong> Develops empathy for all living beings</li><li><strong>Ashram Life:</strong> All meals at the ashram are vegetarian</li></ul><p>We encourage gradual transition and provide guidance for adopting a sattvic (pure) diet.</p>'
                        , tags: ['vegetarian', 'diet', 'ahimsa', 'purity', 'lifestyle']
                    }
                ],

                filteredFAQs: [],

                init() {
                    this.filteredFAQs = this.faqs;
                },

                filterFAQs() {
                    this.filteredFAQs = this.faqs.filter(faq => {
                        const matchesSearch = this.searchQuery === '' ||
                            faq.question.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            faq.answer.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            faq.tags.some(tag => tag.toLowerCase().includes(this.searchQuery.toLowerCase()));

                        const matchesCategory = this.activeCategory === 'All' || faq.category === this.activeCategory;

                        return matchesSearch && matchesCategory;
                    });
                },

                filterByCategory(category) {
                    this.activeCategory = category;
                    this.filterFAQs();
                },

                resetFilters() {
                    this.searchQuery = '';
                    this.activeCategory = 'All';
                    this.filteredFAQs = this.faqs;
                }
            }
        }

    </script>
