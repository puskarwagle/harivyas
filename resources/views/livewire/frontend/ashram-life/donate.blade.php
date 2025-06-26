<div>
    <div x-data="donationForm()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero py-16">
            <div class="hero-content text-center">
                <div class="max-w-2xl">
                    <h1 class="text-5xl font-bold text-primary mb-4">दान करें</h1>
                    <h2 class="text-2xl font-semibold text-primary mb-4">Support Our Mission</h2>
                    <p class="text-lg text-base-content mb-6">Your generous contribution helps us preserve ancient wisdom, serve devotees, and spread the teachings of Nimbarka Sampradaya</p>
                    <div class="stats shadow bg-base-100 border border-primary">
                        <div class="stat">
                            <div class="stat-title text-primary">This Month</div>
                            <div class="stat-value text-primary">₹2,45,000</div>
                            <div class="stat-desc text-primary">↗︎ 12% from last month</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title text-primary">Devotees Helped</div>
                            <div class="stat-value text-primary">1,200+</div>
                            <div class="stat-desc text-primary">Growing daily</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donation Categories -->
        <div class="container mx-auto px-4 py-12">
            <h3 class="text-3xl font-bold text-center text-primary mb-12">Choose Your Contribution</h3>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- General Fund -->
                <div class="card bg-base-100 shadow-xl border border-primary hover:shadow-2xl transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-heart text-primary text-3xl mr-4"></i>
                            <h4 class="card-title text-primary">General Fund</h4>
                        </div>
                        <p class="text-base-content mb-6">Support daily operations, maintenance, and general ashram needs</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button @click="selectAmount('general', 500)" class="btn btn-sm btn-outline btn-primary">₹500</button>
                            <button @click="selectAmount('general', 1000)" class="btn btn-sm btn-outline btn-primary">₹1,000</button>
                            <button @click="selectAmount('general', 2500)" class="btn btn-sm btn-outline btn-primary">₹2,500</button>
                            <button @click="selectAmount('general', 5000)" class="btn btn-sm btn-outline btn-primary">₹5,000</button>
                        </div>
                        <button @click="openDonationModal('general')" class="btn btn-primary w-full">
                            <i class="fas fa-donate mr-2"></i>
                            Donate Now
                        </button>
                    </div>
                </div>

                <!-- Temple Construction -->
                <div class="card bg-base-100 shadow-xl border border-primary hover:shadow-2xl transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-building text-primary text-3xl mr-4"></i>
                            <h4 class="card-title text-primary">Temple Construction</h4>
                        </div>
                        <p class="text-base-content mb-4">Help build and expand our sacred spaces</p>
                        <div class="mb-6">
                            <div class="flex justify-between text-sm mb-2">
                                <span>Progress</span>
                                <span>₹18,50,000 / ₹25,00,000</span>
                            </div>
                            <progress class="progress progress-primary w-full" value="74" max="100"></progress>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button @click="selectAmount('construction', 10000)" class="btn btn-sm btn-outline btn-primary">₹10,000</button>
                            <button @click="selectAmount('construction', 25000)" class="btn btn-sm btn-outline btn-primary">₹25,000</button>
                            <button @click="selectAmount('construction', 50000)" class="btn btn-sm btn-outline btn-primary">₹50,000</button>
                        </div>
                        <button @click="openDonationModal('construction')" class="btn btn-primary w-full">
                            <i class="fas fa-hammer mr-2"></i>
                            Contribute
                        </button>
                    </div>
                </div>

                <!-- Prasadam Seva -->
                <div class="card bg-base-100 shadow-xl border border-primary hover:shadow-2xl transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-utensils text-primary text-3xl mr-4"></i>
                            <h4 class="card-title text-primary">Prasadam Seva</h4>
                        </div>
                        <p class="text-base-content mb-6">Sponsor daily meals and prasadam distribution</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button @click="selectAmount('prasadam', 200)" class="btn btn-sm btn-outline btn-primary">₹200</button>
                            <button @click="selectAmount('prasadam', 500)" class="btn btn-sm btn-outline btn-primary">₹500</button>
                            <button @click="selectAmount('prasadam', 1100)" class="btn btn-sm btn-outline btn-primary">₹1,100</button>
                            <button @click="selectAmount('prasadam', 2100)" class="btn btn-sm btn-outline btn-primary">₹2,100</button>
                        </div>
                        <button @click="openDonationModal('prasadam')" class="btn btn-primary w-full">
                            <i class="fas fa-leaf mr-2"></i>
                            Sponsor Meals
                        </button>
                    </div>
                </div>

                <!-- Education & Books -->
                <div class="card bg-base-100 shadow-xl border border-primary hover:shadow-2xl transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-book text-primary text-3xl mr-4"></i>
                            <h4 class="card-title text-primary">Education & Books</h4>
                        </div>
                        <p class="text-base-content mb-6">Support publication of scriptures and educational programs</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button @click="selectAmount('education', 1000)" class="btn btn-sm btn-outline btn-primary">₹1,000</button>
                            <button @click="selectAmount('education', 3000)" class="btn btn-sm btn-outline btn-primary">₹3,000</button>
                            <button @click="selectAmount('education', 5000)" class="btn btn-sm btn-outline btn-primary">₹5,000</button>
                        </div>
                        <button @click="openDonationModal('education')" class="btn btn-primary w-full">
                            <i class="fas fa-graduation-cap mr-2"></i>
                            Support Learning
                        </button>
                    </div>
                </div>

                <!-- Festival Sponsorship -->
                <div class="card bg-base-100 shadow-xl border border-primary hover:shadow-2xl transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-calendar-alt text-primary text-3xl mr-4"></i>
                            <h4 class="card-title text-primary">Festival Sponsorship</h4>
                        </div>
                        <p class="text-base-content mb-6">Sponsor festivals and special celebrations</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button @click="selectAmount('festival', 2500)" class="btn btn-sm btn-outline btn-primary">₹2,500</button>
                            <button @click="selectAmount('festival', 5000)" class="btn btn-sm btn-outline btn-primary">₹5,000</button>
                            <button @click="selectAmount('festival', 11000)" class="btn btn-sm btn-outline btn-primary">₹11,000</button>
                        </div>
                        <button @click="openDonationModal('festival')" class="btn btn-primary w-full">
                            <i class="fas fa-star mr-2"></i>
                            Sponsor Festival
                        </button>
                    </div>
                </div>

                <!-- Monthly Support -->
                <div class="card bg-base-100 shadow-xl border border-primary hover:shadow-2xl transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-calendar-check text-primary text-3xl mr-4"></i>
                            <h4 class="card-title text-primary">Monthly Support</h4>
                        </div>
                        <p class="text-base-content mb-6">Become a regular supporter with monthly contributions</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button @click="selectAmount('monthly', 500)" class="btn btn-sm btn-outline btn-primary">₹500/mo</button>
                            <button @click="selectAmount('monthly', 1000)" class="btn btn-sm btn-outline btn-primary">₹1,000/mo</button>
                            <button @click="selectAmount('monthly', 2500)" class="btn btn-sm btn-outline btn-primary">₹2,500/mo</button>
                        </div>
                        <button @click="openDonationModal('monthly')" class="btn btn-primary w-full">
                            <i class="fas fa-refresh mr-2"></i>
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bank Details -->
            <div class="card bg-base-100 shadow-xl border border-primary mb-12">
                <div class="card-body">
                    <h3 class="card-title text-primary mb-6">
                        <i class="fas fa-university mr-2"></i>
                        Bank Transfer Details
                    </h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="font-semibold text-base-content mb-4">Indian Bank Account</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-base-content">Account Name:</span>
                                    <span class="font-medium">Shri Hari Vyas Nikunja Mandir</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-base-content">Account Number:</span>
                                    <span class="font-mono">123456789012</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-base-content">IFSC Code:</span>
                                    <span class="font-mono">SBIN0001234</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-base-content">Bank:</span>
                                    <span>State Bank of India</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-base-content">Branch:</span>
                                    <span>Vrindavan Main</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-base-content mb-4">UPI & Digital Payments</h4>
                            <div class="space-y-4">
                                <div>
                                    <span class="text-base-content">UPI ID:</span>
                                    <div class="flex items-center mt-2">
                                        <span class="font-mono bg-base-100 px-3 py-2 rounded mr-2">harinikunj@upi</span>
                                        <button @click="copyToClipboard('harinikunj@upi')" class="btn btn-sm btn-outline">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-4">
                                    <div class="badge badge-lg badge-outline">
                                        <i class="fab fa-google-pay mr-2"></i>
                                        Google Pay
                                    </div>
                                    <div class="badge badge-lg badge-outline">
                                        <i class="fas fa-mobile-alt mr-2"></i>
                                        PhonePe
                                    </div>
                                    <div class="badge badge-lg badge-outline">
                                        <i class="fas fa-wallet mr-2"></i>
                                        Paytm
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTUwIiBoZWlnaHQ9IjE1MCIgdmlld0JveD0iMCAwIDE1MCAxNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxNTAiIGhlaWdodD0iMTUwIiBmaWxsPSJ3aGl0ZSIvPgo8cmVjdCB4PSIxMCIgeT0iMTAiIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0iYmxhY2siLz4KPHJlY3QgeD0iNDAiIHk9IjEwIiB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIGZpbGw9ImJsYWNrIi8+CjxyZWN0IHg9IjcwIiB5PSIxMCIgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBmaWxsPSJibGFjayIvPgo8L3N2Zz4K" alt="QR Code" class="w-32 h-32 border border-primary rounded-lg">
                                    <p class="text-sm text-base-content mt-2">Scan to donate via UPI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tax Benefits -->
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                <div>
                    <h4 class="font-bold">Tax Benefits Available</h4>
                    <p>All donations are eligible for 80G tax deduction. Donation receipt will be provided for tax purposes.</p>
                </div>
            </div>
        </div>

        <!-- Donation Modal -->
        <div x-show="showModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="modal"
             :class="{ 'modal-open': showModal }"
             @keydown.escape.window="closeModal()">
            <div class="modal-box max-w-2xl relative">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-2xl text-primary" x-text="modalTitle"></h3>
                    <button @click="closeModal" class="btn btn-sm btn-circle btn-ghost">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Success Alert -->
                <div x-show="showSuccess" x-transition class="alert alert-success mb-6">
                    <i class="fas fa-check-circle"></i>
                    <span>Thank you for your generous donation! You will receive a confirmation email shortly.</span>
                </div>

                <!-- Error Alert -->
                <div x-show="showError" x-transition class="alert alert-error mb-6">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Please fill in all required fields correctly.</span>
                </div>

                <form @submit.prevent="submitDonation" class="space-y-6">
                    <!-- Amount -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Donation Amount *</span>
                        </label>
                        <div class="input-group">
                            <span class="bg-gray-100">₹</span>
                            <input type="number" x-model="donation.amount" class="input input-bordered w-full focus:input-primary" :class="{'input-error': errors.amount}" placeholder="Enter amount" min="1" required>
                        </div>
                        <label x-show="errors.amount" class="label">
                            <span class="label-text-alt text-error">Please enter a valid amount</span>
                        </label>
                    </div>

                    <!-- Donor Details -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Full Name *</span>
                            </label>
                            <input type="text" x-model="donation.name" class="input input-bordered focus:input-primary" :class="{'input-error': errors.name}" placeholder="Your full name" required>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Email *</span>
                            </label>
                            <input type="email" x-model="donation.email" class="input input-bordered focus:input-primary" :class="{'input-error': errors.email}" placeholder="your.email@example.com" required>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Phone</span>
                            </label>
                            <input type="tel" x-model="donation.phone" class="input input-bordered focus:input-primary" placeholder="+91 98765 43210">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">PAN Number</span>
                                <span class="label-text-alt">(for 80G certificate)</span>
                            </label>
                            <input type="text" x-model="donation.pan" class="input input-bordered focus:input-primary" placeholder="ABCDE1234F" maxlength="10">
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Address</span>
                        </label>
                        <textarea x-model="donation.address" class="textarea textarea-bordered focus:textarea-primary" placeholder="Your address for donation receipt" rows="3"></textarea>
                    </div>

                    <!-- Payment Method -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Payment Method *</span>
                        </label>
                        <div class="flex flex-wrap gap-4">
                            <label class="cursor-pointer label">
                                <input type="radio" x-model="donation.paymentMethod" value="online" class="radio radio-primary">
                                <span class="label-text ml-2">Online Payment</span>
                            </label>
                            <label class="cursor-pointer label">
                                <input type="radio" x-model="donation.paymentMethod" value="bank" class="radio radio-primary">
                                <span class="label-text ml-2">Bank Transfer</span>
                            </label>
                            <label class="cursor-pointer label">
                                <input type="radio" x-model="donation.paymentMethod" value="upi" class="radio radio-primary">
                                <span class="label-text ml-2">UPI</span>
                            </label>
                        </div>
                    </div>

                    <!-- Special Message -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Special Message (Optional)</span>
                        </label>
                        <textarea x-model="donation.message" class="textarea textarea-bordered focus:textarea-primary" placeholder="Any special dedication or message..." rows="2"></textarea>
                    </div>

                    <!-- Terms -->
                    <div class="form-control">
                        <label class="cursor-pointer label">
                            <input type="checkbox" x-model="donation.agreeTerms" class="checkbox checkbox-primary">
                            <span class="label-text ml-2">I agree to the terms and conditions and authorize the donation</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="modal-action">
                        <button type="button" @click="closeModal" class="btn btn-ghost">Cancel</button>
                        <button type="submit" class="btn btn-primary" :class="{'loading': isSubmitting}" :disabled="isSubmitting || !donation.agreeTerms">
                            <span x-show="!isSubmitting">
                                <i class="fas fa-heart mr-2"></i>
                                <span x-text="'Donate ₹' + (donation.amount || '0')"></span>
                            </span>
                            <span x-show="isSubmitting">Processing...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function donationForm() {
            return {
                showModal: false
                , modalTitle: ''
                , selectedCategory: ''
                , donation: {
                    amount: ''
                    , name: ''
                    , email: ''
                    , phone: ''
                    , pan: ''
                    , address: ''
                    , paymentMethod: 'online'
                    , message: ''
                    , agreeTerms: false
                }
                , errors: {}
                , isSubmitting: false
                , showSuccess: false
                , showError: false,

                selectAmount(category, amount) {
                    this.selectedCategory = category;
                    this.donation.amount = amount;
                    this.openDonationModal(category);
                },

                openDonationModal(category) {
                    this.selectedCategory = category;
                    this.modalTitle = this.getCategoryTitle(category);
                    document.body.classList.add('overflow-hidden');
                    this.showModal = true;
                    this.showSuccess = false;
                    this.showError = false;
                },

                closeModal() {
                    document.body.classList.remove('overflow-hidden');
                    this.showModal = false;
                    this.resetForm();
                },

                getCategoryTitle(category) {
                    const titles = {
                        'general': 'General Fund Donation'
                        , 'construction': 'Temple Construction Donation'
                        , 'prasadam': 'Prasadam Seva Donation'
                        , 'education': 'Education & Books Donation'
                        , 'festival': 'Festival Sponsorship'
                        , 'monthly': 'Monthly Support Subscription'
                    };
                    return titles[category] || 'Make a Donation';
                },

                validateForm() {
                    this.errors = {};

                    if (!this.donation.amount || this.donation.amount < 1) {
                        this.errors.amount = true;
                    }

                    if (!this.donation.name.trim()) {
                        this.errors.name = true;
                    }

                    if (!this.donation.email.trim() || !this.isValidEmail(this.donation.email)) {
                        this.errors.email = true;
                    }

                    return Object.keys(this.errors).length === 0;
                },

                isValidEmail(email) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return emailRegex.test(email);
                },

                async submitDonation() {
                    this.showSuccess = false;
                    this.showError = false;

                    if (!this.validateForm()) {
                        this.showError = true;
                        return;
                    }

                    this.isSubmitting = true;

                    try {
                        // Simulate API call
                        await new Promise(resolve => setTimeout(resolve, 2000));

                        this.showSuccess = true;

                        // Reset form after success
                        setTimeout(() => {
                            this.closeModal();
                        }, 3000);

                    } catch (error) {
                        this.showError = true;
                    } finally {
                        this.isSubmitting = false;
                    }
                },

                resetForm() {
                    this.donation = {
                        amount: ''
                        , name: ''
                        , email: ''
                        , phone: ''
                        , pan: ''
                        , address: ''
                        , paymentMethod: 'online'
                        , message: ''
                        , agreeTerms: false
                    };
                    this.errors = {};
                },

                copyToClipboard(text) {
                    navigator.clipboard.writeText(text).then(() => {
                        // Could add a toast notification here
                        console.log('Copied to clipboard:', text);
                    });
                }
            }
        }
    </script>
</div>
