<div>
    <div x-data="sevaOpportunities()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero py-20">
            <div class="hero-content text-center">
                <div class="max-w-2xl">
                    <h1 class="text-5xl font-bold text-800 mb-4">सेवा के अवसर</h1>
                    <h2 class="text-3xl font-semibold text-700 mb-6">Seva Opportunities</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Join our sacred mission through selfless service. Every act of seva is an offering to Radha Krishna and a step towards spiritual growth.
                    </p>
                    <div class="flex justify-center mt-8">
                        <div class="stats stats-horizontal shadow">
                            <div class="stat text-center">
                                <div class="stat-value text-600">50+</div>
                                <div class="stat-desc">Active Sevaks</div>
                            </div>
                            <div class="stat text-center">
                                <div class="stat-value text-600">15</div>
                                <div class="stat-desc">Seva Categories</div>
                            </div>
                            <div class="stat text-center">
                                <div class="stat-value text-600">24/7</div>
                                <div class="stat-desc">Service Hours</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-wrap gap-4 justify-center mb-8">
                <button @click="activeFilter = 'all'" class="btn btn-sm" :class="activeFilter === 'all' ? 'btn-primary' : 'btn-outline btn-primary'">
                    All Seva
                </button>
                <button @click="activeFilter = 'devotional'" class="btn btn-sm" :class="activeFilter === 'devotional' ? 'btn-primary' : 'btn-outline btn-primary'">
                    Devotional
                </button>
                <button @click="activeFilter = 'administrative'" class="btn btn-sm" :class="activeFilter === 'administrative' ? 'btn-primary' : 'btn-outline btn-primary'">
                    Administrative
                </button>
                <button @click="activeFilter = 'physical'" class="btn btn-sm" :class="activeFilter === 'physical' ? 'btn-primary' : 'btn-outline btn-primary'">
                    Physical
                </button>
                <button @click="activeFilter = 'educational'" class="btn btn-sm" :class="activeFilter === 'educational' ? 'btn-primary' : 'btn-outline btn-primary'">
                    Educational
                </button>
                <button @click="activeFilter = 'technical'" class="btn btn-sm" :class="activeFilter === 'technical' ? 'btn-primary' : 'btn-outline btn-primary'">
                    Technical
                </button>
            </div>

            <!-- Seva Cards Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="seva in filteredSevas" :key="seva.id">
                    <div class="card bg-base-100 shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300">
                        <div class="card-body">
                            <!-- Header -->
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center">
                                    <i :class="seva.icon" class="text-3xl text-500 mr-3"></i>
                                    <div>
                                        <h3 class="card-title text-800" x-text="seva.title"></h3>
                                        <p class="text-sm text-gray-500" x-text="seva.subtitle"></p>
                                    </div>
                                </div>
                                <div class="badge badge-outline" x-text="seva.urgency" :class="{
                                         'badge-error': seva.urgency === 'Urgent',
                                         'badge-warning': seva.urgency === 'High',
                                         'badge-info': seva.urgency === 'Medium',
                                         'badge-success': seva.urgency === 'Low'
                                     }">
                                </div>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-600 mb-4" x-text="seva.description"></p>

                            <!-- Skills & Time -->
                            <div class="mb-4">
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <template x-for="skill in seva.skills">
                                        <span class="badge badge-primary badge-sm" x-text="skill"></span>
                                    </template>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-clock mr-2"></i>
                                    <span x-text="seva.timeCommitment"></span>
                                </div>
                            </div>

                            <!-- Benefits -->
                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-700 mb-2">What you'll gain:</h4>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <template x-for="benefit in seva.benefits">
                                        <li class="flex items-center">
                                            <i class="fas fa-star text-amber-500 mr-2 text-xs"></i>
                                            <span x-text="benefit"></span>
                                        </li>
                                    </template>
                                </ul>
                            </div>

                            <!-- Action Buttons -->
                            <div class="card-actions justify-between">
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-500">
                                        <i class="fas fa-users mr-1"></i>
                                        <span x-text="seva.currentVolunteers + '/' + seva.maxVolunteers"></span>
                                    </span>
                                </div>
                                <div class="flex gap-2">
                                    <button @click="viewDetails(seva)" class="btn btn-sm btn-outline btn-primary">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Details
                                    </button>
                                    <button @click="applyForSeva(seva)" class="btn btn-sm btn-primary">
                                        <i class="fas fa-hand-heart mr-1"></i>
                                        Apply
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Details Modal -->
        <div class="modal" :class="{'modal-open': showDetailsModal}">
            <div class="modal-box max-w-3xl">
                <template x-if="selectedSeva">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <i :class="selectedSeva.icon" class="text-4xl text-500 mr-4"></i>
                                <div>
                                    <h3 class="text-2xl font-bold text-800" x-text="selectedSeva.title"></h3>
                                    <p class="text-gray-600" x-text="selectedSeva.subtitle"></p>
                                </div>
                            </div>
                            <button @click="showDetailsModal = false" class="btn btn-sm btn-circle btn-ghost">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                        <div class="space-y-6">
                            <!-- Full Description -->
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2">Detailed Description</h4>
                                <p class="text-gray-600" x-text="selectedSeva.fullDescription"></p>
                            </div>

                            <!-- Responsibilities -->
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2">Key Responsibilities</h4>
                                <ul class="list-disc list-inside text-gray-600 space-y-1">
                                    <template x-for="responsibility in selectedSeva.responsibilities">
                                        <li x-text="responsibility"></li>
                                    </template>
                                </ul>
                            </div>

                            <!-- Requirements -->
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2">Requirements</h4>
                                <ul class="list-disc list-inside text-gray-600 space-y-1">
                                    <template x-for="requirement in selectedSeva.requirements">
                                        <li x-text="requirement"></li>
                                    </template>
                                </ul>
                            </div>

                            <!-- Schedule -->
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2">Schedule & Commitment</h4>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-gray-700"><strong>Time:</strong> <span x-text="selectedSeva.timeCommitment"></span></p>
                                    <p class="text-gray-700"><strong>Duration:</strong> <span x-text="selectedSeva.duration"></span></p>
                                    <p class="text-gray-700"><strong>Flexibility:</strong> <span x-text="selectedSeva.flexibility"></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="modal-action">
                            <button @click="showDetailsModal = false" class="btn btn-outline">Close</button>
                            <button @click="applyFromModal()" class="btn btn-primary">
                                <i class="fas fa-hand-heart mr-2"></i>
                                Apply Now
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Application Modal -->
        <div class="modal" :class="{'modal-open': showApplicationModal}">
            <div class="modal-box max-w-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-800">Apply for Seva</h3>
                    <button @click="closeApplicationModal()" class="btn btn-sm btn-circle btn-ghost">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Success Alert -->
                <div x-show="showSuccess" x-transition class="alert alert-success mb-6">
                    <i class="fas fa-check-circle"></i>
                    <span>Your seva application has been submitted successfully! We'll contact you soon.</span>
                </div>

                <form @submit.prevent="submitApplication" class="space-y-4">
                    <!-- Personal Info -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Full Name *</span>
                            </label>
                            <input type="text" x-model="application.name" class="input input-bordered focus:input-primary" required>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Email *</span>
                            </label>
                            <input type="email" x-model="application.email" class="input input-bordered focus:input-primary" required>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Phone *</span>
                            </label>
                            <input type="tel" x-model="application.phone" class="input input-bordered focus:input-primary" required>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Age</span>
                            </label>
                            <input type="number" x-model="application.age" class="input input-bordered focus:input-primary" min="16" max="80">
                        </div>
                    </div>

                    <!-- Availability -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Available Days *</span>
                        </label>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="day in ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']">
                                <label class="label cursor-pointer flex items-center">
                                    <input type="checkbox" :value="day" x-model="application.availableDays" class="checkbox checkbox-primary checkbox-sm mr-2">
                                    <span class="label-text" x-text="day"></span>
                                </label>
                            </template>
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Available Time Slots</span>
                        </label>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="slot in ['Early Morning (5-8 AM)', 'Morning (8-12 PM)', 'Afternoon (12-4 PM)', 'Evening (4-8 PM)', 'Night (8-10 PM)']">
                                <label class="label cursor-pointer flex items-center">
                                    <input type="checkbox" :value="slot" x-model="application.timeSlots" class="checkbox checkbox-primary checkbox-sm mr-2">
                                    <span class="label-text text-sm" x-text="slot"></span>
                                </label>
                            </template>
                        </div>
                    </div>

                    <!-- Experience -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Relevant Experience</span>
                        </label>
                        <textarea x-model="application.experience" class="textarea textarea-bordered focus:textarea-primary h-24" placeholder="Share any relevant experience, skills, or previous seva work..."></textarea>
                    </div>

                    <!-- Motivation -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Why do you want to serve? *</span>
                        </label>
                        <textarea x-model="application.motivation" class="textarea textarea-bordered focus:textarea-primary h-24" placeholder="Tell us about your motivation for this seva..." required></textarea>
                    </div>

                    <!-- Terms -->
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start">
                            <input type="checkbox" x-model="application.agreeTerms" class="checkbox checkbox-primary mr-3" required>
                            <span class="label-text">I agree to follow ashram rules and commit to regular seva attendance *</span>
                        </label>
                    </div>

                    <div class="modal-action">
                        <button type="button" @click="closeApplicationModal()" class="btn btn-outline">Cancel</button>
                        <button type="submit" class="btn btn-primary" :disabled="isSubmitting">
                            <span x-show="!isSubmitting">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Submit Application
                            </span>
                            <span x-show="isSubmitting">Submitting...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function sevaOpportunities() {
            return {
                activeFilter: 'all'
                , showDetailsModal: false
                , showApplicationModal: false
                , showSuccess: false
                , isSubmitting: false
                , selectedSeva: null,

                application: {
                    name: ''
                    , email: ''
                    , phone: ''
                    , age: ''
                    , availableDays: []
                    , timeSlots: []
                    , experience: ''
                    , motivation: ''
                    , agreeTerms: false
                },

                sevas: [{
                        id: 1
                        , title: 'Temple Cleaning'
                        , subtitle: 'Deity Altar Maintenance'
                        , category: 'devotional'
                        , icon: 'fas fa-broom'
                        , description: 'Sacred cleaning of temple premises and deity altars with devotion and attention to detail.'
                        , fullDescription: 'Join our dedicated team in maintaining the sanctity and cleanliness of our beautiful temple. This seva involves daily cleaning of the deity altars, polishing brass items, and ensuring the temple environment remains pure and welcoming for all devotees.'
                        , skills: ['Attention to Detail', 'Physical Stamina', 'Devotion']
                        , timeCommitment: '2-3 hours daily'
                        , urgency: 'High'
                        , currentVolunteers: 8
                        , maxVolunteers: 12
                        , benefits: ['Direct service to deities', 'Physical purification', 'Develop discipline']
                        , responsibilities: ['Daily cleaning of altar areas', 'Polishing brass and silver items', 'Maintaining temple cleanliness standards', 'Arranging flowers and decorations']
                        , requirements: ['Physical ability to clean and lift', 'Commitment to daily attendance', 'Respectful attitude towards sacred spaces']
                        , duration: 'Minimum 3 months commitment'
                        , flexibility: 'Fixed daily schedule'
                    }
                    , {
                        id: 2
                        , title: 'Prasadam Seva'
                        , subtitle: 'Kitchen & Food Service'
                        , category: 'devotional'
                        , icon: 'fas fa-utensils'
                        , description: 'Prepare and serve blessed food offerings with love and devotion to all visitors.'
                        , fullDescription: 'Participate in the sacred preparation and distribution of prasadam. This seva includes cooking, serving meals to visitors, and maintaining kitchen cleanliness according to traditional standards.'
                        , skills: ['Cooking', 'Food Safety', 'Service Attitude']
                        , timeCommitment: '4-5 hours daily'
                        , urgency: 'Urgent'
                        , currentVolunteers: 6
                        , maxVolunteers: 10
                        , benefits: ['Learn traditional cooking', 'Serve devotees directly', 'Spiritual nourishment']
                        , responsibilities: ['Prepare daily meals and offerings', 'Serve food to visitors and residents', 'Maintain kitchen cleanliness', 'Follow traditional cooking methods']
                        , requirements: ['Basic cooking knowledge helpful', 'Food handling hygiene awareness', 'Early morning availability']
                        , duration: 'Flexible, minimum 1 month'
                        , flexibility: 'Some schedule flexibility available'
                    }
                    , {
                        id: 3
                        , title: 'Library Management'
                        , subtitle: 'Texts & Digital Archives'
                        , category: 'educational'
                        , icon: 'fas fa-book'
                        , description: 'Organize sacred texts, maintain digital archives, and assist visitors with spiritual literature.'
                        , fullDescription: 'Help preserve and organize our extensive collection of spiritual texts and digital media. This seva involves cataloging books, maintaining digital archives, and helping visitors find appropriate spiritual literature.'
                        , skills: ['Organization', 'Computer Skills', 'Sanskrit Knowledge']
                        , timeCommitment: '3-4 hours, 3 days/week'
                        , urgency: 'Medium'
                        , currentVolunteers: 3
                        , maxVolunteers: 6
                        , benefits: ['Access to rare texts', 'Develop scholarly skills', 'Preserve tradition']
                        , responsibilities: ['Catalog and organize books', 'Maintain digital databases', 'Assist visitors with research', 'Preserve rare manuscripts']
                        , requirements: ['Basic computer skills', 'Interest in spiritual literature', 'Organizational abilities']
                        , duration: 'Long-term preferred'
                        , flexibility: 'Very flexible schedule'
                    }
                    , {
                        id: 4
                        , title: 'Website Development'
                        , subtitle: 'Technical & Digital Seva'
                        , category: 'technical'
                        , icon: 'fas fa-code'
                        , description: 'Develop and maintain digital platforms to spread spiritual knowledge worldwide.'
                        , fullDescription: 'Use your technical skills to serve the mission by developing websites, mobile apps, and digital tools that help spread Nimbarka teachings to a global audience.'
                        , skills: ['Web Development', 'PHP/Laravel', 'Mobile Apps']
                        , timeCommitment: '10-15 hours/week'
                        , urgency: 'High'
                        , currentVolunteers: 2
                        , maxVolunteers: 5
                        , benefits: ['Use skills for spiritual purpose', 'Remote work possible', 'Technical growth']
                        , responsibilities: ['Develop and maintain websites', 'Create mobile applications', 'Manage databases and content', 'Provide technical support']
                        , requirements: ['Proven development experience', 'Portfolio of previous work', 'Commitment to quality']
                        , duration: 'Project-based, 6 months+'
                        , flexibility: 'Remote work possible'
                    }
                    , {
                        id: 5
                        , title: 'Guest Relations'
                        , subtitle: 'Visitor Welcome & Support'
                        , category: 'administrative'
                        , icon: 'fas fa-handshake'
                        , description: 'Welcome and guide visitors, coordinate accommodations, and provide spiritual guidance.'
                        , fullDescription: 'Be the welcoming face of our ashram by helping visitors feel at home, coordinating their stay, and providing initial spiritual guidance and orientation.'
                        , skills: ['Communication', 'Hindi/English', 'Hospitality']
                        , timeCommitment: '6-8 hours daily'
                        , urgency: 'High'
                        , currentVolunteers: 4
                        , maxVolunteers: 8
                        , benefits: ['Meet diverse people', 'Develop communication skills', 'Practice compassion']
                        , responsibilities: ['Welcome and orient new visitors', 'Coordinate accommodation arrangements', 'Provide basic spiritual guidance', 'Handle visitor queries and concerns']
                        , requirements: ['Excellent communication skills', 'Patient and friendly demeanor', 'Basic knowledge of ashram activities']
                        , duration: 'Minimum 2 months'
                        , flexibility: 'Shift-based scheduling'
                    }
                    , {
                        id: 6
                        , title: 'Garden Maintenance'
                        , subtitle: 'Landscaping & Plant Care'
                        , category: 'physical'
                        , icon: 'fas fa-seedling'
                        , description: 'Maintain beautiful gardens, grow organic vegetables, and create peaceful natural spaces.'
                        , fullDescription: 'Help create and maintain the beautiful natural environment of our ashram through gardening, landscaping, and organic farming activities.'
                        , skills: ['Gardening', 'Physical Work', 'Plant Knowledge']
                        , timeCommitment: '3-4 hours daily'
                        , urgency: 'Medium'
                        , currentVolunteers: 5
                        , maxVolunteers: 8
                        , benefits: ['Connect with nature', 'Physical exercise', 'Grow organic food']
                        , responsibilities: ['Plant and maintain gardens', 'Water and care for plants', 'Harvest vegetables and fruits', 'Maintain garden tools and equipment']
                        , requirements: ['Physical ability for outdoor work', 'Interest in gardening', 'Early morning availability']
                        , duration: 'Seasonal commitment preferred'
                        , flexibility: 'Weather-dependent scheduling'
                    }
                ],

                get filteredSevas() {
                    if (this.activeFilter === 'all') {
                        return this.sevas;
                    }
                    return this.sevas.filter(seva => seva.category === this.activeFilter);
                },

                viewDetails(seva) {
                    this.selectedSeva = seva;
                    this.showDetailsModal = true;
                },

                applyForSeva(seva) {
                    this.selectedSeva = seva;
                    this.showApplicationModal = true;
                },

                applyFromModal() {
                    this.showDetailsModal = false;
                    this.showApplicationModal = true;
                },

                closeApplicationModal() {
                    this.showApplicationModal = false;
                    this.showSuccess = false;
                    this.resetApplication();
                },

                resetApplication() {
                    this.application = {
                        name: ''
                        , email: ''
                        , phone: ''
                        , age: ''
                        , availableDays: []
                        , timeSlots: []
                        , experience: ''
                        , motivation: ''
                        , agreeTerms: false
                    };
                },

                async submitApplication() {
                    this.isSubmitting = true;

                    try {
                        // Simulate API call
                        await new Promise(resolve => setTimeout(resolve, 2000));

                        this.showSuccess = true;

                        // Hide success message and close modal after 3 seconds
                        setTimeout(() => {
                            this.closeApplicationModal();
                        }, 3000);

                    } catch (error) {
                        console.error('Application submission failed:', error);
                    } finally {
                        this.isSubmitting = false;
                    }
                }
            }
        }

    </script>
</div>
