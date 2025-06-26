<div class="min-h-screen bg-base-100">
    <!-- Hero Section with Timeline Navigation -->
    <div class="hero min-h-[60vh] bg-gradient-to-br from-primary to-secondary relative overflow-hidden">
        <div class="hero-overlay bg-opacity-30"></div>
        <div class="hero-content text-center text-primary-content z-10">
            <div class="max-w-4xl">
                <h1 class="text-6xl font-bold mb-6" x-data="{ show: false }" x-init="setTimeout(() => show = true, 200)" x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 transform translate-y-10" x-transition:enter-end="opacity-100 transform translate-y-0">
                    Sacred Journey Through Time
                </h1>
                <p class="text-xl mb-8 opacity-90" x-data="{ show: false }" x-init="setTimeout(() => show = true, 600)" x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 transform translate-y-10" x-transition:enter-end="opacity-100 transform translate-y-0">
                    Discover the divine heritage of Shri Hari Vyas Nikunja Mandir and our unbroken lineage of spiritual masters
                </p>

                <!-- Era Navigation Pills -->
                <div class="flex flex-wrap justify-center gap-4 mt-8" x-data="{ activeEra: 'ancient' }">
                    <button @click="activeEra = 'ancient'; document.getElementById('ancient-era').scrollIntoView({behavior: 'smooth'})" :class="activeEra === 'ancient' ? 'btn-accent' : 'btn-ghost btn-outline'" class="btn btn-lg">
                        <i class="fas fa-mountain mr-2"></i>Ancient Roots
                    </button>
                    <button @click="activeEra = 'founding'; document.getElementById('founding-era').scrollIntoView({behavior: 'smooth'})" :class="activeEra === 'founding' ? 'btn-accent' : 'btn-ghost btn-outline'" class="btn btn-lg">
                        <i class="fas fa-seedling mr-2"></i>Foundation
                    </button>
                    <button @click="activeEra = 'growth'; document.getElementById('growth-era').scrollIntoView({behavior: 'smooth'})" :class="activeEra === 'growth' ? 'btn-accent' : 'btn-ghost btn-outline'" class="btn btn-lg">
                        <i class="fas fa-tree mr-2"></i>Growth
                    </button>
                    <button @click="activeEra = 'modern'; document.getElementById('modern-era').scrollIntoView({behavior: 'smooth'})" :class="activeEra === 'modern' ? 'btn-accent' : 'btn-ghost btn-outline'" class="btn btn-lg">
                        <i class="fas fa-sun mr-2"></i>Modern Era
                    </button>
                </div>
            </div>
        </div>

        <!-- Floating Decorative Elements -->
        <div class="absolute top-20 left-10 opacity-20">
            <i class="fas fa-om text-6xl text-primary-content animate-pulse"></i>
        </div>
        <div class="absolute bottom-20 right-10 opacity-20">
            <i class="fas fa-lotus text-5xl text-primary-content animate-bounce"></i>
        </div>
    </div>

    <!-- Timeline Overview -->
    <div class="py-16 bg-base-200">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-base-content mb-4">Sacred Timeline</h2>
                <p class="text-lg text-base-content/70 max-w-2xl mx-auto">
                    Witness the divine flow of centuries through the establishment and evolution of our sacred sanctuary
                </p>
            </div>

            <!-- Interactive Timeline -->
            <div class="relative" x-data="{ hoveredYear: null }">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-primary h-full"></div>

                <!-- Timeline Points -->
                <div class="space-y-16">
                    <!-- Ancient Era Point -->
                    <div class="flex items-center relative" @mouseenter="hoveredYear = 'ancient'" @mouseleave="hoveredYear = null">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="card bg-primary text-primary-content shadow-xl transform transition-all duration-300" :class="hoveredYear === 'ancient' ? 'scale-105 shadow-2xl' : ''">
                                <div class="card-body">
                                    <h3 class="card-title text-2xl justify-end">12th Century CE</h3>
                                    <p class="text-primary-content/90">Nimbarka Sampradaya Foundation</p>
                                </div>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-primary rounded-full border-4 border-base-100 z-10 transition-all duration-300" :class="hoveredYear === 'ancient' ? 'scale-150' : ''"></div>
                        <div class="w-1/2 pl-8">
                            <div class="text-base-content/70">
                                <i class="fas fa-scroll text-2xl mb-2 text-primary"></i>
                                <p>Sacred texts and philosophical foundations established</p>
                            </div>
                        </div>
                    </div>

                    <!-- More timeline points would go here -->
                    <div class="flex items-center relative" @mouseenter="hoveredYear = 'founding'" @mouseleave="hoveredYear = null">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="text-base-content/70">
                                <i class="fas fa-temple text-2xl mb-2 text-secondary"></i>
                                <p>First temple structures and community formation</p>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-secondary rounded-full border-4 border-base-100 z-10 transition-all duration-300" :class="hoveredYear === 'founding' ? 'scale-150' : ''"></div>
                        <div class="w-1/2 pl-8">
                            <div class="card bg-secondary text-secondary-content shadow-xl transform transition-all duration-300" :class="hoveredYear === 'founding' ? 'scale-105 shadow-2xl' : ''">
                                <div class="card-body">
                                    <h3 class="card-title text-2xl">15th Century CE</h3>
                                    <p class="text-secondary-content/90">Vrindavan Establishment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ancient Era Section -->
    <div id="ancient-era" class="py-20 bg-gradient-to-br from-base-100 to-base-200">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-center mb-12">
                <div class="w-16 h-1 bg-primary mr-4"></div>
                <h2 class="text-5xl font-bold text-primary text-center">Ancient Roots</h2>
                <div class="w-16 h-1 bg-primary ml-4"></div>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-center mb-16">
                <!-- Image Placeholder -->
                <div class="relative" x-data="{ imageLoaded: false }" x-init="setTimeout(() => imageLoaded = true, 300)">
                    <div class="aspect-[4/3] bg-primary/10 rounded-2xl flex items-center justify-center border-2 border-dashed border-primary/30 transition-all duration-500" :class="imageLoaded ? 'opacity-100 scale-100' : 'opacity-50 scale-95'">
                        <div class="text-center text-primary/60">
                            <i class="fas fa-image text-6xl mb-4"></i>
                            <p class="text-lg">Ancient Manuscript Image</p>
                            <p class="text-sm opacity-60">Replace with historical artwork</p>
                        </div>
                    </div>
                    <!-- Decorative Corner -->
                    <div class="absolute -top-4 -left-4 w-8 h-8 bg-accent rounded-full opacity-30"></div>
                    <div class="absolute -bottom-4 -right-4 w-12 h-12 bg-secondary rounded-full opacity-20"></div>
                </div>

                <!-- Content -->
                <div class="space-y-6" x-data="{ show: false }" x-intersect="show = true">
                    <div x-show="show" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 transform translate-x-10" x-transition:enter-end="opacity-100 transform translate-x-0">
                        <div class="badge badge-primary badge-lg mb-4">
                            <i class="fas fa-star mr-2"></i>12th Century CE
                        </div>
                        <h3 class="text-3xl font-bold text-base-content mb-4">The Divine Inception</h3>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            [Your content here] In the sacred lands of ancient Bharat, when spiritual wisdom flowed like the holy Ganga, the divine philosophy of Nimbarka Sampradaya took root...
                        </p>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="stat bg-primary/10 rounded-xl p-4">
                                <div class="stat-figure text-primary">
                                    <i class="fas fa-book text-2xl"></i>
                                </div>
                                <div class="stat-title text-xs">Sacred Texts</div>
                                <div class="stat-value text-lg text-primary">Vedanta Parijata</div>
                            </div>
                            <div class="stat bg-secondary/10 rounded-xl p-4">
                                <div class="stat-figure text-secondary">
                                    <i class="fas fa-users text-2xl"></i>
                                </div>
                                <div class="stat-title text-xs">Philosophy</div>
                                <div class="stat-value text-lg text-secondary">Dvaitadvaita</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Philosophy Showcase -->
            <div class="grid md:grid-cols-3 gap-8 mt-16">
                <div class="card bg-gradient-to-br from-primary/20 to-primary/5 shadow-xl" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="card-body text-center transform transition-transform duration-300" :class="hover ? 'scale-105' : ''">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-infinity text-white text-2xl"></i>
                        </div>
                        <h4 class="card-title justify-center text-primary mb-2">Dvaitadvaita</h4>
                        <p class="text-base-content/70">
                            [Your philosophical explanation] The profound non-dualistic dualism that bridges the individual soul with the Supreme...
                        </p>
                    </div>
                </div>

                <div class="card bg-gradient-to-br from-secondary/20 to-secondary/5 shadow-xl" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="card-body text-center transform transition-transform duration-300" :class="hover ? 'scale-105' : ''">
                        <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-white text-2xl"></i>
                        </div>
                        <h4 class="card-title justify-center text-secondary mb-2">Bhakti Tradition</h4>
                        <p class="text-base-content/70">
                            [Your content] Pure devotional practices that elevate the soul through love and surrender...
                        </p>
                    </div>
                </div>

                <div class="card bg-gradient-to-br from-accent/20 to-accent/5 shadow-xl" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="card-body text-center transform transition-transform duration-300" :class="hover ? 'scale-105' : ''">
                        <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-lotus text-white text-2xl"></i>
                        </div>
                        <h4 class="card-title justify-center text-accent mb-2">Sacred Practices</h4>
                        <p class="text-base-content/70">
                            [Your content] Time-honored rituals and spiritual disciplines passed down through generations...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Founding Era Section -->
    <div id="founding-era" class="py-20 bg-gradient-to-br from-secondary/5 to-primary/5">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-1 bg-secondary mr-4"></div>
                    <h2 class="text-5xl font-bold text-secondary">Foundation in Vrindavan</h2>
                    <div class="w-16 h-1 bg-secondary ml-4"></div>
                </div>
                <p class="text-xl text-base-content/70 max-w-3xl mx-auto">
                    [Your content] The sacred journey to the land of Krishna, where divine love manifests in every grain of dust...
                </p>
            </div>

            <!-- Dual Image Layout -->
            <div class="grid lg:grid-cols-2 gap-16 mb-16">
                <!-- Historical Image -->
                <div class="relative" x-data="{ reveal: false }" x-intersect="reveal = true">
                    <div class="aspect-[3/4] bg-gradient-to-br from-secondary/20 to-secondary/5 rounded-3xl flex items-center justify-center border-2 border-dashed border-secondary/30 transform transition-all duration-700" :class="reveal ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                        <div class="text-center text-secondary/60">
                            <i class="fas fa-gopuram text-6xl mb-4"></i>
                            <p class="text-lg">Historical Temple Image</p>
                            <p class="text-sm opacity-60">Early architectural beauty</p>
                        </div>
                    </div>
                    <!-- Floating Badge -->
                    <div class="absolute -top-6 -right-6 badge badge-secondary badge-lg p-4">
                        <i class="fas fa-calendar mr-2"></i>15th Century
                    </div>
                </div>

                <!-- Content & Stats -->
                <div class="space-y-8">
                    <div x-data="{ show: false }" x-intersect="show = true">
                        <div x-show="show" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 transform translate-x-10" x-transition:enter-end="opacity-100 transform translate-x-0">
                            <h3 class="text-4xl font-bold text-base-content mb-6">The Sacred Establishment</h3>
                            <p class="text-lg text-base-content/80 leading-relaxed mb-8">
                                [Your content] In the heart of Vrindavan, where every stone echoes with Krishna's divine pastimes, our ancestors established this sacred sanctuary...
                            </p>
                        </div>
                    </div>

                    <!-- Milestone Cards -->
                    <div class="space-y-4" x-data="{ activeCard: null }">
                        <div class="collapse collapse-plus bg-secondary/10 rounded-xl" :class="activeCard === 1 ? 'collapse-open' : 'collapse-close'">
                            <div class="collapse-title text-xl font-medium flex items-center cursor-pointer" @click="activeCard = activeCard === 1 ? null : 1">
                                <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-foundation text-white"></i>
                                </div>
                                First Foundation Stone
                            </div>
                            <div class="collapse-content">
                                <p class="text-base-content/70 ml-16">
                                    [Your content] The consecration ceremony that marked the beginning of our physical presence in this sacred land...
                                </p>
                            </div>
                        </div>

                        <div class="collapse collapse-plus bg-primary/10 rounded-xl" :class="activeCard === 2 ? 'collapse-open' : 'collapse-close'">
                            <div class="collapse-title text-xl font-medium flex items-center cursor-pointer" @click="activeCard = activeCard === 2 ? null : 2">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-users text-white"></i>
                                </div>
                                Community Formation
                            </div>
                            <div class="collapse-content">
                                <p class="text-base-content/70 ml-16">
                                    [Your content] How devoted souls gathered to form the first spiritual community around our teachings...
                                </p>
                            </div>
                        </div>

                        <div class="collapse collapse-plus bg-accent/10 rounded-xl" :class="activeCard === 3 ? 'collapse-open' : 'collapse-close'">
                            <div class="collapse-title text-xl font-medium flex items-center cursor-pointer" @click="activeCard = activeCard === 3 ? null : 3">
                                <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-book-open text-white"></i>
                                </div>
                                Sacred Practices Begin
                            </div>
                            <div class="collapse-content">
                                <p class="text-base-content/70 ml-16">
                                    [Your content] The establishment of daily rituals, festivals, and spiritual disciplines that continue today...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Growth Era Section -->
    <div id="growth-era" class="py-20 bg-base-100">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-1 bg-accent mr-4"></div>
                    <h2 class="text-5xl font-bold text-accent">Expansion & Growth</h2>
                    <div class="w-16 h-1 bg-accent ml-4"></div>
                </div>
                <p class="text-xl text-base-content/70 max-w-3xl mx-auto">
                    [Your content] Centuries of spiritual flowering, architectural marvels, and the deepening of our sacred traditions...
                </p>
            </div>

            <!-- Growth Metrics -->
            <div class="grid md:grid-cols-4 gap-6 mb-16">
                <div class="stat bg-gradient-to-br from-primary/20 to-primary/5 rounded-2xl shadow-lg" x-data="{ count: 0 }" x-intersect="setInterval(() => { if(count < 500) count += 10 }, 20)">
                    <div class="stat-figure text-primary">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                    <div class="stat-title">Devotees Served</div>
                    <div class="stat-value text-primary" x-text="count + '+'"></div>
                    <div class="stat-desc">Years of service</div>
                </div>

                <div class="stat bg-gradient-to-br from-secondary/20 to-secondary/5 rounded-2xl shadow-lg" x-data="{ count: 0 }" x-intersect="setInterval(() => { if(count < 25) count += 1 }, 50)">
                    <div class="stat-figure text-secondary">
                        <i class="fas fa-building text-3xl"></i>
                    </div>
                    <div class="stat-title">Structures Built</div>
                    <div class="stat-value text-secondary" x-text="count"></div>
                    <div class="stat-desc">Sacred spaces</div>
                </div>

                <div class="stat bg-gradient-to-br from-accent/20 to-accent/5 rounded-2xl shadow-lg" x-data="{ count: 0 }" x-intersect="setInterval(() => { if(count < 12) count += 1 }, 100)">
                    <div class="stat-figure text-accent">
                        <i class="fas fa-calendar text-3xl"></i>
                    </div>
                    <div class="stat-title">Annual Festivals</div>
                    <div class="stat-value text-accent" x-text="count"></div>
                    <div class="stat-desc">Celebrations yearly</div>
                </div>

                <div class="stat bg-gradient-to-br from-info/20 to-info/5 rounded-2xl shadow-lg" x-data="{ count: 0 }" x-intersect="setInterval(() => { if(count < 1000) count += 25 }, 30)">
                    <div class="stat-figure text-info">
                        <i class="fas fa-book text-3xl"></i>
                    </div>
                    <div class="stat-title">Manuscripts</div>
                    <div class="stat-value text-info" x-text="count + '+'"></div>
                    <div class="stat-desc">Preserved texts</div>
                </div>
            </div>

            <!-- Architectural Evolution -->
            <div class="card bg-gradient-to-br from-base-200 to-base-300 shadow-2xl">
                <div class="card-body p-8">
                    <h3 class="card-title text-3xl text-center justify-center mb-8">
                        <i class="fas fa-drafting-compass text-accent mr-3"></i>
                        Architectural Evolution
                    </h3>

                    <!-- Architecture Timeline -->
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <div class="aspect-square bg-primary/10 rounded-2xl flex items-center justify-center mb-4 border-2 border-dashed border-primary/30 transition-all duration-300" :class="hover ? 'scale-105 shadow-xl' : ''">
                                <div class="text-primary/60">
                                    <i class="fas fa-gopuram text-4xl mb-2"></i>
                                    <p class="text-sm">Original Temple</p>
                                </div>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Foundation Era</h4>
                            <p class="text-sm text-base-content/70">[Your content] Simple yet sacred beginnings</p>
                        </div>

                        <div class="text-center" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <div class="aspect-square bg-secondary/10 rounded-2xl flex items-center justify-center mb-4 border-2 border-dashed border-secondary/30 transition-all duration-300" :class="hover ? 'scale-105 shadow-xl' : ''">
                                <div class="text-secondary/60">
                                    <i class="fas fa-mosque text-4xl mb-2"></i>
                                    <p class="text-sm">Expanded Complex</p>
                                </div>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Growth Period</h4>
                            <p class="text-sm text-base-content/70">[Your content] Architectural refinement and expansion</p>
                        </div>

                        <div class="text-center" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <div class="aspect-square bg-accent/10 rounded-2xl flex items-center justify-center mb-4 border-2 border-dashed border-accent/30 transition-all duration-300" :class="hover ? 'scale-105 shadow-xl' : ''">
                                <div class="text-accent/60">
                                    <i class="fas fa-building text-4xl mb-2"></i>
                                    <p class="text-sm">Modern Ashram</p>
                                </div>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Current Form</h4>
                            <p class="text-sm text-base-content/70">[Your content] Contemporary facilities with traditional soul</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Era Section -->
    <div id="modern-era" class="py-20 bg-gradient-to-br from-info/5 to-success/5">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-1 bg-info mr-4"></div>
                    <h2 class="text-5xl font-bold text-info">Modern Renaissance</h2>
                    <div class="w-16 h-1 bg-info ml-4"></div>
                </div>
                <p class="text-xl text-base-content/70 max-w-3xl mx-auto">
                    [Your content] Bridging ancient wisdom with contemporary needs, embracing technology while preserving tradition...
                </p>
            </div>

            <!-- Modern Initiatives Grid -->
            <div class="grid lg:grid-cols-2 gap-12 mb-16">
                <!-- Digital Transformation -->
                <div class="card bg-gradient-to-br from-info/20 to-info/5 shadow-xl" x-data="{ expanded: false }">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <div class="w-14 h-14 bg-info rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-laptop text-white text-xl"></i>
                            </div>
                            <h3 class="card-title text-2xl text-info">Digital Outreach</h3>
                        </div>
                        <p class="text-base-content/80 mb-4">
                            [Your content] Bringing sacred teachings to the global community through modern digital platforms...
                        </p>

                        <div class="collapse" :class="expanded ? 'collapse-open' : 'collapse-close'">
                            <div class="collapse-content px-0">
                                <ul class="space-y-2 text-sm text-base-content/70">
                                    <li><i class="fas fa-check text-success mr-2"></i>Online Satsang Programs</li>
                                    <li><i class="fas fa-check text-success mr-2"></i>Digital Library Access</li>
                                    <li><i class="fas fa-check text-success mr-2"></i>Virtual Temple Visits</li>
                                    <li><i class="fas fa-check text-success mr-2"></i>Mobile App Development</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <button class="btn btn-info btn-sm" @click="expanded = !expanded">
                                <span x-text="expanded ? 'Show Less' : 'Learn More'"></span>
                                <i class="fas fa-chevron-down ml-2 transition-transform duration-300" :class="expanded ? 'rotate-180' : ''"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>