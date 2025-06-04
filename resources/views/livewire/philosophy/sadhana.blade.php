<div>
    <div x-data="sadhanaTracker()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-gradient-to-br from-purple-100 via-blue-50 to-orange-50 py-20">
            <div class="hero-content text-center">
                <div class="max-w-4xl">
                    <h1 class="text-6xl font-bold bg-gradient-to-r from-purple-600 to-orange-600 bg-clip-text text-transparent mb-4">साधना</h1>
                    <h2 class="text-3xl font-semibold text-gray-800 mb-6">The Path of Spiritual Practice</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                        Transform your consciousness through disciplined practice, devotion, and surrender to Radha-Krishna.
                        Follow the ancient path laid down by our acharyas.
                    </p>
                </div>
            </div>
        </div>

        <!-- Progress Overview -->
        <div class="container mx-auto px-4 py-8">
            <div class="card bg-gradient-to-r from-blue-50 to-purple-50 shadow-xl border border-purple-200 mb-12">
                <div class="card-body">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-purple-800">Your Sadhana Journey</h3>
                        <button @click="resetProgress" class="btn btn-ghost btn-sm text-purple-600">
                            <i class="fas fa-refresh mr-2"></i>Reset
                        </button>
                    </div>

                    <div class="grid md:grid-cols-4 gap-4">
                        <div class="stat bg-white rounded-lg shadow">
                            <div class="stat-figure text-blue-500">
                                <i class="fas fa-pray text-2xl"></i>
                            </div>
                            <div class="stat-title">Practices Completed</div>
                            <div class="stat-value text-blue-600" x-text="completedPractices"></div>
                            <div class="stat-desc text-blue-500">out of 12 core practices</div>
                        </div>

                        <div class="stat bg-white rounded-lg shadow">
                            <div class="stat-figure text-purple-500">
                                <i class="fas fa-chart-line text-2xl"></i>
                            </div>
                            <div class="stat-title">Progress</div>
                            <div class="stat-value text-purple-600" x-text="Math.round((completedPractices/12)*100) + '%'"></div>
                            <div class="stat-desc text-purple-500">overall completion</div>
                        </div>

                        <div class="stat bg-white rounded-lg shadow">
                            <div class="stat-figure text-orange-500">
                                <i class="fas fa-calendar-day text-2xl"></i>
                            </div>
                            <div class="stat-title">Current Stage</div>
                            <div class="stat-value text-orange-600 text-lg" x-text="currentStage"></div>
                            <div class="stat-desc text-orange-500">of spiritual development</div>
                        </div>

                        <div class="stat bg-white rounded-lg shadow">
                            <div class="stat-figure text-green-500">
                                <i class="fas fa-star text-2xl"></i>
                            </div>
                            <div class="stat-title">Next Milestone</div>
                            <div class="stat-value text-green-600 text-lg" x-text="nextMilestone"></div>
                            <div class="stat-desc text-green-500">upcoming achievement</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sadhana Stages -->
        <div class="container mx-auto px-4 pb-16">
            <!-- Stage 1: Foundation -->
            <div class="mb-16">
                <div class="flex items-center mb-8">
                    <div class="badge badge-primary badge-lg mr-4">Stage 1</div>
                    <h3 class="text-3xl font-bold text-gray-800">आधार - Foundation</h3>
                </div>

                <div class="grid lg:grid-cols-2 gap-8">
                    <!-- Practice Cards -->
                    <template x-for="practice in foundationPractices" :key="practice.id">
                        <div class="card bg-base-100 shadow-lg border border-blue-100" :class="{'ring-2 ring-blue-300': practice.completed}">
                            <div class="card-body">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="checkbox-wrapper mr-4">
                                            <input type="checkbox" :id="'practice-' + practice.id" x-model="practice.completed" @change="updateProgress" class="checkbox checkbox-primary">
                                        </div>
                                        <div>
                                            <h4 class="card-title text-blue-800" x-text="practice.name"></h4>
                                            <p class="text-sm text-blue-600" x-text="practice.sanskrit"></p>
                                        </div>
                                    </div>
                                    <div class="badge" :class="practice.completed ? 'badge-success' : 'badge-outline'">
                                        <i :class="practice.completed ? 'fas fa-check' : 'far fa-circle'"></i>
                                    </div>
                                </div>

                                <p class="text-gray-600 mb-4" x-text="practice.description"></p>

                                <div class="collapse collapse-arrow bg-blue-50">
                                    <input type="checkbox" :id="'details-' + practice.id">
                                    <div class="collapse-title text-sm font-medium text-blue-700">
                                        Practice Details & Benefits
                                    </div>
                                    <div class="collapse-content text-sm">
                                        <div class="space-y-3">
                                            <div>
                                                <h5 class="font-semibold text-blue-800">How to Practice:</h5>
                                                <p class="text-gray-700" x-text="practice.howTo"></p>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-blue-800">Benefits:</h5>
                                                <p class="text-gray-700" x-text="practice.benefits"></p>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-blue-800">Duration:</h5>
                                                <p class="text-gray-700" x-text="practice.duration"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Stage 2: Development -->
            <div class="mb-16">
                <div class="flex items-center mb-8">
                    <div class="badge badge-secondary badge-lg mr-4">Stage 2</div>
                    <h3 class="text-3xl font-bold text-gray-800">विकास - Development</h3>
                </div>

                <div class="grid lg:grid-cols-2 gap-8">
                    <template x-for="practice in developmentPractices" :key="practice.id">
                        <div class="card bg-base-100 shadow-lg border border-purple-100" :class="{'ring-2 ring-purple-300': practice.completed, 'opacity-60': !canAccessStage2}">
                            <div class="card-body">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="checkbox-wrapper mr-4">
                                            <input type="checkbox" :id="'practice-' + practice.id" x-model="practice.completed" @change="updateProgress" :disabled="!canAccessStage2" class="checkbox checkbox-secondary">
                                        </div>
                                        <div>
                                            <h4 class="card-title text-purple-800" x-text="practice.name"></h4>
                                            <p class="text-sm text-purple-600" x-text="practice.sanskrit"></p>
                                        </div>
                                    </div>
                                    <div class="badge" :class="practice.completed ? 'badge-success' : 'badge-outline'">
                                        <i :class="practice.completed ? 'fas fa-check' : 'far fa-circle'"></i>
                                    </div>
                                </div>

                                <p class="text-gray-600 mb-4" x-text="practice.description"></p>

                                <div x-show="!canAccessStage2" class="alert alert-warning mb-4">
                                    <i class="fas fa-lock"></i>
                                    <span>Complete Stage 1 foundation practices to unlock</span>
                                </div>

                                <div class="collapse collapse-arrow bg-purple-50" x-show="canAccessStage2">
                                    <input type="checkbox" :id="'details-' + practice.id">
                                    <div class="collapse-title text-sm font-medium text-purple-700">
                                        Practice Details & Benefits
                                    </div>
                                    <div class="collapse-content text-sm">
                                        <div class="space-y-3">
                                            <div>
                                                <h5 class="font-semibold text-purple-800">How to Practice:</h5>
                                                <p class="text-gray-700" x-text="practice.howTo"></p>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-purple-800">Benefits:</h5>
                                                <p class="text-gray-700" x-text="practice.benefits"></p>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-purple-800">Duration:</h5>
                                                <p class="text-gray-700" x-text="practice.duration"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Stage 3: Mastery -->
            <div class="mb-16">
                <div class="flex items-center mb-8">
                    <div class="badge badge-accent badge-lg mr-4">Stage 3</div>
                    <h3 class="text-3xl font-bold text-gray-800">निपुणता - Mastery</h3>
                </div>

                <div class="grid lg:grid-cols-2 gap-8">
                    <template x-for="practice in masteryPractices" :key="practice.id">
                        <div class="card bg-base-100 shadow-lg border border-orange-100" :class="{'ring-2 ring-orange-300': practice.completed, 'opacity-60': !canAccessStage3}">
                            <div class="card-body">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex items-center">
                                        <div class="checkbox-wrapper mr-4">
                                            <input type="checkbox" :id="'practice-' + practice.id" x-model="practice.completed" @change="updateProgress" :disabled="!canAccessStage3" class="checkbox checkbox-accent">
                                        </div>
                                        <div>
                                            <h4 class="card-title text-orange-800" x-text="practice.name"></h4>
                                            <p class="text-sm text-orange-600" x-text="practice.sanskrit"></p>
                                        </div>
                                    </div>
                                    <div class="badge" :class="practice.completed ? 'badge-success' : 'badge-outline'">
                                        <i :class="practice.completed ? 'fas fa-check' : 'far fa-circle'"></i>
                                    </div>
                                </div>

                                <p class="text-gray-600 mb-4" x-text="practice.description"></p>

                                <div x-show="!canAccessStage3" class="alert alert-warning mb-4">
                                    <i class="fas fa-lock"></i>
                                    <span>Complete Stage 2 development practices to unlock</span>
                                </div>

                                <div class="collapse collapse-arrow bg-orange-50" x-show="canAccessStage3">
                                    <input type="checkbox" :id="'details-' + practice.id">
                                    <div class="collapse-title text-sm font-medium text-orange-700">
                                        Practice Details & Benefits
                                    </div>
                                    <div class="collapse-content text-sm">
                                        <div class="space-y-3">
                                            <div>
                                                <h5 class="font-semibold text-orange-800">How to Practice:</h5>
                                                <p class="text-gray-700" x-text="practice.howTo"></p>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-orange-800">Benefits:</h5>
                                                <p class="text-gray-700" x-text="practice.benefits"></p>
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-orange-800">Duration:</h5>
                                                <p class="text-gray-700" x-text="practice.duration"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Completion Achievement -->
            <div x-show="completedPractices === 12" x-transition class="text-center">
                <div class="card bg-gradient-to-r from-yellow-100 to-orange-100 shadow-2xl border-2 border-yellow-300">
                    <div class="card-body">
                        <div class="text-6xl mb-4">🏆</div>
                        <h3 class="text-3xl font-bold text-orange-800 mb-4">साधना सिद्धि</h3>
                        <h4 class="text-2xl font-semibold text-orange-700 mb-6">Sadhana Mastery Achieved!</h4>
                        <p class="text-lg text-gray-700 mb-6">
                            You have completed all stages of spiritual practice. Continue deepening your realization
                            and prepare for the ultimate goal of Moksha.
                        </p>
                        <div class="flex justify-center gap-4">
                            <button class="btn btn-primary">
                                <i class="fas fa-arrow-right mr-2"></i>
                                Explore Moksha
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-share mr-2"></i>
                                Share Achievement
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sadhanaTracker() {
            return {
                foundationPractices: [{
                        id: 1
                        , name: "Daily Sandhya Vandana"
                        , sanskrit: "संध्या वन्दना"
                        , description: "Morning and evening prayers to purify the mind and connect with divine consciousness."
                        , howTo: "Perform at sunrise and sunset. Face east in morning, west in evening. Recite prescribed mantras while offering water to the sun."
                        , benefits: "Establishes daily rhythm with cosmic cycles, purifies subtle body, develops discipline and devotion."
                        , duration: "15-20 minutes, twice daily"
                        , completed: false
                    }
                    , {
                        id: 2
                        , name: "Japa Meditation"
                        , sanskrit: "जप साधना"
                        , description: "Repetitive chanting of Krishna mantras to focus the mind and develop one-pointed concentration."
                        , howTo: "Use mala beads, chant 'Radhe Krishna' or Maha Mantra 108 times minimum. Focus on sound vibration."
                        , benefits: "Calms mental fluctuations, develops concentration, creates positive samskaras in the subconscious."
                        , duration: "30 minutes daily, preferably early morning"
                        , completed: false
                    }
                    , {
                        id: 3
                        , name: "Scripture Study"
                        , sanskrit: "स्वाध्याय"
                        , description: "Regular study of Nimbarka philosophy texts to develop right understanding."
                        , howTo: "Read Vedanta Parijata Saurabha daily. Contemplate meanings, discuss with advanced practitioners."
                        , benefits: "Develops discriminative wisdom, removes philosophical doubts, guides practical application."
                        , duration: "45 minutes daily study"
                        , completed: false
                    }
                    , {
                        id: 4
                        , name: "Ethical Living"
                        , sanskrit: "यम नियम"
                        , description: "Following moral principles and observances to purify character and actions."
                        , howTo: "Practice ahimsa, truthfulness, celibacy, non-attachment. Observe cleanliness, contentment, austerity."
                        , benefits: "Creates foundation for advanced practices, develops inner purity, establishes dharmic lifestyle."
                        , duration: "Continuous lifestyle practice"
                        , completed: false
                    }
                ],

                developmentPractices: [{
                        id: 5
                        , name: "Pranayama Practice"
                        , sanskrit: "प्राणायाम"
                        , description: "Breath control techniques to regulate life energy and prepare for meditation."
                        , howTo: "Practice Nadi Shodhana, Bhramari, and Ujjayi pranayama. Start with 5 minutes, gradually increase."
                        , benefits: "Balances nervous system, increases concentration, prepares mind for deeper states."
                        , duration: "20-30 minutes daily"
                        , completed: false
                    }
                    , {
                        id: 6
                        , name: "Deity Meditation"
                        , sanskrit: "देव ध्यान"
                        , description: "Visualization and meditation on Radha-Krishna's divine form and qualities."
                        , howTo: "Sit in meditation posture, visualize divine couple, focus on their beauty, qualities, and pastimes."
                        , benefits: "Develops devotional feelings, purifies emotions, establishes divine connection."
                        , duration: "45 minutes daily"
                        , completed: false
                    }
                    , {
                        id: 7
                        , name: "Seva Practice"
                        , sanskrit: "सेवा साधना"
                        , description: "Selfless service to develop ego-transcendence and devotional attitude."
                        , howTo: "Serve in temple, help community members, care for environment. Offer all actions to Krishna."
                        , benefits: "Reduces ego-centeredness, develops compassion, transforms work into worship."
                        , duration: "2-3 hours weekly"
                        , completed: false
                    }
                    , {
                        id: 8
                        , name: "Kirtan Participation"
                        , sanskrit: "कीर्तन साधना"
                        , description: "Devotional singing and dancing to express and cultivate divine love."
                        , howTo: "Join community kirtan, sing with full heart, allow emotions to flow naturally towards Krishna."
                        , benefits: "Develops bhakti rasa, purifies heart, creates spiritual community bonds."
                        , duration: "1-2 hours weekly"
                        , completed: false
                    }
                ],

                masteryPractices: [{
                        id: 9
                        , name: "Advanced Samadhi"
                        , sanskrit: "समाधि साधना"
                        , description: "Deep absorption states where individual consciousness merges with divine consciousness."
                        , howTo: "After mastering concentration, allow awareness to dissolve into object of meditation naturally."
                        , benefits: "Direct experience of non-dual consciousness, transcendence of subject-object duality."
                        , duration: "1-2 hours daily"
                        , completed: false
                    }
                    , {
                        id: 10
                        , name: "Continuous Remembrance"
                        , sanskrit: "सतत स्मरण"
                        , description: "Maintaining awareness of Krishna throughout all daily activities."
                        , howTo: "Keep divine names on tongue, see Krishna in all beings, offer every action as worship."
                        , benefits: "Establishes permanent connection with divine, transforms ordinary life into spiritual practice."
                        , duration: "All waking hours"
                        , completed: false
                    }
                    , {
                        id: 11
                        , name: "Guru Seva"
                        , sanskrit: "गुरु सेवा"
                        , description: "Complete surrender and service to spiritual master to transcend personal will."
                        , howTo: "Follow guru's instructions completely, serve physically and mentally, surrender personal preferences."
                        , benefits: "Destroys ego completely, receives direct transmission of realization, accelerates spiritual progress."
                        , duration: "Lifelong commitment"
                        , completed: false
                    }
                    , {
                        id: 12
                        , name: "Sahaja Bhava"
                        , sanskrit: "सहज भाव"
                        , description: "Natural, effortless state of divine love and spontaneous devotional expression."
                        , howTo: "Allow all practices to become natural expression of inner love, transcend technique-orientation."
                        , benefits: "Achieves goal of sadhana, establishes in natural divine consciousness, prepares for liberation."
                        , duration: "Spontaneous expression"
                        , completed: false
                    }
                ],

                get completedPractices() {
                    return [...this.foundationPractices, ...this.developmentPractices, ...this.masteryPractices]
                        .filter(p => p.completed).length;
                },

                get currentStage() {
                    const foundationComplete = this.foundationPractices.every(p => p.completed);
                    const developmentComplete = this.developmentPractices.every(p => p.completed);

                    if (!foundationComplete) return "Foundation";
                    if (!developmentComplete) return "Development";
                    return "Mastery";
                },

                get nextMilestone() {
                    const foundationComplete = this.foundationPractices.every(p => p.completed);
                    const developmentComplete = this.developmentPractices.every(p => p.completed);
                    const masteryComplete = this.masteryPractices.every(p => p.completed);

                    if (!foundationComplete) return "Stage 2";
                    if (!developmentComplete) return "Stage 3";
                    if (!masteryComplete) return "Moksha";
                    return "Liberation";
                },

                get canAccessStage2() {
                    return this.foundationPractices.every(p => p.completed);
                },

                get canAccessStage3() {
                    return this.canAccessStage2 && this.developmentPractices.every(p => p.completed);
                },

                updateProgress() {
                    // Auto-save progress would go here
                    console.log('Progress updated:', this.completedPractices + '/12');
                },

                resetProgress() {
                    if (confirm('Are you sure you want to reset all progress?')) {
                        [...this.foundationPractices, ...this.developmentPractices, ...this.masteryPractices]
                        .forEach(p => p.completed = false);
                    }
                }
            }
        }

    </script>
</div>
