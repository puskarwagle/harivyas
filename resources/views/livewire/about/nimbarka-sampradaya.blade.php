<div>
    <div x-data="sampradayaPage()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-gradient-to-br from-base-200 via-base-100 to-base-300 py-20">
            <div class="hero-content text-center max-w-4xl">
                <div>
                    <h1 class="text-6xl font-bold text-primary mb-4">निम्बार्क सम्प्रदाय</h1>
                    <h2 class="text-6xl font-semibold text-primary mb-6">Nimbarka Sampradaya</h2>
                    <p class="text-xl text-base-content leading-relaxed max-w-3xl mx-auto">
                        The ancient Vaishnava tradition founded by Jagadguru Shri Nimbarkacharya,
                        propagating the sublime philosophy of Dvaitadvaita and devotion to Shri Radha-Krishna
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="sticky top-0 z-40 bg-base-100 shadow-lg">
            <div class="container mx-auto px-4">
                <div class="tabs tabs-bordered justify-center">
                    <button @click="activeTab = 'overview'" :class="{'tab-active': activeTab === 'overview'}" class="tab tab-lg">Overview</button>
                    <button @click="activeTab = 'philosophy'" :class="{'tab-active': activeTab === 'philosophy'}" class="tab tab-lg">Philosophy</button>
                    <button @click="activeTab = 'practices'" :class="{'tab-active': activeTab === 'practices'}" class="tab tab-lg">Practices</button>
                    <button @click="activeTab = 'texts'" :class="{'tab-active': activeTab === 'texts'}" class="tab tab-lg">Texts</button>
                    <button @click="activeTab = 'centers'" :class="{'tab-active': activeTab === 'centers'}" class="tab tab-lg">Centers</button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-12">

            <!-- Overview Tab -->
            <div x-show="activeTab === 'overview'" x-transition class="space-y-12">
                <!-- Foundation Card -->
                <div class="card bg-base-100 shadow-xl border border-primary">
                    <div class="card-body">
                        <div class="flex items-center mb-6">
                            <i class="fas fa-om text-primary text-3xl mr-4"></i>
                            <h3 class="card-title text-2xl text-primary">Foundation & History</h3>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <p class="text-base-content leading-relaxed">
                                    The Nimbarka Sampradaya is one of the four authentic Vaishnava traditions (Sampradayas)
                                    established by Jagadguru Shri Nimbarkacharya in the 11th century CE. Known for its
                                    profound philosophy of Dvaitadvaita (dualistic non-dualism), this sampradaya has
                                    preserved the ancient Vedic wisdom for over a millennium.
                                </p>
                                <div class="stats stats-vertical lg:stats-horizontal shadow bg-base-100">
                                    <div class="stat">
                                        <div class="stat-title">Founded</div>
                                        <div class="stat-value text-primary">11th Century</div>
                                        <div class="stat-desc">By Nimbarkacharya</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-title">Philosophy</div>
                                        <div class="stat-value text-primary">Dvaitadvaita</div>
                                        <div class="stat-desc">Dualistic Non-dualism</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-64 h-64 bg-primary rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-lotus text-6xl text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key Features -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="card bg-base-100 shadow-xl border border-info">
                        <div class="card-body text-center">
                            <i class="fas fa-heart text-info text-4xl mb-4"></i>
                            <h4 class="card-title justify-center text-info">Radha-Krishna Worship</h4>
                            <p class="text-base-content">Central focus on the divine couple Shri Radha-Krishna as the supreme deity</p>
                        </div>
                    </div>

                    <div class="card bg-base-100 shadow-xl border border-success">
                        <div class="card-body text-center">
                            <i class="fas fa-book-open text-success text-4xl mb-4"></i>
                            <h4 class="card-title justify-center text-success">Vedic Authority</h4>
                            <p class="text-base-content">Based on Vedas, Upanishads, and Brahma Sutras with authentic interpretation</p>
                        </div>
                    </div>

                    <div class="card bg-base-100 shadow-xl border border-accent">
                        <div class="card-body text-center">
                            <i class="fas fa-users text-error text-4xl mb-4"></i>
                            <h4 class="card-title justify-center text-error">Guru Parampara</h4>
                            <p class="text-base-content">Unbroken lineage of spiritual masters preserving pure teachings</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Philosophy Tab -->
            <div x-show="activeTab === 'philosophy'" x-transition class="space-y-12">
                <!-- Dvaitadvaita Explanation -->
                <div class="card bg-base-100 shadow-xl border border-primary">
                    <div class="card-body">
                        <h3 class="card-title text-2xl text-primary mb-6">
                            <i class="fas fa-yin-yang text-primary mr-3"></i>
                            Dvaitadvaita Philosophy
                        </h3>
                        <div class="grid lg:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div class="alert alert-info">
                                    <i class="fas fa-lightbulb"></i>
                                    <span><strong>Dvaitadvaita</strong> means "dualistic non-dualism" - the soul is both different and non-different from Brahman simultaneously</span>
                                </div>
                                <p class="text-base-content leading-relaxed">
                                    This unique philosophical position reconciles the apparent contradiction between
                                    unity and diversity. The individual soul (jiva) is eternally distinct from
                                    Brahman yet inseparably connected, like waves in the ocean - distinct yet
                                    not separate from the water.
                                </p>
                            </div>
                            <div class="space-y-4">
                                <div class="collapse collapse-arrow bg-base-200">
                                    <input type="checkbox" />
                                    <div class="collapse-title font-medium text-primary">
                                        Three Eternal Realities
                                    </div>
                                    <div class="collapse-content text-base-content">
                                        <ul class="list-disc list-inside space-y-2">
                                            <li><strong>Brahman:</strong> The Supreme Reality (Radha-Krishna)</li>
                                            <li><strong>Jiva:</strong> Individual souls</li>
                                            <li><strong>Jagat:</strong> The material world</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="collapse collapse-arrow bg-base-200">
                                    <input type="checkbox" />
                                    <div class="collapse-title font-medium text-primary">
                                        Relationship Dynamics
                                    </div>
                                    <div class="collapse-content text-base-content">
                                        <p>The soul is simultaneously one with and different from God -
                                            sharing divine nature while maintaining individual identity for eternal loving service.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Core Concepts -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="card bg-secondary shadow-xl">
                        <div class="card-body">
                            <h4 class="card-title text-secondary">
                                <i class="fas fa-infinity mr-2"></i>
                                Eternal Relationship
                            </h4>
                            <p class="text-base-content">
                                The soul's relationship with God is eternal and natural, not created or achieved.
                                Liberation means realizing this pre-existing divine connection.
                            </p>
                        </div>
                    </div>

                    <div class="card bg-info shadow-xl">
                        <div class="card-body">
                            <h4 class="card-title text-info">
                                <i class="fas fa-praying-hands mr-2"></i>
                                Bhakti as Means
                            </h4>
                            <p class="text-base-content">
                                Pure devotion (bhakti) is both the means and the end. Through loving service,
                                the soul awakens to its eternal nature and divine relationship.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Practices Tab -->
            <div x-show="activeTab === 'practices'" x-transition class="space-y-12">
                <!-- Sadhana Framework -->
                <div class="card bg-base-100 shadow-xl border border-success">
                    <div class="card-body">
                        <h3 class="card-title text-2xl text-success mb-6">
                            <i class="fas fa-meditation text-success mr-3"></i>
                            Spiritual Practices (Sadhana)
                        </h3>
                        <div class="grid lg:grid-cols-3 gap-6">
                            <div class="space-y-4">
                                <h4 class="font-bold text-success text-lg">Daily Worship</h4>
                                <div class="badge-group">
                                    <div class="badge badge-primary">Deity Seva</div>
                                    <div class="badge badge-secondary">Aarti</div>
                                    <div class="badge badge-accent">Bhajans</div>
                                </div>
                                <p class="text-base-content text-sm">
                                    Regular worship of Shri Radha-Krishna through traditional rituals,
                                    ceremonies, and devotional singing.
                                </p>
                            </div>

                            <div class="space-y-4">
                                <h4 class="font-bold text-success text-lg">Mantra Japa</h4>
                                <div class="badge-group">
                                    <div class="badge badge-primary">Radha-Krishna Mantras</div>
                                    <div class="badge badge-secondary">Guru Mantras</div>
                                </div>
                                <p class="text-base-content text-sm">
                                    Repetition of sacred mantras for purification of consciousness
                                    and deepening divine connection.
                                </p>
                            </div>

                            <div class="space-y-4">
                                <h4 class="font-bold text-success text-lg">Study & Reflection</h4>
                                <div class="badge-group">
                                    <div class="badge badge-primary">Scripture Study</div>
                                    <div class="badge badge-secondary">Satsang</div>
                                </div>
                                <p class="text-base-content text-sm">
                                    Regular study of sampradaya texts and participation in
                                    spiritual discussions with fellow devotees.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lifestyle Guidelines -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="card bg-warning shadow-xl border border-warning">
                        <div class="card-body">
                            <h4 class="card-title text-warning">
                                <i class="fas fa-leaf mr-2"></i>
                                Ethical Living
                            </h4>
                            <ul class="space-y-2 text-base-content">
                                <li class="flex items-center"><i class="fas fa-check text-success mr-2"></i>Vegetarian diet</li>
                                <li class="flex items-center"><i class="fas fa-check text-success mr-2"></i>Truthfulness in speech</li>
                                <li class="flex items-center"><i class="fas fa-check text-success mr-2"></i>Compassion to all beings</li>
                                <li class="flex items-center"><i class="fas fa-check text-success mr-2"></i>Charitable giving</li>
                                <li class="flex items-center"><i class="fas fa-check text-success mr-2"></i>Regular fasting</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card bg-accent shadow-xl border border-accent">
                        <div class="card-body">
                            <h4 class="card-title text-accent">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Festival Observances
                            </h4>
                            <ul class="space-y-2 text-base-content">
                                <li class="flex items-center"><i class="fas fa-star text-accent mr-2"></i>Janmashtami</li>
                                <li class="flex items-center"><i class="fas fa-star text-accent mr-2"></i>Radhashtami</li>
                                <li class="flex items-center"><i class="fas fa-star text-accent mr-2"></i>Nimbarka Jayanti</li>
                                <li class="flex items-center"><i class="fas fa-star text-accent mr-2"></i>Holi & Diwali</li>
                                <li class="flex items-center"><i class="fas fa-star text-accent mr-2"></i>Ekadashi fasting</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Texts Tab -->
            <div x-show="activeTab === 'texts'" x-transition class="space-y-12">
                <!-- Primary Texts -->
                <div class="card bg-base-100 shadow-xl border border-info">
                    <div class="card-body">
                        <h3 class="card-title text-2xl text-info mb-6">
                            <i class="fas fa-scroll text-info mr-3"></i>
                            Authoritative Texts
                        </h3>
                        <div class="grid lg:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div class="card bg-info shadow-lg">
                                    <div class="card-body">
                                        <h4 class="card-title text-info">Vedanta Parijata Saurabha</h4>
                                        <p class="text-base-content">
                                            Nimbarkacharya's commentary on the Brahma Sutras, establishing
                                            the philosophical foundation of Dvaitadvaita.
                                        </p>
                                        <div class="badge badge-primary">Primary Text</div>
                                    </div>
                                </div>

                                <div class="card bg-info shadow-lg">
                                    <div class="card-body">
                                        <h4 class="card-title text-info">Dasha Shloki</h4>
                                        <p class="text-base-content">
                                            Ten essential verses summarizing the core principles
                                            of Nimbarka philosophy and practice.
                                        </p>
                                        <div class="badge badge-secondary">Essence</div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="card bg-info shadow-lg">
                                    <div class="card-body">
                                        <h4 class="card-title text-info">Shri Krishna Karnamrita</h4>
                                        <p class="text-base-content">
                                            Devotional poetry celebrating the divine pastimes
                                            and qualities of Lord Krishna.
                                        </p>
                                        <div class="badge badge-accent">Devotional</div>
                                    </div>
                                </div>

                                <div class="card bg-info shadow-lg">
                                    <div class="card-body">
                                        <h4 class="card-title text-info">Mahavani</h4>
                                        <p class="text-base-content">
                                            Comprehensive compilation of teachings by later
                                            acharyas of the sampradaya.
                                        </p>
                                        <div class="badge badge-warning">Compilation</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scripture Foundation -->
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <h4 class="font-bold">Scriptural Foundation</h4>
                        <p>The Nimbarka Sampradaya bases its teachings on the Prasthana Traya -
                            the three foundational texts of Vedanta: Upanishads, Brahma Sutras, and Bhagavad Gita.</p>
                    </div>
                </div>
            </div>

            <!-- Centers Tab -->
            <div x-show="activeTab === 'centers'" x-transition class="space-y-12">
                <!-- Major Centers -->
                <div class="card bg-base-100 shadow-xl border border-primary">
                    <div class="card-body">
                        <h3 class="card-title text-2xl text-primary mb-6">
                            <i class="fas fa-map-marked-alt text-primary mr-3"></i>
                            Major Centers Worldwide
                        </h3>
                        <div class="grid lg:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div class="card bg-primary shadow-lg">
                                    <div class="card-body">
                                        <div class="flex items-center mb-3">
                                            <i class="fas fa-map-marker-alt text-error mr-3"></i>
                                            <h4 class="card-title text-primary">Vrindavan, India</h4>
                                        </div>
                                        <p class="text-base-content mb-3">
                                            The spiritual heart of the sampradaya, home to numerous temples
                                            and ashrams including Shri Hari Vyas Nikunja Mandir.
                                        </p>
                                        <div class="badge badge-primary">Primary Seat</div>
                                    </div>
                                </div>

                                <div class="card bg-primary shadow-lg">
                                    <div class="card-body">
                                        <div class="flex items-center mb-3">
                                            <i class="fas fa-map-marker-alt text-error mr-3"></i>
                                            <h4 class="card-title text-primary">Nimbgram, Rajasthan</h4>
                                        </div>
                                        <p class="text-base-content mb-3">
                                            Birthplace of Jagadguru Nimbarkacharya,
                                            an important pilgrimage destination.
                                        </p>
                                        <div class="badge badge-secondary">Birthplace</div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="card bg-primary shadow-lg">
                                    <div class="card-body">
                                        <div class="flex items-center mb-3">
                                            <i class="fas fa-map-marker-alt text-error mr-3"></i>
                                            <h4 class="card-title text-primary">Salempet, Telangana</h4>
                                        </div>
                                        <p class="text-base-content mb-3">
                                            Historic center where Nimbarkacharya established
                                            his philosophical teachings.
                                        </p>
                                        <div class="badge badge-accent">Historic</div>
                                    </div>
                                </div>

                                <div class="card bg-primary shadow-lg">
                                    <div class="card-body">
                                        <div class="flex items-center mb-3">
                                            <i class="fas fa-globe text-info mr-3"></i>
                                            <h4 class="card-title text-primary">International Centers</h4>
                                        </div>
                                        <p class="text-base-content mb-3">
                                            Active communities in USA, UK, Australia, and other countries
                                            spreading Nimbarka teachings globally.
                                        </p>
                                        <div class="badge badge-warning">Worldwide</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="stats stats-vertical lg:stats-horizontal shadow w-full">
                    <div class="stat">
                        <div class="stat-figure text-primary">
                            <i class="fas fa-home text-3xl"></i>
                        </div>
                        <div class="stat-title">Active Temples</div>
                        <div class="stat-value text-primary">500+</div>
                        <div class="stat-desc">Across India & abroad</div>
                    </div>

                    <div class="stat">
                        <div class="stat-figure text-secondary">
                            <i class="fas fa-users text-3xl"></i>
                        </div>
                        <div class="stat-title">Devotees</div>
                        <div class="stat-value text-secondary">100,000+</div>
                        <div class="stat-desc">Worldwide community</div>
                    </div>

                    <div class="stat">
                        <div class="stat-figure text-accent">
                            <i class="fas fa-calendar text-3xl"></i>
                        </div>
                        <div class="stat-title">Tradition Age</div>
                        <div class="stat-value text-accent">1000+</div>
                        <div class="stat-desc">Years of wisdom</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-gradient-to-r from-primary to-secondary py-16">
            <div class="container mx-auto px-4 text-center">
                <h3 class="text-3xl font-bold text-base-100 mb-6">Experience the Living Tradition</h3>
                <p class="text-xl text-base-200 mb-8 max-w-2xl mx-auto">
                    Join us in preserving and practicing this ancient wisdom tradition.
                    Discover the profound joy of Radha-Krishna bhakti.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="btn btn-primary btn-lg bg-base-100 text-primary border-base-100 hover:bg-base-200">
                        <i class="fas fa-book-open mr-2"></i>
                        Explore Teachings
                    </button>
                    <button class="btn btn-outline btn-lg text-base-100 border-base-100 hover:bg-base-100 hover:text-primary">
                        <i class="fas fa-hands-praying mr-2"></i>
                        Visit Our Ashram
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sampradayaPage() {
            return {
                activeTab: 'overview'
            }
        }

    </script>
</div>
