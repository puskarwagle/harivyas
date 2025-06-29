<div>
    <div class="container mx-auto px-4 py-8 max-w-4xl" x-data="rulesData()">

        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">
                Ashram Rules & Guidelines
            </h1>
            <p class="text-lg text-base-content/70 max-w-2xl mx-auto">
                Guidelines for maintaining the sacred atmosphere and spiritual discipline of our ashram
            </p>
        </div>

        <!-- Quick Navigation -->
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <template x-for="section in sections" :key="section.id">
                <button class="btn btn-sm btn-outline" @click="scrollToSection(section.id)" x-text="section.name"></button>
            </template>
        </div>

        <!-- Important Notice -->
        <div class="alert alert-info mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h3 class="font-bold">Welcome to Our Sacred Space</h3>
                <div class="text-sm">These guidelines help maintain the spiritual atmosphere for all visitors and residents. Please read carefully before your visit.</div>
            </div>
        </div>

        <!-- Rules Sections -->
        <div class="space-y-12">

            <!-- General Conduct -->
            <section :id="'section-' + sections[0].id">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-primary rounded-full"></div>
                    <h2 class="text-2xl font-bold">General Conduct</h2>
                </div>

                <div class="space-y-4">
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <div class="alert alert-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-semibold">Maintain Noble Silence</span>
                            </div>
                            <ul class="list-disc list-inside space-y-2 text-sm ml-4">
                                <li>Speak softly and only when necessary during prayer times</li>
                                <li>Observe complete silence in meditation halls and temples</li>
                                <li>Use respectful language at all times</li>
                                <li>Avoid gossip, criticism, or negative conversations</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <div class="alert alert-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.732 15.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                                <span class="font-semibold">Dress Code Requirements</span>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4 text-sm">
                                <div>
                                    <h4 class="font-semibold mb-2">For Men:</h4>
                                    <ul class="list-disc list-inside space-y-1 ml-4">
                                        <li>Full-length pants (no shorts)</li>
                                        <li>Shirts with sleeves</li>
                                        <li>Traditional dhoti for temple entry</li>
                                        <li>Remove shoes before entering buildings</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-2">For Women:</h4>
                                    <ul class="list-disc list-inside space-y-1 ml-4">
                                        <li>Modest clothing covering shoulders and knees</li>
                                        <li>Saree or salwar kameez preferred</li>
                                        <li>Head covering in main temple</li>
                                        <li>Remove shoes before entering buildings</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Prayer & Worship -->
            <section :id="'section-' + sections[1].id">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-secondary rounded-full"></div>
                    <h2 class="text-2xl font-bold">Prayer & Worship</h2>
                </div>

                <div class="space-y-4">
                    <div class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h3 class="font-bold">Strictly Prohibited</h3>
                            <div class="text-sm">Photography/videography during prayers, mobile phones in temple, eating non-vegetarian food on premises</div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body">
                                <h3 class="card-title text-lg">Temple Etiquette</h3>
                                <ul class="list-disc list-inside space-y-2 text-sm">
                                    <li>Wash hands and feet before entering</li>
                                    <li>Bow respectfully to the deities</li>
                                    <li>Participate in aarti and kirtan</li>
                                    <li>Accept prasadam with both hands</li>
                                    <li>Exit walking backwards (don't turn your back to deities)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body">
                                <h3 class="card-title text-lg">Prayer Timings</h3>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span>Morning Aarti:</span>
                                        <span class="font-semibold">5:00 AM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Bhog Aarti:</span>
                                        <span class="font-semibold">12:00 PM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Evening Aarti:</span>
                                        <span class="font-semibold">6:00 PM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Night Aarti:</span>
                                        <span class="font-semibold">8:30 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Accommodation -->
            <section :id="'section-' + sections[2].id">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-accent rounded-full"></div>
                    <h2 class="text-2xl font-bold">Accommodation Guidelines</h2>
                </div>

                <div class="space-y-4">
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title text-lg">Room Rules</h3>
                            <div class="grid md:grid-cols-2 gap-6 mt-4">
                                <div>
                                    <h4 class="font-semibold text-success mb-2">✓ Allowed</h4>
                                    <ul class="list-disc list-inside space-y-1 text-sm ml-4">
                                        <li>Personal spiritual books and items</li>
                                        <li>Simple vegetarian snacks</li>
                                        <li>Meditation cushions/mats</li>
                                        <li>Traditional musical instruments</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-error mb-2">✗ Not Allowed</h4>
                                    <ul class="list-disc list-inside space-y-1 text-sm ml-4">
                                        <li>Alcohol or intoxicating substances</li>
                                        <li>Non-vegetarian food items</li>
                                        <li>Loud music or entertainment</li>
                                        <li>Smoking in any form</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold">Check-in/Check-out</h3>
                            <div class="text-sm">Check-in: After 2:00 PM | Check-out: Before 11:00 AM | Late arrivals must inform in advance</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Food & Prasadam -->
            <section :id="'section-' + sections[3].id">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-warning rounded-full"></div>
                    <h2 class="text-2xl font-bold">Food & Prasadam</h2>
                </div>

                <div class="space-y-4">
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <div class="alert alert-success mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-semibold">100% Vegetarian Ashram</span>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-semibold mb-2">Meal Guidelines:</h4>
                                    <ul class="list-disc list-inside space-y-1 text-sm ml-4">
                                        <li>All meals are offered to the deities first</li>
                                        <li>Eat prasadam with gratitude and reverence</li>
                                        <li>No wastage of food - take only what you can consume</li>
                                        <li>Maintain silence during meals when requested</li>
                                        <li>Help with serving and cleaning as seva</li>
                                    </ul>
                                </div>

                                <div class="divider"></div>

                                <div class="grid md:grid-cols-3 gap-4 text-center">
                                    <div class="stat bg-primary/10 rounded-lg">
                                        <div class="stat-title">Breakfast</div>
                                        <div class="stat-value text-lg">8:00 AM</div>
                                        <div class="stat-desc">Light prasadam</div>
                                    </div>
                                    <div class="stat bg-secondary/10 rounded-lg">
                                        <div class="stat-title">Lunch</div>
                                        <div class="stat-value text-lg">12:30 PM</div>
                                        <div class="stat-desc">Full meal</div>
                                    </div>
                                    <div class="stat bg-accent/10 rounded-lg">
                                        <div class="stat-title">Dinner</div>
                                        <div class="stat-value text-lg">7:00 PM</div>
                                        <div class="stat-desc">Simple fare</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Health & Safety -->
            <section :id="'section-' + sections[4].id">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-error rounded-full"></div>
                    <h2 class="text-2xl font-bold">Health & Safety</h2>
                </div>

                <div class="space-y-4">
                    <div class="alert alert-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.732 15.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                        <div>
                            <h3 class="font-bold">Health Declaration Required</h3>
                            <div class="text-sm">Inform management of any medical conditions, allergies, or medications before stay</div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body">
                                <h3 class="card-title text-lg">Emergency Procedures</h3>
                                <ul class="list-disc list-inside space-y-2 text-sm">
                                    <li>Emergency contact: Available 24/7 at reception</li>
                                    <li>First aid kit locations marked throughout ashram</li>
                                    <li>Nearest hospital: 15 minutes by vehicle</li>
                                    <li>Fire assembly point: Main courtyard</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card bg-base-200 shadow-sm">
                            <div class="card-body">
                                <h3 class="card-title text-lg">Personal Safety</h3>
                                <ul class="list-disc list-inside space-y-2 text-sm">
                                    <li>Keep valuables in provided lockers</li>
                                    <li>Walk carefully on wet marble floors</li>
                                    <li>Use handrails on stairs and steps</li>
                                    <li>Report any maintenance issues immediately</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Agreement Section -->
        <div class="mt-16">
            <div class="card bg-gradient-to-r from-primary/5 to-secondary/5 border border-primary/20">
                <div class="card-body text-center">
                    <h3 class="card-title justify-center text-primary mb-4">Acknowledgment</h3>
                    <p class="text-base-content/70 mb-6 max-w-2xl mx-auto">
                        By entering our ashram premises, you agree to follow these guidelines and help maintain our sacred atmosphere.
                        These rules ensure a peaceful environment for spiritual practice and mutual respect among all visitors.
                    </p>
                    <div class="card-actions justify-center">
                        <button class="btn btn-primary">I Understand & Agree</button>
                        <button class="btn btn-outline">Download Rules PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function rulesData() {
            return {
                sections: [{
                        id: 'general'
                        , name: 'General Conduct'
                    }
                    , {
                        id: 'prayer'
                        , name: 'Prayer & Worship'
                    }
                    , {
                        id: 'accommodation'
                        , name: 'Accommodation'
                    }
                    , {
                        id: 'food'
                        , name: 'Food & Prasadam'
                    }
                    , {
                        id: 'safety'
                        , name: 'Health & Safety'
                    }
                ],

                scrollToSection(sectionId) {
                    const element = document.getElementById('section-' + sectionId);
                    if (element) {
                        element.scrollIntoView({
                            behavior: 'smooth'
                            , block: 'start'
                        });
                    }
                }
            }
        }

    </script>
</div>
