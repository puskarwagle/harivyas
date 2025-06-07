<div>
    <div x-data="philosophyPage()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-base-100 py-20">
            <div class="hero-content text-center max-w-4xl">
                <div>
                    <h1 class="text-6xl font-bold text-primary mb-4">द्वैताद्वैत</h1>
                    <h2 class="text-3xl font-semibold text-primary mb-6">Dvaita-Advaita</h2>
                    <p class="text-xl text-base-content max-w-3xl mx-auto leading-relaxed">
                        The profound philosophy of simultaneous difference and non-difference,
                        revealing the eternal relationship between the <span @mouseenter="showTooltip('jiva', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-semibold cursor-help">जीव</span> and
                        <span @mouseenter="showTooltip('brahman', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-semibold cursor-help">ब्रह्म</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Tooltip -->
        <div x-show="tooltip.show" x-transition :style="`top: ${tooltip.y}px; left: ${tooltip.x}px`" class="fixed bg-base-content text-base-content-content p-3 rounded-lg shadow-xl z-50 max-w-xs text-sm">
            <div x-html="tooltip.content"></div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-16">

            <!-- Core Concept Split -->
            <div class="grid lg:grid-cols-2 gap-12 mb-16">
                <!-- Dvaita Side -->
                <div class="card bg-base-100 shadow-xl border-l-4 border-primary">
                    <div class="card-body">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-primary-contentrounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-arrows-alt-h text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-primary">द्वैत (Dvaita)</h3>
                        </div>
                        <h4 class="text-lg font-semibold text-primary mb-4">Difference & Distinction</h4>
                        <ul class="space-y-3 text-base-content">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span>The individual soul (<span @mouseenter="showTooltip('jiva', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-medium cursor-help">जीव</span>) maintains distinct identity</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span>Divine and creation exist as separate realities</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span>Devotional relationship (<span @mouseenter="showTooltip('bhakti', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-medium cursor-help">भक्ति</span>) is possible</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span>Eternal service to <span @mouseenter="showTooltip('radhakrishna', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-medium cursor-help">राधा-कृष्ण</span></span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Advaita Side -->
                <div class="card bg-base-100 shadow-xl border-l-4 border-primary">
                    <div class="card-body">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-primary-contentrounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-compress-arrows-alt text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-primary">अद्वैत (Advaita)</h3>
                        </div>
                        <h4 class="text-lg font-semibold text-primary mb-4">Unity & Non-Difference</h4>
                        <ul class="space-y-3 text-base-content">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span>All existence emerges from one <span @mouseenter="showTooltip('brahman', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-medium cursor-help">ब्रह्म</span></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span>Soul and Supreme share essential nature</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span>Ultimate reality transcends duality</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span>Liberation means realization of oneness</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Central Synthesis -->
            <div class="text-center mb-16">
                <div class="inline-block p-8 bg-gradient-to-r from-primary via-primary to-primary rounded-full mb-8">
                    <i class="fas fa-infinity text-white text-4xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-base-content mb-6">The Nimbarka Synthesis</h3>
                <div class="max-w-4xl mx-auto">
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body text-center">
                            <blockquote class="text-xl text-base-content leading-relaxed mb-6">
                                "Neither purely different nor absolutely identical, but eternally both -
                                this is the mystery of <span @mouseenter="showTooltip('dvaitadvaita', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-semibold cursor-help">द्वैताद्वैत</span>"
                            </blockquote>
                            <cite class="text-primary font-medium">- Vedanta Parijata Saurabha</cite>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Explanations -->
            <div class="space-y-8">
                <!-- Philosophical Foundation -->
                <div class="collapse collapse-plus bg-base-200 shadow-lg">
                    <input type="checkbox" class="peer" x-model="sections.foundation">
                    <div class="collapse-title text-xl font-medium text-primary peer-checked:bg-primary-content">
                        <i class="fas fa-foundation mr-3"></i>Philosophical Foundation
                    </div>
                    <div class="collapse-content peer-checked:bg-primary-content">
                        <div class="pt-4 space-y-6">
                            <p class="text-base-content leading-relaxed">
                                Nimbarka's <span @mouseenter="showTooltip('dvaitadvaita', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-medium cursor-help">द्वैताद्वैत</span>
                                philosophy emerges from deep meditation on the Upanishadic statements that appear contradictory.
                                While some texts declare "I am Brahman" (अहं ब्रह्मास्मि), others maintain the eternal relationship
                                between devotee and Divine.
                            </p>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="card bg-primary-content border border-primary">
                                    <div class="card-body">
                                        <h4 class="font-semibold text-primary mb-3">Key Upanishadic Support</h4>
                                        <ul class="text-sm text-base-content space-y-2">
                                            <li>• "सर्वं खल्विदं ब्रह्म" - All this is indeed Brahman</li>
                                            <li>• "तत्त्वमसि" - Thou art That</li>
                                            <li>• "अयमात्मा ब्रह्म" - This Self is Brahman</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card bg-primary-content border border-primary">
                                    <div class="card-body">
                                        <h4 class="font-semibold text-primary mb-3">Devotional Texts</h4>
                                        <ul class="text-sm text-base-content space-y-2">
                                            <li>• Bhagavad Gita's surrender teachings</li>
                                            <li>• Bhagavata's devotional narratives</li>
                                            <li>• Brahma Sutras' relationship discussions</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Analogies -->
                <div class="collapse collapse-plus bg-base-200 shadow-lg">
                    <input type="checkbox" class="peer" x-model="sections.analogies">
                    <div class="collapse-title text-xl font-medium text-primary peer-checked:bg-primary-content">
                        <i class="fas fa-lightbulb mr-3"></i>Classical Analogies
                    </div>
                    <div class="collapse-content peer-checked:bg-primary-content">
                        <div class="pt-4">
                            <div class="grid lg:grid-cols-3 gap-6">

                                <div class="card bg-primary-content border border-primary">
                                    <div class="card-body">
                                        <div class="flex items-center mb-4">
                                            <i class="fas fa-fire text-primary text-2xl mr-3"></i>
                                            <h4 class="font-bold text-primary">Fire & Sparks</h4>
                                        </div>
                                        <p class="text-sm text-base-content mb-3">
                                            Sparks emerge from fire, sharing its luminous nature yet maintaining individual existence.
                                        </p>
                                        <div class="badge badge-primary badge-outline">अग्नि-चिंगारी</div>
                                    </div>
                                </div>

                                <div class="card bg-primary-content border border-primary">
                                    <div class="card-body">
                                        <div class="flex items-center mb-4">
                                            <i class="fas fa-sun text-primary text-2xl mr-3"></i>
                                            <h4 class="font-bold text-primary">Sun & Rays</h4>
                                        </div>
                                        <p class="text-sm text-base-content mb-3">
                                            Sunrays are both different from and non-different from the sun itself.
                                        </p>
                                        <div class="badge badge-primary badge-outline">सूर्य-किरण</div>
                                    </div>
                                </div>

                                <div class="card bg-primary-content border border-primary">
                                    <div class="card-body">
                                        <div class="flex items-center mb-4">
                                            <i class="fas fa-gem text-primary text-2xl mr-3"></i>
                                            <h4 class="font-bold text-primary">Gem & Reflections</h4>
                                        </div>
                                        <p class="text-sm text-base-content mb-3">
                                            A gem creates multiple reflections, each real yet dependent on the source.
                                        </p>
                                        <div class="badge badge-primary badge-outline">मणि-प्रतिबिंब</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Practical Implications -->
                <div class="collapse collapse-plus bg-base-200 shadow-lg">
                    <input type="checkbox" class="peer" x-model="sections.practical">
                    <div class="collapse-title text-xl font-medium text-primary peer-checked:bg-primary-content">
                        <i class="fas fa-heart mr-3"></i>Practical Spiritual Life
                    </div>
                    <div class="collapse-content peer-checked:bg-primary-content">
                        <div class="pt-4 space-y-6">
                            <p class="text-base-content leading-relaxed">
                                This philosophy directly impacts how we approach spiritual practice,
                                maintaining both intimacy with the Divine and respect for transcendence.
                            </p>

                            <div class="grid md:grid-cols-2 gap-8">
                                <div>
                                    <h4 class="font-bold text-primary mb-4 flex items-center">
                                        <i class="fas fa-praying-hands mr-2"></i>Devotional Practice
                                    </h4>
                                    <ul class="space-y-3 text-base-content">
                                        <li class="flex items-start">
                                            <i class="fas fa-circle text-base text-xs mt-2 mr-3"></i>
                                            <span>Worship with both reverence and intimacy</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-circle text-base text-xs mt-2 mr-3"></i>
                                            <span>Surrender while maintaining individual relationship</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-circle text-base text-xs mt-2 mr-3"></i>
                                            <span>See Divine in all, serve all as Divine</span>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <h4 class="font-bold text-primary mb-4 flex items-center">
                                        <i class="fas fa-lotus text-primary mr-2"></i>Meditation Approach
                                    </h4>
                                    <ul class="space-y-3 text-base-content">
                                        <li class="flex items-start">
                                            <i class="fas fa-circle text-base text-sm mt-2 mr-3"></i>
                                            <span>Contemplate unity without losing personal devotion</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-circle text-base text-xs mt-2 mr-3"></i>
                                            <span>Experience oneness through loving service</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-circle text-base text-xs mt-2 mr-3"></i>
                                            <span>Balance <span @mouseenter="showTooltip('jnana', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-medium cursor-help">ज्ञान</span> and <span @mouseenter="showTooltip('bhakti', $event)" @mouseleave="hideTooltip" class="tooltip-trigger text-primary font-medium cursor-help">भक्ति</span></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparison Table -->
                <div class="collapse collapse-plus bg-base-200 shadow-lg">
                    <input type="checkbox" class="peer" x-model="sections.comparison">
                    <div class="collapse-title text-xl font-medium text-primary peer-checked:bg-primary-content">
                        <i class="fas fa-balance-scale mr-3"></i>Comparison with Other Schools
                    </div>
                    <div class="collapse-content peer-checked:bg-primary-content">
                        <div class="pt-4">
                            <div class="overflow-x-auto">
                                <table class="table table-zebra w-full">
                                    <thead>
                                        <tr class="bg-primary-content">
                                            <th class="font-bold text-base">Aspect</th>
                                            <th class="font-bold text-base">Advaita (Shankara)</th>
                                            <th class="font-bold text-base">Dvaita-Advaita (Nimbarka)</th>
                                            <th class="font-bold text-base">Dvaita (Madhva)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-medium">Soul-God Relationship</td>
                                            <td>Absolute identity</td>
                                            <td>Different yet non-different</td>
                                            <td>Eternal difference</td>
                                        </tr>
                                        <tr>
                                            <td class="font-medium">Liberation Goal</td>
                                            <td>Dissolution of individuality</td>
                                            <td>Loving unity with distinction</td>
                                            <td>Eternal service</td>
                                        </tr>
                                        <tr>
                                            <td class="font-medium">Devotion's Role</td>
                                            <td>Preliminary practice</td>
                                            <td>Ultimate realization</td>
                                            <td>Eternal relationship</td>
                                        </tr>
                                        <tr>
                                            <td class="font-medium">World's Reality</td>
                                            <td>Illusory (Maya)</td>
                                            <td>Real transformation of Brahman</td>
                                            <td>Independent reality</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Texts -->
            <div class="mt-16">
                <h3 class="text-3xl font-bold text-primary text-center mb-8">Foundational Texts</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="card bg-primary-content shadow-lg hover:shadow-xl transition-shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-book-open text-3xl text-primary mb-4"></i>
                            <h4 class="card-title justify-center text-primary">Vedanta Parijata Saurabha</h4>
                            <p class="text-base-content text-sm">Nimbarka's primary commentary on Brahma Sutras</p>
                            <div class="badge badge-primary badge-outline mx-auto">Primary Source</div>
                        </div>
                    </div>

                    <div class="card bg-primary-content shadow-lg hover:shadow-xl transition-shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-scroll text-3xl text-primary mb-4"></i>
                            <h4 class="card-title justify-center text-primary">Dasha Shloki</h4>
                            <p class="text-base-content text-sm">Ten essential verses on Dvaita-Advaita philosophy</p>
                            <div class="badge badge-primary badge-outline mx-auto">Concise Teaching</div>
                        </div>
                    </div>

                    <div class="card bg-primary-content justify-center text-center shadow-lg hover:shadow-xl transition-shadow">
                        <div class="card-body text-center">
                            <i class="fas fa-feather-alt text-3xl text-primary mb-4"></i>
                            <h4 class="card-title justify-center text-primary">Upanishad Bhashya</h4>
                            <p class="text-base-content text-sm">Commentaries on principal Upanishads</p>
                            <div class="badge badge-primary badge-outline mx-auto">Scriptural Analysis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function philosophyPage() {
            return {
                sections: {
                    foundation: false
                    , analogies: false
                    , practical: false
                    , comparison: false
                }
                , tooltip: {
                    show: false
                    , x: 0
                    , y: 0
                    , content: ''
                },

                tooltipContent: {
                    jiva: '<strong>जीव (Jiva)</strong><br>Individual soul or conscious being experiencing material existence.'
                    , brahman: '<strong>ब्रह्म (Brahman)</strong><br>Supreme Reality, the ultimate ground of all existence.'
                    , bhakti: '<strong>भक्ति (Bhakti)</strong><br>Devotional love and surrender to the Divine.'
                    , radhakrishna: '<strong>राधा-कृष्ण</strong><br>The Divine Couple representing perfect love and unity.'
                    , dvaitadvaita: '<strong>द्वैताद्वैत</strong><br>Philosophy of simultaneous difference and non-difference between soul and Supreme.'
                    , jnana: '<strong>ज्ञान (Jnana)</strong><br>Spiritual knowledge and wisdom leading to realization.'
                },

                showTooltip(term, event) {
                    this.tooltip.content = this.tooltipContent[term] || '';
                    this.tooltip.x = event.pageX + 10;
                    this.tooltip.y = event.pageY - 10;
                    this.tooltip.show = true;
                },

                hideTooltip() {
                    this.tooltip.show = false;
                }
            }
        }

    </script>
</div>
