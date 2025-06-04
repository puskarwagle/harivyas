<div>
    <div x-data="acharyaPage()" class="min-h-screen">
        <!-- Hero Section with Portrait -->
        <div class="hero bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-20">
            <div class="hero-content flex-col lg:flex-row-reverse max-w-6xl">
                <div class="lg:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="w-80 h-80 lg:w-96 lg:h-96">
                            <img src="/images/nimbarkacharya.jpg" alt="Acharya Nimbarkacharya" class="w-full h-full object-cover rounded-full shadow-2xl border-8 border-orange-200" />
                        </div>
                        <div class="absolute -bottom-4 -right-4 bg-orange-500 text-white rounded-full p-4 shadow-lg">
                            <i class="fas fa-om text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 text-center lg:text-left mt-8 lg:mt-0">
                    <div class="badge badge-primary badge-lg mb-4">आचार्य</div>
                    <h1 class="text-5xl lg:text-6xl font-bold text-orange-800 mb-2">निम्बार्काचार्य</h1>
                    <h2 class="text-2xl lg:text-3xl font-semibold text-orange-600 mb-4">Acharya Nimbarkacharya</h2>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-2 mb-6">
                        <div class="badge badge-outline">द्वैताद्वैत प्रवर्तक</div>
                        <div class="badge badge-outline">12th Century CE</div>
                        <div class="badge badge-outline">Founder</div>
                    </div>
                    <p class="text-lg text-gray-700 leading-relaxed max-w-2xl">
                        The revered founder of the Nimbarka Sampradaya and propounder of Dvaitadvaita philosophy, who illuminated the path of divine love through Radha-Krishna bhakti.
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="sticky top-0 z-40 bg-base-100 shadow-sm border-b">
            <div class="container mx-auto px-4">
                <div class="tabs tabs-boxed bg-transparent justify-center lg:justify-start py-4">
                    <button @click="activeTab = 'biography'" :class="activeTab === 'biography' ? 'tab-active' : ''" class="tab tab-lg"><i class="fas fa-user-circle mr-2"></i>Biography</button>
                    <button @click="activeTab = 'teachings'" :class="activeTab === 'teachings' ? 'tab-active' : ''" class="tab tab-lg"><i class="fas fa-book-open mr-2"></i>Teachings</button>
                    <button @click="activeTab = 'works'" :class="activeTab === 'works' ? 'tab-active' : ''" class="tab tab-lg"><i class="fas fa-scroll mr-2"></i>Works</button>
                    <button @click="activeTab = 'legacy'" :class="activeTab === 'legacy' ? 'tab-active' : ''" class="tab tab-lg"><i class="fas fa-star mr-2"></i>Legacy</button>
                </div>
            </div>
        </div>

        <!-- Content Container -->
        <div class="container mx-auto px-4 py-12">
            <!-- Biography Tab -->
            <div x-show="activeTab === 'biography'" x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Main Biography -->
                    <div class="lg:col-span-2">
                        <div class="card bg-base-100 shadow-xl border border-orange-100">
                            <div class="card-body prose max-w-none">
                                <h3 class="text-2xl font-bold text-orange-800 mb-6">Life and Early Years</h3>
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    Acharya Nimbarkacharya, also known as Nimbarka or Nimbaditya, was born in the 12th century CE in South India. He is revered as the founder of the Nimbarka Sampradaya and the propounder of the
                                    Dvaitadvaita (dualistic non-dualism) philosophy.
                                </p>
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    From his early childhood, Nimbarka displayed extraordinary spiritual inclinations and intellectual prowess. He was drawn to the worship of Radha-Krishna and spent countless hours in meditation and
                                    scriptural study.
                                </p>

                                <h4 class="text-xl font-semibold text-orange-700 mt-8 mb-4">Spiritual Journey</h4>
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    His spiritual journey led him to the realization that the individual soul (jiva) and the Supreme Soul (Brahman) are simultaneously different and non-different. This profound understanding became the
                                    cornerstone of his philosophical system.
                                </p>

                                <h4 class="text-xl font-semibold text-orange-700 mt-8 mb-4">Divine Mission</h4>
                                <p class="text-gray-700 leading-relaxed mb-4">
                                    Nimbarka established the Nimbarka Sampradaya to propagate the worship of Radha-Krishna and to guide devotees on the path of pure devotion (suddha bhakti). His teachings emphasized the importance of
                                    surrendering to the divine couple with complete faith and love.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline & Quick Facts -->
                    <div class="space-y-6">
                        <!-- Quick Facts -->
                        <div class="card bg-gradient-to-br from-orange-50 to-amber-50 shadow-xl border border-orange-200">
                            <div class="card-body">
                                <h4 class="card-title text-orange-800 mb-4"><i class="fas fa-info-circle mr-2"></i>Quick Facts</h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="font-semibold">Period:</span>
                                        <span>12th Century CE</span>
                                    </div>
                                    <div class="divider my-1"></div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold">Philosophy:</span>
                                        <span>Dvaitadvaita</span>
                                    </div>
                                    <div class="divider my-1"></div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold">Deity:</span>
                                        <span>Radha-Krishna</span>
                                    </div>
                                    <div class="divider my-1"></div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold">Sampradaya:</span>
                                        <span>Nimbarka</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline -->
                        <div class="card bg-base-100 shadow-xl border border-orange-100">
                            <div class="card-body">
                                <h4 class="card-title text-orange-800 mb-4"><i class="fas fa-clock mr-2"></i>Life Timeline</h4>
                                <ul class="timeline timeline-vertical">
                                    <li>
                                        <div class="timeline-start timeline-box bg-orange-50 border-orange-200">
                                            <div class="font-semibold">Birth</div>
                                            <div class="text-sm">12th Century CE</div>
                                        </div>
                                        <div class="timeline-middle">
                                            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                        </div>
                                        <hr class="bg-orange-200" />
                                    </li>
                                    <li>
                                        <hr class="bg-orange-200" />
                                        <div class="timeline-start timeline-box bg-orange-50 border-orange-200">
                                            <div class="font-semibold">Spiritual Awakening</div>
                                            <div class="text-sm">Early years</div>
                                        </div>
                                        <div class="timeline-middle">
                                            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                        </div>
                                        <hr class="bg-orange-200" />
                                    </li>
                                    <li>
                                        <hr class="bg-orange-200" />
                                        <div class="timeline-start timeline-box bg-orange-50 border-orange-200">
                                            <div class="font-semibold">Founded Sampradaya</div>
                                            <div class="text-sm">Mid-life</div>
                                        </div>
                                        <div class="timeline-middle">
                                            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                        </div>
                                        <hr class="bg-orange-200" />
                                    </li>
                                    <li>
                                        <hr class="bg-orange-200" />
                                        <div class="timeline-start timeline-box bg-orange-50 border-orange-200">
                                            <div class="font-semibold">Major Works</div>
                                            <div class="text-sm">Throughout life</div>
                                        </div>
                                        <div class="timeline-middle">
                                            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teachings Tab -->
            <div x-show="activeTab === 'teachings'" x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <div class="grid lg:grid-cols-2 gap-8">
                    <!-- Core Philosophy -->
                    <div class="card bg-base-100 shadow-xl border border-orange-100">
                        <div class="card-body">
                            <h3 class="card-title text-orange-800 mb-6"><i class="fas fa-yin-yang mr-2"></i>Dvaitadvaita Philosophy</h3>
                            <div class="space-y-4">
                                <div class="alert alert-info">
                                    <i class="fas fa-lightbulb"></i>
                                    <span><strong>Core Principle:</strong> The individual soul and Supreme Soul are simultaneously different and non-different</span>
                                </div>
                                <p class="text-gray-700">
                                    Nimbarka's Dvaitadvaita philosophy reconciles the apparent contradiction between duality and non-duality by proposing that the relationship between the individual soul (jiva) and Brahman is one of
                                    "difference-non-difference" (bhedabheda).
                                </p>
                                <div class="collapse collapse-arrow bg-orange-50 border border-orange-200">
                                    <input type="checkbox" />
                                    <div class="collapse-title font-medium">Three Eternal Realities</div>
                                    <div class="collapse-content">
                                        <ol class="list-decimal list-inside space-y-2 text-gray-700">
                                            <li><strong>Chit (Consciousness):</strong> The individual souls</li>
                                            <li><strong>Achit (Matter):</strong> The material world</li>
                                            <li><strong>Ishvara (God):</strong> The Supreme Being</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bhakti Teachings -->
                    <div class="card bg-base-100 shadow-xl border border-orange-100">
                        <div class="card-body">
                            <h3 class="card-title text-orange-800 mb-6"><i class="fas fa-heart mr-2"></i>Path of Bhakti</h3>
                            <div class="space-y-4">
                                <div class="alert alert-success">
                                    <i class="fas fa-praying-hands"></i>
                                    <span><strong>Supreme Goal:</strong> Pure devotion to Radha-Krishna</span>
                                </div>
                                <p class="text-gray-700">
                                    Nimbarka emphasized that the highest spiritual attainment comes through unwavering devotion to the divine couple, Radha and Krishna, who represent the perfect union of the individual soul with the
                                    Supreme.
                                </p>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="text-center p-4 bg-orange-50 rounded-lg border border-orange-200">
                                        <i class="fas fa-lotus text-orange-500 text-2xl mb-2"></i>
                                        <div class="font-semibold">Sharanagati</div>
                                        <div class="text-sm text-gray-600">Complete Surrender</div>
                                    </div>
                                    <div class="text-center p-4 bg-orange-50 rounded-lg border border-orange-200">
                                        <i class="fas fa-music text-orange-500 text-2xl mb-2"></i>
                                        <div class="font-semibold">Kirtan</div>
                                        <div class="text-sm text-gray-600">Divine Names</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key Teachings -->
                <div class="mt-8">
                    <div class="card bg-base-100 shadow-xl border border-orange-100">
                        <div class="card-body">
                            <h3 class="card-title text-orange-800 mb-6"><i class="fas fa-quote-left mr-2"></i>Key Teachings</h3>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="quote-card bg-gradient-to-br from-orange-50 to-amber-50 p-6 rounded-lg border border-orange-200">
                                    <blockquote class="text-gray-700 italic mb-4">
                                        "The soul is like a spark of the divine fire - different yet inseparable from its source."
                                    </blockquote>
                                    <cite class="text-orange-600 font-semibold">- On Soul-God Relationship</cite>
                                </div>
                                <div class="quote-card bg-gradient-to-br from-orange-50 to-amber-50 p-6 rounded-lg border border-orange-200">
                                    <blockquote class="text-gray-700 italic mb-4">
                                        "True devotion dissolves the ego and reveals the eternal dance of love between Radha and Krishna."
                                    </blockquote>
                                    <cite class="text-orange-600 font-semibold">- On Pure Bhakti</cite>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Works Tab -->
            <div x-show="activeTab === 'works'" x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Major Works -->
                    <div class="lg:col-span-2">
                        <div class="card bg-base-100 shadow-xl border border-orange-100">
                            <div class="card-body">
                                <h3 class="card-title text-orange-800 mb-6"><i class="fas fa-scroll mr-2"></i>Literary Contributions</h3>
                                <div class="space-y-6">
                                    <!-- Work 1 -->
                                    <div class="border-l-4 border-orange-500 pl-6 py-4 bg-orange-50 rounded-r-lg">
                                        <h4 class="text-lg font-semibold text-orange-800 mb-2">Vedanta Parijata Saurabha</h4>
                                        <p class="text-gray-700 mb-3">
                                            A comprehensive commentary on the Brahma Sutras, establishing the philosophical foundations of Dvaitadvaita. This masterwork systematically explains the relationship between the individual
                                            soul, the material world, and the Supreme Being.
                                        </p>
                                        <div class="flex flex-wrap gap-2">
                                            <div class="badge badge-primary">Brahma Sutra Commentary</div>
                                            <div class="badge badge-outline">Sanskrit</div>
                                            <div class="badge badge-outline">Philosophy</div>
                                        </div>
                                    </div>

                                    <!-- Work 2 -->
                                    <div class="border-l-4 border-orange-500 pl-6 py-4 bg-orange-50 rounded-r-lg">
                                        <h4 class="text-lg font-semibold text-orange-800 mb-2">Dasha Shloki</h4>
                                        <p class="text-gray-700 mb-3">
                                            Ten verses that encapsulate the essence of Nimbarka's philosophy and devotional practices. These verses serve as a concise guide for practitioners of the Nimbarka path.
                                        </p>
                                        <div class="flex flex-wrap gap-2">
                                            <div class="badge badge-secondary">Devotional Poetry</div>
                                            <div class="badge badge-outline">10 Verses</div>
                                            <div class="badge badge-outline">Practical Guide</div>
                                        </div>
                                    </div>

                                    <!-- Work 3 -->
                                    <div class="border-l-4 border-orange-500 pl-6 py-4 bg-orange-50 rounded-r-lg">
                                        <h4 class="text-lg font-semibold text-orange-800 mb-2">Guru Gita Commentary</h4>
                                        <p class="text-gray-700 mb-3">
                                            An insightful commentary on the sacred dialogue between Lord Shiva and Parvati about the nature and importance of the spiritual teacher (guru) in the devotional journey.
                                        </p>
                                        <div class="flex flex-wrap gap-2">
                                            <div class="badge badge-accent">Commentary</div>
                                            <div class="badge badge-outline">Guru-Disciple</div>
                                            <div class="badge badge-outline">Spiritual Guidance</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Writing Style & Impact -->
                    <div class="space-y-6">
                        <div class="card bg-gradient-to-br from-orange-50 to-amber-50 shadow-xl border border-orange-200">
                            <div class="card-body">
                                <h4 class="card-title text-orange-800 mb-4"><i class="fas fa-feather-alt mr-2"></i>Writing Style</h4>
                                <ul class="space-y-3">
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                        <span class="text-gray-700">Clear logical exposition</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                        <span class="text-gray-700">Sanskrit scholarship</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                        <span class="text-gray-700">Devotional depth</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mr-2 mt-1"></i>
                                        <span class="text-gray-700">Practical guidance</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card bg-base-100 shadow-xl border border-orange-100">
                            <div class="card-body">
                                <h4 class="card-title text-orange-800 mb-4"><i class="fas fa-download mr-2"></i>Study Resources</h4>
                                <div class="space-y-3">
                                    <button class="btn btn-outline btn-primary w-full">
                                        <i class="fas fa-book mr-2"></i>
                                        Download Texts
                                    </button>
                                    <button class="btn btn-outline btn-secondary w-full">
                                        <i class="fas fa-headphones mr-2"></i>
                                        Audio Recitations
                                    </button>
                                    <button class="btn btn-outline btn-accent w-full">
                                        <i class="fas fa-language mr-2"></i>
                                        Translations
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Legacy Tab -->
            <div x-show="activeTab === 'legacy'" x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <div class="grid lg:grid-cols-2 gap-8">
                    <!-- Philosophical Impact -->
                    <div class="card bg-base-100 shadow-xl border border-orange-100">
                        <div class="card-body">
                            <h3 class="card-title text-orange-800 mb-6"><i class="fas fa-university mr-2"></i>Philosophical Legacy</h3>
                            <div class="space-y-4">
                                <p class="text-gray-700">
                                    Nimbarka's Dvaitadvaita philosophy represents a unique synthesis in Vedantic thought, offering a balanced perspective that honors both the individual's spiritual journey and the ultimate unity with
                                    the Divine.
                                </p>
                                <div class="stats stats-vertical lg:stats-horizontal shadow bg-orange-50">
                                    <div class="stat">
                                        <div class="stat-title">Centuries of Influence</div>
                                        <div class="stat-value text-orange-600">8+</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-title">Spiritual Lineage</div>
                                        <div class="stat-value text-orange-600">Continuous</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sampradaya Growth -->
                    <div class="card bg-base-100 shadow-xl border border-orange-100">
                        <div class="card-body">
                            <h3 class="card-title text-orange-800 mb-6"><i class="fas fa-users mr-2"></i>Sampradaya Impact</h3>
                            <div class="space-y-4">
                                <p class="text-gray-700">
                                    The Nimbarka Sampradaya continues to flourish, with ashrams and devotees worldwide following the path of Radha-Krishna bhakti as taught by the Acharya.
                                </p>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="text-center p-4 bg-orange-50 rounded-lg">
                                        <i class="fas fa-globe text-orange-500 text-2xl mb-2"></i>
                                        <div class="font-semibold">Global Reach</div>
                                        <div class="text-sm text-gray-600">Worldwide Presence</div>
                                    </div>
                                    <div class="text-center p-4 bg-orange-50 rounded-lg">
                                        <i class="fas fa-hands-praying text-orange-500 text-2xl mb-2"></i>
                                        <div class="font-semibold">Living Tradition</div>
                                        <div class="text-sm text-gray-600">Active Practice</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modern Relevance -->
                <div class="mt-8">
                    <div class="card bg-gradient-to-br from-orange-50 to-amber-50 shadow-xl border border-orange-200">
                        <div class="card-body">
                            <h3 class="card-title text-orange-800 mb-6"><i class="fas fa-lightbulb mr-2"></i>Contemporary Relevance</h3>
                            <div class="grid md:grid-cols-3 gap-6">
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-balance-scale text-orange-600 text-2xl"></i>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 mb-2">Balanced Approach</h4>
                                    <p class="text-gray-600 text-sm">
                                        Offers a middle path between extreme dualism and absolute non-dualism
                                    </p>
                                </div>
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-heart text-orange-600 text-2xl"></i>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 mb-2">Devotional Practice</h4>
                                    <p class="text-gray-600 text-sm">
                                        Emphasizes love and surrender as paths to spiritual realization
                                    </p>
                                </div>
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-people-group text-orange-600 text-2xl"></i>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 mb-2">Community Focus</h4>
                                    <p class="text-gray-600 text-sm">
                                        Builds spiritual communities centered on collective worship
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Acharyas Navigation -->
        <div class="bg-gradient-to-r from-orange-50 to-amber-50 py-12 mt-16">
            <div class="container mx-auto px-4">
                <h3 class="text-2xl font-bold text-orange-800 text-center mb-8">Explore Other Acharyas</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="card bg-white hover:shadow-xl transition-shadow border border-orange-100">
                        <div class="card-body text-center">
                            <div class="avatar">
                                <div class="w-20 h-20 rounded-full mx-auto mb-4">
                                    <img src="https://images.unsplash.com/photo-1566753323558-f4e0952af115?w=100&h=100&fit=crop&crop=face" alt="Acharya Ramanuja" class="w-full h-full object-cover rounded-full" />
                                </div>
                            </div>
                            <h4 class="card-title text-center text-orange-800">Acharya Ramanuja</h4>
                            <p class="text-gray-600 text-sm">Vishishtadvaita Philosophy</p>
                            <div class="card-actions justify-center mt-4">
                                <button class="btn btn-outline btn-primary btn-sm">Learn More</button>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-white hover:shadow-xl transition-shadow border border-orange-100">
                        <div class="card-body text-center">
                            <div class="avatar">
                                <div class="w-20 h-20 rounded-full mx-auto mb-4">
                                    <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=100&h=100&fit=crop&crop=face" alt="Acharya Madhva" class="w-full h-full object-cover rounded-full" />
                                </div>
                            </div>
                            <h4 class="card-title text-center text-orange-800">Acharya Madhva</h4>
                            <p class="text-gray-600 text-sm">Dvaita Philosophy</p>
                            <div class="card-actions justify-center mt-4">
                                <button class="btn btn-outline btn-primary btn-sm">Learn More</button>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-white hover:shadow-xl transition-shadow border border-orange-100">
                        <div class="card-body text-center">
                            <div class="avatar">
                                <div class="w-20 h-20 rounded-full mx-auto mb-4">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face" alt="Acharya Vallabha" class="w-full h-full object-cover rounded-full" />
                                </div>
                            </div>
                            <h4 class="card-title text-center text-orange-800">Acharya Vallabha</h4>
                            <p class="text-gray-600 text-sm">Shuddhadvaita Philosophy</p>
                            <div class="card-actions justify-center mt-4">
                                <button class="btn btn-outline btn-primary btn-sm">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Modal -->
        <div x-show="showModal" x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 bg-black bg-opacity-75 flex items-center justify-center p-4" @click="showModal = false">
            <div class="relative max-w-4xl max-h-full">
                <img :src="modalImage" :alt="modalAlt" class="max-w-full max-h-full object-contain rounded-lg" />
                <button @click="showModal = false" class="absolute top-4 right-4 btn btn-circle btn-ghost text-white hover:bg-white hover:bg-opacity-20">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Floating Action Button -->
        <div class="fixed bottom-6 right-6 z-40">
            <div class="dropdown dropdown-top dropdown-end">
                <div tabindex="0" role="button" class="btn btn-circle btn-primary btn-lg shadow-lg">
                    <i class="fas fa-share-alt"></i>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52 mb-2">
                    <li>
                        <a href="#" class="flex items-center"><i class="fas fa-bookmark mr-2"></i>Bookmark</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center"><i class="fas fa-print mr-2"></i>Print</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center"><i class="fas fa-share mr-2"></i>Share</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center"><i class="fas fa-download mr-2"></i>Download PDF</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Reading Progress Indicator -->
        <div class="fixed top-0 left-0 w-full h-1 bg-gray-200 z-50">
            <div class="h-full bg-gradient-to-r from-orange-500 to-amber-500 transition-all duration-300" :style="`width: ${scrollProgress}%`"></div>
        </div>
    </div>
    <script>
        function acharyaPage() {
            return {
                activeTab: 'biography'
                , showModal: false
                , modalImage: ''
                , modalAlt: ''
                , scrollProgress: 0,

                init() {
                    // Initialize scroll progress tracking
                    window.addEventListener('scroll', () => {
                        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                        this.scrollProgress = (winScroll / height) * 100;
                    });

                    // Add smooth scrolling to tab changes
                    this.$watch('activeTab', () => {
                        document.querySelector('.container').scrollIntoView({
                            behavior: 'smooth'
                            , block: 'start'
                        });
                    });
                },

                openImageModal(src, alt) {
                    this.modalImage = src;
                    this.modalAlt = alt;
                    this.showModal = true;
                    document.body.style.overflow = 'hidden';
                },

                closeModal() {
                    this.showModal = false;
                    document.body.style.overflow = 'auto';
                }
            }
        }

        // Add tooltips for Sanskrit terms
        document.addEventListener('DOMContentLoaded', function() {
            // Add tooltip functionality
            const sanskritTerms = document.querySelectorAll('[data-tooltip]');
            sanskritTerms.forEach(term => {
                term.addEventListener('mouseenter', function() {
                    // Tooltip implementation could go here
                });
            });
        });

    </script>

    <style>
        .quote-card {
            position: relative;
        }

        .quote-card::before {
            content: '"';
            font-size: 4rem;
            color: rgba(251, 146, 60, 0.3);
            position: absolute;
            top: -10px;
            left: 10px;
            font-family: serif;
        }

        .timeline-box {
            transition: transform 0.2s ease;
        }

        .timeline-box:hover {
            transform: translateY(-2px);
        }

        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .btn {
            transition: all 0.2s ease;
        }

        .tab {
            transition: all 0.2s ease;
        }

        .tab:hover {
            background-color: rgba(251, 146, 60, 0.1);
        }

        /* Custom scrollbar for better UX */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #fb923c;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ea580c;
        }

    </style>
</div>
