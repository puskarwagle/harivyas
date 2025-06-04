<div>
    <div x-data="contactForm()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-gradient-to-r from-orange-50 to-amber-50 py-16">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold text-orange-800 mb-4">संपर्क करें</h1>
                    <h2 class="text-2xl font-semibold text-orange-700 mb-2">Contact Us</h2>
                    <p class="text-gray-600">श्री हरि व्यास निकुंज मंदिर, वृंदावन</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid lg:grid-cols-2 gap-12">

                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Address Card -->
                    <div class="card bg-base-100 shadow-xl border border-orange-100">
                        <div class="card-body">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-map-marker-alt text-orange-500 text-2xl mr-4"></i>
                                <h3 class="card-title text-orange-800">Address</h3>
                            </div>
                            <p class="text-gray-700 leading-relaxed">
                                श्री हरि व्यास निकुंज मंदिर<br>
                                वृंदावन, मथुरा जिला<br>
                                उत्तर प्रदेश - 281121<br>
                                भारत
                            </p>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="card bg-base-100 shadow-xl border border-orange-100">
                        <div class="card-body">
                            <h3 class="card-title text-orange-800 mb-6">Get in Touch</h3>

                            <!-- Phone -->
                            <div class="flex items-center mb-4">
                                <i class="fas fa-phone text-orange-500 text-xl mr-4"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Phone</p>
                                    <a href="tel:+919876543210" class="text-orange-600 hover:text-orange-800">+91 98765 43210</a>
                                </div>
                            </div>

                            <!-- WhatsApp -->
                            <div class="flex items-center mb-4">
                                <i class="fab fa-whatsapp text-green-500 text-xl mr-4"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">WhatsApp</p>
                                    <a href="https://wa.me/919876543210" class="text-green-600 hover:text-green-800">+91 98765 43210</a>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-center mb-4">
                                <i class="fas fa-envelope text-orange-500 text-xl mr-4"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Email</p>
                                    <a href="mailto:contact@harinikunj.org" class="text-orange-600 hover:text-orange-800">contact@harinikunj.org</a>
                                </div>
                            </div>

                            <!-- Timings -->
                            <div class="flex items-start">
                                <i class="fas fa-clock text-orange-500 text-xl mr-4 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-gray-800">Visiting Hours</p>
                                    <p class="text-gray-600">Daily: 5:00 AM - 8:00 PM</p>
                                    <p class="text-gray-600">Aarti Times: 6:00 AM, 12:00 PM, 7:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="flex flex-wrap gap-4">
                        <a href="tel:+919876543210" class="btn btn-primary btn-outline flex-1 min-w-0">
                            <i class="fas fa-phone mr-2"></i>
                            Call Now
                        </a>
                        <a href="https://wa.me/919876543210" class="btn btn-success btn-outline flex-1 min-w-0">
                            <i class="fab fa-whatsapp mr-2"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="card bg-base-100 shadow-xl border border-orange-100">
                    <div class="card-body">
                        <h3 class="card-title text-orange-800 mb-6">Send us a Message</h3>

                        <!-- Success Alert -->
                        <div x-show="showSuccess" x-transition class="alert alert-success mb-6">
                            <i class="fas fa-check-circle"></i>
                            <span>Your message has been sent successfully! We'll get back to you soon.</span>
                        </div>

                        <!-- Error Alert -->
                        <div x-show="showError" x-transition class="alert alert-error mb-6">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Please fill in all required fields correctly.</span>
                        </div>

                        <form @submit.prevent="submitForm" class="space-y-6">
                            <!-- Name -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Name *</span>
                                </label>
                                <input type="text" x-model="form.name" class="input input-bordered focus:input-primary" :class="{'input-error': errors.name}" placeholder="Your full name" required>
                                <label x-show="errors.name" class="label">
                                    <span class="label-text-alt text-error">Name is required</span>
                                </label>
                            </div>

                            <!-- Email -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Email *</span>
                                </label>
                                <input type="email" x-model="form.email" class="input input-bordered focus:input-primary" :class="{'input-error': errors.email}" placeholder="your.email@example.com" required>
                                <label x-show="errors.email" class="label">
                                    <span class="label-text-alt text-error">Valid email is required</span>
                                </label>
                            </div>

                            <!-- Phone -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Phone</span>
                                </label>
                                <input type="tel" x-model="form.phone" class="input input-bordered focus:input-primary" placeholder="+91 98765 43210">
                            </div>

                            <!-- Subject -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Subject *</span>
                                </label>
                                <select x-model="form.subject" class="select select-bordered focus:select-primary" :class="{'select-error': errors.subject}" required>
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="visit">Planning a Visit</option>
                                    <option value="seva">Seva Opportunities</option>
                                    <option value="donation">Donations</option>
                                    <option value="ashram-life">Ashram Life</option>
                                    <option value="texts">Texts & Teachings</option>
                                    <option value="festivals">Festivals & Events</option>
                                    <option value="other">Other</option>
                                </select>
                                <label x-show="errors.subject" class="label">
                                    <span class="label-text-alt text-error">Please select a subject</span>
                                </label>
                            </div>

                            <!-- Message -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Message *</span>
                                </label>
                                <textarea x-model="form.message" class="textarea textarea-bordered h-32 focus:textarea-primary" :class="{'textarea-error': errors.message}" placeholder="Please share your message, questions, or how we can assist you..." required></textarea>
                                <label x-show="errors.message" class="label">
                                    <span class="label-text-alt text-error">Message is required</span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-control">
                                <button type="submit" class="btn btn-primary" :class="{'loading': isSubmitting}" :disabled="isSubmitting">
                                    <span x-show="!isSubmitting">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Send Message
                                    </span>
                                    <span x-show="isSubmitting">Sending...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="mt-16">
                <h3 class="text-3xl font-bold text-orange-800 text-center mb-8">Find Us</h3>
                <div class="card bg-base-100 shadow-xl border border-orange-100">
                    <div class="card-body p-0">
                        <div class="w-full h-96 rounded-lg overflow-hidden">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14206.443754573968!2d77.69287137771488!3d27.580970681876426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39736ec8ba9a8b11%3A0x745c48b5a20b1b0!2sVrindavan%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1647875234567!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-lg">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function contactForm() {
            return {
                form: {
                    name: ''
                    , email: ''
                    , phone: ''
                    , subject: ''
                    , message: ''
                }
                , errors: {}
                , isSubmitting: false
                , showSuccess: false
                , showError: false,

                validateForm() {
                    this.errors = {};

                    if (!this.form.name.trim()) {
                        this.errors.name = true;
                    }

                    if (!this.form.email.trim() || !this.isValidEmail(this.form.email)) {
                        this.errors.email = true;
                    }

                    if (!this.form.subject) {
                        this.errors.subject = true;
                    }

                    if (!this.form.message.trim()) {
                        this.errors.message = true;
                    }

                    return Object.keys(this.errors).length === 0;
                },

                isValidEmail(email) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return emailRegex.test(email);
                },

                async submitForm() {
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

                        // Reset form
                        this.form = {
                            name: ''
                            , email: ''
                            , phone: ''
                            , subject: ''
                            , message: ''
                        };

                        this.showSuccess = true;

                        // Hide success message after 5 seconds
                        setTimeout(() => {
                            this.showSuccess = false;
                        }, 5000);

                    } catch (error) {
                        this.showError = true;
                    } finally {
                        this.isSubmitting = false;
                    }
                }
            }
        }

    </script>
</div>
