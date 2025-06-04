<div>
    <div x-data="homePage()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero min-h-screen bg-gradient-to-br from-orange-100 via-amber-50 to-yellow-50 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-0">
                <div class="absolute top-10 left-10 text-8xl text-orange-800">🕉️</div>
                <div class="absolute top-32 right-20 text-6xl text-orange-700">🪷</div>
                <div class="absolute bottom-40 left-1/4 text-7xl text-amber-700">🙏</div>
                <div class="absolute bottom-20 right-10 text-5xl text-orange-600">🔱</div>
            </div>
            
            <div class="hero-content text-center z-10">
                <div class="max-w-4xl">
                    <!-- Main Title -->
                    <div class="mb-8">
                        <h1 class="text-6xl md:text-8xl font-bold text-orange-800 mb-4 font-serif">राधा-कृष्ण</h1>
                        <h2 class="text-4xl md:text-6xl font-bold text-orange-800 mb-2">श्री हरि व्यास निकुंज मंदिर</h2>
                        <h3 class="text-2xl md:text-3xl font-semibold text-orange-700 mb-4">Shri Hari Vyas Nikunja Mandir</h3>
                        <div class="text-lg text-gray-700 mb-6">
                            <p class="mb-2">निम्बार्क संप्रदाय • वृंदावन धाम</p>
                            <p>Nimbarka Sampradaya • Vrindavan Dham</p>
                        </div>
                    </div>

                    <!-- Subtitle -->
                    <div class="mb-8">
                        <p class="text-xl md:text-2xl text-gray-700 leading-relaxed max-w-3xl mx-auto">
                            द्वैताद्वैत दर्शन के माध्यम से राधा-कृष्ण भक्ति का शाश्वत मार्ग
                        </p>
                        <p class="text-lg md:text-xl text-gray-600 mt-4 max-w-3xl mx-auto">
                            The eternal path of Radha-Krishna Bhakti through Dvaitadvaita philosophy
                        </p>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                        <a href="/philosophy/dvaita-advaita" class="btn btn-primary btn-lg">
                            <i class="fas fa-book-open mr-2"></i>
                            Explore Philosophy
                        </a>
                        <a href="/daily-life/schedule" class="btn btn-outline btn-primary btn-lg">
                            <i class="fas fa-clock mr-2"></i>
                            Visit Schedule
                        </a>
                        <a href="/seva/donate" class="btn btn-accent btn-lg">
                            <i class="fas fa-heart mr-2"></i>
                            Support Us
                        </a>
                    </div>

                    <!-- Quick Stats -->
                    <div class="stats stats-vertical lg:stats-horizontal shadow-lg bg-white/80 backdrop-blur-sm">
                        <div class="stat place-items-center">
                            <div class="stat-title text-orange-700">Daily Aartis</div>
                            <div class="stat-value text-3xl text-orange-800">3</div>
                            <div class="stat-desc">6AM • 12PM • 7PM</div>
                        </div>
                        <div class="stat place-items-center">
                            <div class="stat-title text-orange-700">Founded</div>
                            <div class="stat-value text-3xl text-orange-800">1950</div>
                            <div class="stat-desc">75+ Years of Seva</div>
                        </div>
                        <div class="stat place-items-center">
                            <div class="stat-title text-orange-700">Lineage</div>
                            <div class="stat-value text-3xl text-orange-800">800+</div>
                            <div class="stat-desc">Years of Tradition</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <i class="fas fa-chevron-down text-2xl text-orange-600"></i>
            </div>
        </div>

        <!-- Quick Navigation Cards -->
        <section class="py-20 bg-base-100">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-orange-800 mb-4">Discover Our Ashram</h2>
                <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
                    Immerse yourself in the divine atmosphere of Vrindavan through our sacred traditions
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Philosophy Card -->
                    <div class="card bg-gradient-to-br from-orange-50 to-amber-50 shadow-xl hover:shadow-2xl transition-all duration-300 group cursor-pointer" @click="window.location.href='/philosophy/dvaita-advaita'">
                        <div class="card-body text-center">
                            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">📿</div>
                            <h3 class="card-title justify-center text-orange-800 mb-2">Philosophy</h3>
                            <p class="text-sm text-gray-600 mb-4">द्वैताद्वैत दर्शन</p>
                            <p class="text-gray-700">Explore the depths of Dvaitadvaita philosophy and Radha-Krishna Bhakti</p>
                        </div>
                    </div>

                    <!-- Parampara Card -->
                    <div class="card bg-gradient-to-br from-amber-50 to-yellow-50 shadow-xl hover:shadow-2xl transition-all duration-300 group cursor-pointer" @click="window.location.href='/parampara'">
                        <div class="card-body text-center">
                            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🙏</div>
                            <h3 class="card-title justify-center text-orange-800 mb-2">Parampara</h3>
                            <p class="text-sm text-gray-600 mb-4">गुरु शिष्य परंपरा</p>
                            <p class="text-gray-700">Learn about our sacred lineage from Nimbarkacharya to present</p>
                        </div>
                    </div>

                    <!-- Daily Life Card -->
                    <div class="card bg-gradient-to-br from-green-50 to-emerald-50 shadow-xl hover:shadow-2xl transition-all duration-300 group cursor-pointer" @click="window.location.href='/daily-life/schedule'">
                        <div class="card-body text-center">
                            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🌅</div>
                            <h3 class="card-title justify-center text-green-800 mb-2">Daily Life</h3>
                            <p class="text-sm text-gray-600 mb-4">दैनिक जीवन</p>
                            <p class="text-gray-700">Experience our daily schedule, prasadam, and ashram lifestyle</p>
                        </div>
                    </div>

                    <!-- Seva Card -->
                    <div class="card bg-gradient-to-br from-blue-50 to-cyan-50 shadow-xl hover:shadow-2xl transition-all duration-300 group cursor-pointer" @click="window.location.href='/seva/opportunities'">
                        <div class="card-body text-center">
                            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🤝</div>
                            <h3 class="card-title justify-center text-blue-800 mb-2">Seva</h3>
                            <p class="text-sm text-gray-600 mb-4">सेवा के अवसर</p>
                            <p class="text-gray-700">Join us in various seva opportunities and ashram life</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Today's Schedule -->
        <section class="py-20 bg-gradient-to-r from-orange-50 to-amber-50">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-4xl font-bold text-center text-orange-800 mb-12">Today's Schedule</h2>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <!-- Morning Aarti -->
                        <div class="card bg-white shadow-xl">
                            <div class="card-body text-center">
                                <div class="text-3xl mb-4">🌅</div>
                                <h3 class="card-title justify-center text-orange-800">Morning Aarti</h3>
                                <div class="text-2xl font-bold text-orange-600 my-4">6:00 AM</div>
                                <p class="text-gray-600">मंगला आरती</p>
                                <p class="text-sm text-gray-500 mt-2">Start your day with divine blessings</p>
                            </div>
                        </div>

                        <!-- Noon Aarti -->
                        <div class="card bg-white shadow-xl">
                            <div class="card-body text-center">
                                <div class="text-3xl mb-4">☀️</div>
                                <h3 class="card-title justify-center text-orange-800">Noon Bhog</h3>
                                <div class="text-2xl font-bold text-orange-600 my-4">12:00 PM</div>
                                <p class="text-gray-600">राजभोग आरती</p>
                                <p class="text-sm text-gray-500 mt-2">Sacred offering to the deities</p>
                            </div>
                        </div>

                        <!-- Evening Aarti -->
                        <div class="card bg-white shadow-xl">
                            <div class="card-body text-center">
                                <div class="text-3xl mb-4">🌙</div>
                                <h3 class="card-title justify-center text-orange-800">Evening Aarti</h3>
                                <div class="text-2xl font-bold text-orange-600 my-4">7:00 PM</div>
                                <p class="text-gray-600">सायं आरती</p>
                                <p class="text-sm text-gray-500 mt-2">Conclude with evening prayers</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-8">
                        <a href="/daily-life/schedule" class="btn btn-primary">
                            <i class="fas fa-calendar mr-2"></i>
                            View Full Schedule
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Content -->
        <section class="py-20 bg-base-100">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-orange-800 mb-12">Sacred Teachings</h2>
                
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Quote Card -->
                    <div class="card bg-gradient-to-br from-orange-50 to-amber-50 shadow-xl">
                        <div class="card-body">
                            <div class="text-6xl text-orange-300 mb-4">"</div>
                            <blockquote class="text-xl text-gray-700 italic mb-6 leading-relaxed">
                                राधा कृष्ण की भक्ति में ही जीव का कल्याण है। द्वैत और अद्वैत दोनों सत्य हैं, परन्तु भक्ति के बिना मोक्ष असंभव है।
                            </blockquote>
                            <p class="text-lg text-gray-600 mb-4">
                                "The welfare of the soul lies in devotion to Radha-Krishna. Both duality and non-duality are true, but without devotion, liberation is impossible."
                            </p>
                            <div class="text-right">
                                <cite class="text-orange-700 font-semibold">- Acharya Nimbarka</cite>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" @click="window.location.href='/texts/vedanta-parijata-saurabha'">
                            <div class="text-3xl mr-4">📖</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Vedanta Parijata Saurabha</h3>
                                <p class="text-sm text-gray-600">वेदान्त पारिजात सौरभ</p>
                            </div>
                            <i class="fas fa-chevron-right ml-auto text-orange-500"></i>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" @click="window.location.href='/texts/dasha-shloki'">
                            <div class="text-3xl mr-4">📜</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Dasha Shloki</h3>
                                <p class="text-sm text-gray-600">दश श्लोकी</p>
                            </div>
                            <i class="fas fa-chevron-right ml-auto text-orange-500"></i>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" @click="window.location.href='/kirtan'">
                            <div class="text-3xl mr-4">🎵</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Divine Kirtan</h3>
                                <p class="text-sm text-gray-600">भजन कीर्तन</p>
                            </div>
                            <i class="fas fa-chevron-right ml-auto text-orange-500"></i>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" @click="window.location.href='/festivals'">
                            <div class="text-3xl mr-4">🎉</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Upcoming Festivals</h3>
                                <p class="text-sm text-gray-600">आगामी त्यौहार</p>
                            </div>
                            <i class="fas fa-chevron-right ml-auto text-orange-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20 bg-gradient-to-r from-orange-600 to-amber-600 text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl font-bold mb-6">Join Our Sacred Community</h2>
                <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
                    Experience the divine love of Radha-Krishna through our ancient traditions, daily practices, and spiritual guidance in the holy land of Vrindavan.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contact" class="btn btn-secondary btn-lg">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Visit Us
                    </a>
                    <a href="/seva/ashram-life" class="btn btn-outline btn-lg border-white text-white hover:bg-white hover:text-orange-600">
                        <i class="fas fa-home mr-2"></i>
                        Ashram Life
                    </a>
                    <a href="/seva/donate" class="btn btn-accent btn-lg">
                        <i class="fas fa-heart mr-2"></i>
                        Donate
                    </a>
                </div>
            </div>
        </section>
    </div>

    <script>
        function homePage() {
            return {
                init() {
                    // Any initialization logic
                    console.log('Home page loaded');
                },
                
                // Add any interactive functions here
                navigateTo(path) {
                    window.location.href = path;
                }
            }
        }
    </script>
</div>
