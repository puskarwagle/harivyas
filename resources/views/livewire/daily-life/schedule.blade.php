<div>
    <div x-data="scheduleData()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-base-100 py-16">
            <div class="hero-content text-center">
                <div class="max-w-2xl">
                    <h1 class="text-5xl font-bold text-primary mb-4">दैनिक कार्यक्रम</h1>
                    <h2 class="text-2xl font-semibold text-primary mb-4">Daily Schedule</h2>
                    <p class="text-lg text-base-content">Follow the sacred rhythm of ashram life</p>
                </div>
            </div>
        </div>

        <!-- Schedule Tabs -->
        <div class="container mx-auto px-4 py-12">
            <!-- Tab Navigation -->
            <div class="tabs tabs-boxed justify-center mb-8 bg-base-100">
                <button class="tab" :class="{'tab-active bg-primary text-base-100': activeTab === 'daily'}" @click="activeTab = 'daily'">
                    <i class="fas fa-sun mr-2"></i>
                    Daily Schedule
                </button>
                <button class="tab" :class="{'tab-active bg-primary text-base-100': activeTab === 'festivals'}" @click="activeTab = 'festivals'">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Festival Days
                </button>
                <button class="tab" :class="{'tab-active bg-primary text-base-100': activeTab === 'special'}" @click="activeTab = 'special'">
                    <i class="fas fa-star mr-2"></i>
                    Special Occasions
                </button>
            </div>

            <!-- Daily Schedule Tab -->
            <div x-show="activeTab === 'daily'" x-transition>
                <!-- Current Time Indicator -->
                <div class="alert alert-info mb-8">
                    <i class="fas fa-clock"></i>
                    <div>
                        <span class="font-semibold">Current Time: </span>
                        <span x-text="currentTime"></span>
                        <span class="ml-4 font-semibold">Next Activity: </span>
                        <span x-text="nextActivity" class="text-primary"></span>
                    </div>
                </div>

                <!-- Schedule Table -->
                <div class="card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body">
                        <h3 class="card-title text-primary mb-6">
                            <i class="fas fa-sun text-primary"></i>
                            Regular Daily Schedule
                        </h3>

                        <div class="overflow-x-auto">
                            <table class="table table-zebra w-full">
                                <thead>
                                    <tr class="bg-base-100">
                                        <th class="text-primary">Time</th>
                                        <th class="text-primary">Activity</th>
                                        <th class="text-primary">Details</th>
                                        <th class="text-primary">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="activity in dailySchedule" :key="activity.id">
                                        <tr :class="{'bg-orange-100': activity.isActive}">
                                            <td class="font-mono font-bold" x-text="activity.time"></td>
                                            <td>
                                                <div class="flex items-center">
                                                    <i :class="activity.icon + ' mr-3 text-primary'"></i>
                                                    <div>
                                                        <div class="font-semibold" x-text="activity.name"></div>
                                                        <div class="text-sm text-base-content" x-text="activity.sanskrit"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-sm" x-text="activity.details"></td>
                                            <td>
                                                <div class="flex flex-wrap gap-1">
                                                    <template x-for="badge in activity.badges">
                                                        <span class="badge badge-sm" :class="getBadgeClass(badge)" x-text="badge"></span>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Important Notes -->
                <div class="grid md:grid-cols-2 gap-6 mt-8">
                    <div class="card bg-base-100 border border-base-200">
                        <div class="card-body">
                            <h4 class="card-title text-primary">
                                <i class="fas fa-info-circle"></i>
                                Important Notes
                            </h4>
                            <ul class="space-y-2 text-sm">
                                <li>• Please arrive 10 minutes before aarti times</li>
                                <li>• Mobile phones should be silent during prayers</li>
                                <li>• Proper dress code required for temple entry</li>
                                <li>• Photography allowed only in designated areas</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card bg-base-100 border border-base-200">
                        <div class="card-body">
                            <h4 class="card-title text-primary">
                                <i class="fas fa-hands-praying"></i>
                                For Visitors
                            </h4>
                            <ul class="space-y-2 text-sm">
                                <li>• Ashram opens at 5:00 AM daily</li>
                                <li>• Guided tours available after morning aarti</li>
                                <li>• Prasadam distributed after each aarti</li>
                                <li>• Evening satsang includes kirtan and discourse</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Festival Schedule Tab -->
            <div x-show="activeTab === 'festivals'" x-transition>
                <div class="card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body">
                        <h3 class="card-title text-primary mb-6">
                            <i class="fas fa-calendar-alt text-primary"></i>
                            Festival Day Schedule
                        </h3>

                        <div class="overflow-x-auto">
                            <table class="table table-zebra w-full">
                                <thead>
                                    <tr class="bg-base-100">
                                        <th class="text-primary">Time</th>
                                        <th class="text-primary">Activity</th>
                                        <th class="text-primary">Special Features</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="activity in festivalSchedule" :key="activity.id">
                                        <tr>
                                            <td class="font-mono font-bold" x-text="activity.time"></td>
                                            <td>
                                                <div class="flex items-center">
                                                    <i :class="activity.icon + ' mr-3 text-primary'"></i>
                                                    <div>
                                                        <div class="font-semibold" x-text="activity.name"></div>
                                                        <div class="text-sm text-base-content" x-text="activity.sanskrit"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-sm" x-text="activity.special"></div>
                                                <div class="flex flex-wrap gap-1 mt-1">
                                                    <template x-for="badge in activity.badges">
                                                        <span class="badge badge-warning badge-sm" x-text="badge"></span>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning mt-6">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Festival schedules may vary. Please check with ashram authorities for specific dates and timings.</span>
                </div>
            </div>

            <!-- Special Occasions Tab -->
            <div x-show="activeTab === 'special'" x-transition>
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Ekadashi Schedule -->
                    <div class="card bg-base-100 shadow-xl border border-base-200">
                        <div class="card-body">
                            <h4 class="card-title text-primary">
                                <i class="fas fa-moon text-primary"></i>
                                Ekadashi Days
                            </h4>
                            <div class="overflow-x-auto">
                                <table class="table table-sm">
                                    <tbody>
                                        <template x-for="activity in ekadashiSchedule" :key="activity.id">
                                            <tr>
                                                <td class="font-mono text-sm" x-text="activity.time"></td>
                                                <td>
                                                    <div class="text-sm font-semibold" x-text="activity.name"></div>
                                                    <div class="text-xs text-base-content" x-text="activity.details"></div>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="badge badge-info badge-sm mt-4">Fasting Day</div>
                        </div>
                    </div>

                    <!-- Parikrama Schedule -->
                    <div class="card bg-base-100 shadow-xl border border-base-200">
                        <div class="card-body">
                            <h4 class="card-title text-primary">
                                <i class="fas fa-walking text-primary"></i>
                                Parikrama Days
                            </h4>
                            <div class="overflow-x-auto">
                                <table class="table table-sm">
                                    <tbody>
                                        <template x-for="activity in parikramaSchedule" :key="activity.id">
                                            <tr>
                                                <td class="font-mono text-sm" x-text="activity.time"></td>
                                                <td>
                                                    <div class="text-sm font-semibold" x-text="activity.name"></div>
                                                    <div class="text-xs text-base-content" x-text="activity.details"></div>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="badge badge-success badge-sm mt-4">Every Thursday</div>
                        </div>
                    </div>
                </div>

                <!-- Seasonal Variations -->
                <div class="card bg-base-100 shadow-xl border border-base-200 mt-6">
                    <div class="card-body">
                        <h4 class="card-title text-primary mb-4">
                            <i class="fas fa-calendar-week text-primary"></i>
                            Seasonal Variations
                        </h4>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-base-100 p-4 rounded-lg">
                                <h5 class="font-semibold text-primary mb-2">
                                    <i class="fas fa-snowflake mr-2"></i>
                                    Winter Schedule (Nov - Feb)
                                </h5>
                                <ul class="text-sm space-y-1">
                                    <li>• Morning aarti: 6:30 AM</li>
                                    <li>• Evening aarti: 6:30 PM</li>
                                    <li>• Extended satsang sessions</li>
                                    <li>• Hot prasadam served</li>
                                </ul>
                            </div>
                            <div class="bg-base-100 p-4 rounded-lg">
                                <h5 class="font-semibold text-primary mb-2">
                                    <i class="fas fa-sun mr-2"></i>
                                    Summer Schedule (Mar - Oct)
                                </h5>
                                <ul class="text-sm space-y-1">
                                    <li>• Morning aarti: 6:00 AM</li>
                                    <li>• Evening aarti: 7:00 PM</li>
                                    <li>• Afternoon rest period extended</li>
                                    <li>• Cool prasadam varieties</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function scheduleData() {
            return {
                activeTab: 'daily'
                , currentTime: ''
                , nextActivity: '',

                dailySchedule: [{
                        id: 1
                        , time: '5:00 AM'
                        , name: 'Temple Opens'
                        , sanskrit: 'मंदिर खुलना'
                        , details: 'Gates open for devotees'
                        , icon: 'fas fa-door-open'
                        , badges: ['Open']
                        , isActive: false
                    }
                    , {
                        id: 2
                        , time: '5:30 AM'
                        , name: 'Mangal Aarti'
                        , sanskrit: 'मंगल आरती'
                        , details: 'Morning awakening ceremony'
                        , icon: 'fas fa-prayer-hands'
                        , badges: ['Aarti', 'Daily']
                        , isActive: false
                    }
                    , {
                        id: 3
                        , time: '6:00 AM'
                        , name: 'Dhoop Aarti'
                        , sanskrit: 'धूप आरती'
                        , details: 'Incense offering ceremony'
                        , icon: 'fas fa-fire'
                        , badges: ['Aarti', 'Incense']
                        , isActive: false
                    }
                    , {
                        id: 4
                        , time: '7:00 AM'
                        , name: 'Bhog Aarti'
                        , sanskrit: 'भोग आरती'
                        , details: 'Food offering to deities'
                        , icon: 'fas fa-utensils'
                        , badges: ['Aarti', 'Prasadam']
                        , isActive: false
                    }
                    , {
                        id: 5
                        , time: '8:00 AM'
                        , name: 'Prasadam Distribution'
                        , sanskrit: 'प्रसादम् वितरण'
                        , details: 'Blessed food distribution'
                        , icon: 'fas fa-hands-helping'
                        , badges: ['Prasadam', 'Community']
                        , isActive: false
                    }
                    , {
                        id: 6
                        , time: '9:00 AM'
                        , name: 'Scripture Study'
                        , sanskrit: 'शास्त्र अध्ययन'
                        , details: 'Daily study of sacred texts'
                        , icon: 'fas fa-book-open'
                        , badges: ['Study', 'Group']
                        , isActive: false
                    }
                    , {
                        id: 7
                        , time: '12:00 PM'
                        , name: 'Raj Bhog Aarti'
                        , sanskrit: 'राज भोग आरती'
                        , details: 'Midday grand offering'
                        , icon: 'fas fa-crown'
                        , badges: ['Major Aarti', 'Daily']
                        , isActive: false
                    }
                    , {
                        id: 8
                        , time: '2:00 PM'
                        , name: 'Rest Period'
                        , sanskrit: 'विश्राम काल'
                        , details: 'Afternoon rest for deities'
                        , icon: 'fas fa-bed'
                        , badges: ['Rest', 'Quiet Time']
                        , isActive: false
                    }
                    , {
                        id: 9
                        , time: '4:00 PM'
                        , name: 'Temple Reopens'
                        , sanskrit: 'मंदिर पुनः खुलना'
                        , details: 'Evening session begins'
                        , icon: 'fas fa-door-open'
                        , badges: ['Open']
                        , isActive: false
                    }
                    , {
                        id: 10
                        , time: '5:00 PM'
                        , name: 'Sandhya Aarti'
                        , sanskrit: 'संध्या आरती'
                        , details: 'Evening twilight ceremony'
                        , icon: 'fas fa-sun-o'
                        , badges: ['Aarti', 'Evening']
                        , isActive: false
                    }
                    , {
                        id: 11
                        , time: '6:30 PM'
                        , name: 'Kirtan & Satsang'
                        , sanskrit: 'कीर्तन व सत्संग'
                        , details: 'Devotional singing and discourse'
                        , icon: 'fas fa-music'
                        , badges: ['Kirtan', 'Community']
                        , isActive: false
                    }
                    , {
                        id: 12
                        , time: '7:30 PM'
                        , name: 'Shayan Aarti'
                        , sanskrit: 'शयन आरती'
                        , details: 'Night rest ceremony'
                        , icon: 'fas fa-moon'
                        , badges: ['Final Aarti', 'Daily']
                        , isActive: false
                    }
                    , {
                        id: 13
                        , time: '8:00 PM'
                        , name: 'Temple Closes'
                        , sanskrit: 'मंदिर बंद'
                        , details: 'End of daily schedule'
                        , icon: 'fas fa-door-closed'
                        , badges: ['Close']
                        , isActive: false
                    }
                ],

                festivalSchedule: [{
                        id: 1
                        , time: '4:00 AM'
                        , name: 'Special Mangal Aarti'
                        , sanskrit: 'विशेष मंगल आरती'
                        , special: 'Extended ceremony with special bhajans'
                        , icon: 'fas fa-star'
                        , badges: ['Extended', 'Special']
                    }
                    , {
                        id: 2
                        , time: '6:00 AM'
                        , name: 'Abhishek'
                        , sanskrit: 'अभिषेक'
                        , special: 'Sacred bathing of deities'
                        , icon: 'fas fa-tint'
                        , badges: ['Ritual', 'Sacred']
                    }
                    , {
                        id: 3
                        , time: '10:00 AM'
                        , name: 'Special Bhog'
                        , sanskrit: 'विशेष भोग'
                        , special: '56 varieties of food offerings'
                        , icon: 'fas fa-gift'
                        , badges: ['Grand Offering', 'Traditional']
                    }
                    , {
                        id: 4
                        , time: '12:00 PM'
                        , name: 'Maha Aarti'
                        , sanskrit: 'महा आरती'
                        , special: 'Grand ceremony with all devotees'
                        , icon: 'fas fa-fire-alt'
                        , badges: ['Major', 'Community']
                    }
                    , {
                        id: 5
                        , time: '6:00 PM'
                        , name: 'Cultural Programs'
                        , sanskrit: 'सांस्कृतिक कार्यक्रम'
                        , special: 'Dance, music, and drama performances'
                        , icon: 'fas fa-theater-masks'
                        , badges: ['Cultural', 'Entertainment']
                    }
                    , {
                        id: 6
                        , time: '8:00 PM'
                        , name: 'Special Prasadam'
                        , sanskrit: 'विशेष प्रसादम्'
                        , special: 'Festival-specific blessed food'
                        , icon: 'fas fa-birthday-cake'
                        , badges: ['Special', 'Community']
                    }
                ],

                ekadashiSchedule: [{
                        id: 1
                        , time: '5:00 AM'
                        , name: 'Extended Mangal Aarti'
                        , details: 'Longer morning ceremony'
                    }
                    , {
                        id: 2
                        , time: '9:00 AM'
                        , name: 'Bhagavatam Reading'
                        , details: 'Special scripture recitation'
                    }
                    , {
                        id: 3
                        , time: '12:00 PM'
                        , name: 'Fasting Prasadam'
                        , details: 'Fruits and milk only'
                    }
                    , {
                        id: 4
                        , time: '6:00 PM'
                        , name: 'Kirtan Marathon'
                        , details: 'Continuous devotional singing'
                    }
                    , {
                        id: 5
                        , time: '11:00 PM'
                        , name: 'Night Vigil'
                        , details: 'Optional night prayers'
                    }
                ],

                parikramaSchedule: [{
                        id: 1
                        , time: '6:00 AM'
                        , name: 'Departure from Ashram'
                        , details: 'Group assembly and prayers'
                    }
                    , {
                        id: 2
                        , time: '6:30 AM'
                        , name: 'Vrindavan Parikrama'
                        , details: 'Circumambulation with kirtan'
                    }
                    , {
                        id: 3
                        , time: '9:00 AM'
                        , name: 'Temple Visits'
                        , details: 'Various sacred sites'
                    }
                    , {
                        id: 4
                        , time: '11:00 AM'
                        , name: 'Return & Prasadam'
                        , details: 'Back to ashram for meals'
                    }
                ],

                init() {
                    this.updateCurrentTime();
                    setInterval(() => {
                        this.updateCurrentTime();
                    }, 60000); // Update every minute
                },

                updateCurrentTime() {
                    const now = new Date();
                    this.currentTime = now.toLocaleTimeString('en-US', {
                        hour: '2-digit'
                        , minute: '2-digit'
                        , hour12: true
                    });

                    this.updateNextActivity();
                    this.updateActiveActivity();
                },

                updateNextActivity() {
                    const now = new Date();
                    const currentMinutes = now.getHours() * 60 + now.getMinutes();

                    for (let activity of this.dailySchedule) {
                        const activityTime = this.timeToMinutes(activity.time);
                        if (activityTime > currentMinutes) {
                            this.nextActivity = activity.name;
                            return;
                        }
                    }
                    this.nextActivity = 'Temple Opens (Tomorrow)';
                },

                updateActiveActivity() {
                    const now = new Date();
                    const currentMinutes = now.getHours() * 60 + now.getMinutes();

                    this.dailySchedule.forEach((activity, index) => {
                        const activityTime = this.timeToMinutes(activity.time);
                        const nextActivityTime = index < this.dailySchedule.length - 1 ?
                            this.timeToMinutes(this.dailySchedule[index + 1].time) :
                            24 * 60; // End of day

                        activity.isActive = currentMinutes >= activityTime && currentMinutes < nextActivityTime;
                    });
                },

                timeToMinutes(timeStr) {
                    const [time, period] = timeStr.split(' ');
                    let [hours, minutes] = time.split(':').map(Number);

                    if (period === 'PM' && hours !== 12) hours += 12;
                    if (period === 'AM' && hours === 12) hours = 0;

                    return hours * 60 + minutes;
                },

                getBadgeClass(badge) {
                    const classes = {
                        'Aarti': 'badge-primary'
                        , 'Daily': 'badge-info'
                        , 'Major Aarti': 'badge-secondary'
                        , 'Prasadam': 'badge-success'
                        , 'Study': 'badge-warning'
                        , 'Community': 'badge-accent'
                        , 'Open': 'badge-info'
                        , 'Close': 'badge-neutral'
                        , 'Rest': 'badge-ghost'
                        , 'Kirtan': 'badge-primary'
                        , 'Evening': 'badge-secondary'
                        , 'Incense': 'badge-warning'
                        , 'Final Aarti': 'badge-error'
                        , 'Quiet Time': 'badge-neutral'
                    };
                    return classes[badge] || 'badge-outline';
                }
            }
        }

    </script>
</div>
