<div>
    <div class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-base-200 py-16">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold text-primary mb-4">संपर्क करें</h1>
                    <h2 class="text-base-content text-opacity-70">श्री हरि व्यास निकुंज मंदिर, वृंदावन</h2>
                </div>
            </div>
        </div>


        <!-- Main Content -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid lg:grid-cols-2 gap-12">

                <!-- संपर्क जानकारी -->
                <div class="space-y-8">
                    <!-- पता कार्ड -->
                    <div class="card bg-base-100 shadow-xl border border-base-300">
                        <div class="card-body">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-map-marker-alt text-primary text-2xl mr-4"></i>
                                <h3 class="card-title text-primary">पता</h3>
                            </div>
                            <p class="text-base-content leading-relaxed">
                                श्री हरि व्यास निकुंज मंदिर<br>
                                वृंदावन, मथुरा जिला<br>
                                उत्तर प्रदेश - 281121<br>
                                भारत
                            </p>
                        </div>
                    </div>

                    <!-- संपर्क विवरण -->
                    <div class="card bg-base-100 shadow-xl border border-base-300">
                        <div class="card-body">
                            <h3 class="card-title text-primary mb-6">संपर्क करें</h3>

                            <!-- फोन -->
                            <div class="flex items-center mb-4">
                                <i class="fas fa-phone text-primary text-xl mr-4"></i>
                                <div>
                                    <p class="font-semibold text-base-content">फोन</p>
                                    <a href="tel:+918070525204" class="text-primary hover:underline">+91 8070525204</a>
                                </div>
                            </div>

                            <!-- व्हाट्सएप -->
                            <div class="flex items-center mb-4">
                                <i class="fab fa-whatsapp text-success text-xl mr-4"></i>
                                <div>
                                    <p class="font-semibold text-base-content">WhatsApp</p>
                                    <a href="https://wa.me/919456812155" class="text-success hover:underline">+91 9456812155</a>
                                </div>
                            </div>

                            <!-- ईमेल -->
                            <div class="flex items-center mb-4">
                                <i class="fas fa-envelope text-primary text-xl mr-4"></i>
                                <div>
                                    <p class="font-semibold text-base-content">ईमेल</p>
                                    <a href="mailto:muraridass1976@gmail.com" class="text-primary hover:underline">muraridass1976@gmail.com</a>
                                </div>
                            </div>

                            <!-- समय -->
                            <div class="flex items-start">
                                <i class="fas fa-clock text-primary text-xl mr-4 mt-1"></i>
                                <div>
                                    <p class="font-semibold text-base-content">दर्शन समय</p>
                                    <p class="text-base-content text-opacity-70">रोजाना: सुबह 9:00 - दोपहर 12:00</p>
                                    <p class="text-base-content text-opacity-70">आरती समय: 9:00 सुबह, 5:00 दोपहर, 7:00 शाम</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- त्वरित कार्य -->
                    <div class="flex flex-wrap gap-4">
                        <a href="tel:+918070525204" class="btn btn-warning btn-outline flex-1 min-w-0">
                            <i class="fas fa-phone mr-2"></i>
                            अभी कॉल करें
                        </a>
                        <a href="https://wa.me/918070525204" class="btn btn-success btn-outline flex-1 min-w-0">
                            <i class="fab fa-whatsapp mr-2"></i>
                            WhatsApp करें
                        </a>
                    </div>
                </div>

                <!-- संपर्क फ़ॉर्म -->
                <div class="card bg-base-100 shadow-xl border border-base-300">
                    <div class="card-body">
                        <h3 class="card-title text-primary mb-6">संदेश भेजें</h3>

                        <!-- सफलता संदेश -->
                        <div x-show="showSuccess" x-transition class="alert alert-success mb-6">
                            <i class="fas fa-check-circle"></i>
                            <span>आपका संदेश सफलतापूर्वक भेजा गया है! हम जल्द ही संपर्क करेंगे।</span>
                        </div>

                        <!-- त्रुटि संदेश -->
                        <div x-show="showError" x-transition class="alert alert-error mb-6">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>कृपया सभी आवश्यक फ़ील्ड सही से भरें।</span>
                        </div>

                        <form @submit.prevent="submitForm" class="space-y-6">
                            <!-- नाम -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">नाम *</span>
                                </label>
                                <input type="text" x-model="form.name" class="input input-bordered focus:input-primary" :class="{'input-error': errors.name}" placeholder="अपना पूरा नाम" required>
                                <label x-show="errors.name" class="label">
                                    <span class="label-text-alt text-error">नाम आवश्यक है</span>
                                </label>
                            </div>

                            <!-- ईमेल -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">ईमेल *</span>
                                </label>
                                <input type="email" x-model="form.email" class="input input-bordered focus:input-primary" :class="{'input-error': errors.email}" placeholder="aapka.email@udaharan.com" required>
                                <label x-show="errors.email" class="label">
                                    <span class="label-text-alt text-error">सही ईमेल आवश्यक है</span>
                                </label>
                            </div>

                            <!-- फोन -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">फ़ोन</span>
                                </label>
                                <input type="tel" x-model="form.phone" class="input input-bordered focus:input-primary" placeholder="+91 98765 43210">
                            </div>

                            <!-- विषय -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">विषय *</span>
                                </label>
                                <select x-model="form.subject" class="select select-bordered focus:select-primary" :class="{'select-error': errors.subject}" required>
                                    <option value="">विषय चुनें</option>
                                    <option value="general">सामान्य पूछताछ</option>
                                    <option value="visit">दर्शन योजना</option>
                                    <option value="seva">सेवा के अवसर</option>
                                    <option value="donation">दान</option>
                                    <option value="ashram-life">आश्रम जीवन</option>
                                    <option value="texts">ग्रंथ एवं शिक्षाएं</option>
                                    <option value="festivals">त्योहार एवं कार्यक्रम</option>
                                    <option value="other">अन्य</option>
                                </select>
                                <label x-show="errors.subject" class="label">
                                    <span class="label-text-alt text-error">कृपया विषय चुनें</span>
                                </label>
                            </div>

                            <!-- संदेश -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">संदेश *</span>
                                </label>
                                <textarea x-model="form.message" class="textarea textarea-bordered h-32 focus:textarea-primary" :class="{'textarea-error': errors.message}" placeholder="कृपया अपना संदेश, प्रश्न, या किसी प्रकार की सहायता लिखें..." required></textarea>
                                <label x-show="errors.message" class="label">
                                    <span class="label-text-alt text-error">संदेश आवश्यक है</span>
                                </label>
                            </div>

                            <!-- सबमिट बटन -->
                            <div class="form-control">
                                <button type="submit" class="btn btn-primary" :class="{'loading': isSubmitting}" :disabled="isSubmitting">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    संदेश भेजें
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- मानचित्र अनुभाग -->
            <div class="mt-16">
                <h3 class="text-3xl font-bold text-center mb-8 text-primary">हमें यहां पाएं</h3>
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body p-0">
                        <div class="w-full h-96 rounded-lg overflow-hidden">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14146.480517212021!2d77.66465682575418!3d27.574297521723995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39736e17b9bbb095%3A0xcbf23f3eb74be6b!2sHari%20Vyas%20Nikunja%20Mandir%20(aashram)!5e0!3m2!1sen!2sin!4v1749968147522!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" class="w-full h-full border-0 rounded-lg block" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
