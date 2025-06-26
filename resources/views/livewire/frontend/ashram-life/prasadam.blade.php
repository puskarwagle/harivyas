<div>
    <div x-data="prasadamPage()" class="min-h-screen">
        <!-- Hero Section -->
        <div class="hero bg-gradient-to-r from-primary/10 to-accent/10 py-20">
            <div class="hero-content text-center">
                <div class="max-w-2xl">
                    <h1 class="shree text-5xl font-bold text-primary mb-4">प्रसादम्</h1>
                    <h2 class="text-3xl font-semibold text-success mb-4">Sacred Offerings</h2>
                    <p class="text-lg text-base-content leading-relaxed">
                        Divine food blessed by Shri Radha Krishna, prepared with devotion and offered with love
                    </p>
                </div>
            </div>
        </div>

        <!-- Significance Section -->
        <div class="container mx-auto px-4 py-16">
            <div class="grid lg:grid-cols-2 gap-12 mb-16">
                <div class="card bg-gradient-to-br from-primary/10 to-accent/10 shadow-xl border border-primary">
                    <div class="card-body">
                        <h3 class="card-title text-2xl text-primary mb-4">
                            <i class="fas fa-om text-primary mr-3"></i>
                            Significance of Prasadam
                        </h3>
                        <div class="space-y-4 text-base-content">
                            <p>प्रसाद means "mercy" or "grace" - food that has been offered to the Divine and blessed by Their touch.</p>
                            <p>In Nimbarka Sampradaya, prasadam is considered the direct mercy of Shri Radha Krishna, purifying both body and soul.</p>
                            <p>Every grain is prepared with devotional consciousness and offered with complete surrender.</p>
                        </div>
                    </div>
                </div>

                <div class="card bg-gradient-to-br from-info/10 to-info/5 shadow-xl border border-info">
                    <div class="card-body">
                        <h3 class="card-title text-2xl text-info mb-4">
                            <i class="fas fa-heart text-error mr-3"></i>
                            Preparation Guidelines
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-success mr-3"></i>
                                <span>Prepared in meditation and chanting</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-success mr-3"></i>
                                <span>Only pure vegetarian ingredients</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-success mr-3"></i>
                                <span>No onion, garlic, or mushrooms</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-success mr-3"></i>
                                <span>Offered to deities before serving</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-success mr-3"></i>
                                <span>Served with love and reverence</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="tabs tabs-boxed justify-center mb-8 bg-error-100">
                <button class="tab" :class="{'tab-active': activeFilter === 'all'}" @click="activeFilter = 'all'">
                    All Items
                </button>
                <button class="tab" :class="{'tab-active': activeFilter === 'daily'}" @click="activeFilter = 'daily'">
                    Daily Prasadam
                </button>
                <button class="tab" :class="{'tab-active': activeFilter === 'festival'}" @click="activeFilter = 'festival'">
                    Festival Special
                </button>
                <button class="tab" :class="{'tab-active': activeFilter === 'sweet'}" @click="activeFilter = 'sweet'">
                    Sweets
                </button>
                <button class="tab" :class="{'tab-active': activeFilter === 'drink'}" @click="activeFilter = 'drink'">
                    Beverages
                </button>
            </div>

            <!-- Prasadam Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="item in filteredItems" :key="item.id">
                    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow duration-300">
                        <figure class="px-4 pt-4">
                            <img :src="item.image" :alt="item.name" class="rounded-xl h-48 w-full object-cover">
                        </figure>
                        <div class="card-body">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="card-title text-orange-800" x-text="item.name"></h3>
                                <div class="badge badge-outline badge-sm" :class="getCategoryBadge(item.category)" x-text="item.category">
                                </div>
                            </div>

                            <p class="text-gray-600 text-sm mb-3" x-text="item.description"></p>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-1 mb-3">
                                <template x-for="tag in item.tags" :key="tag">
                                    <span class="badge badge-xs" :class="getTagColor(tag)" x-text="tag">
                                    </span>
                                </template>
                            </div>

                            <!-- Timing -->
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <i class="fas fa-clock mr-2"></i>
                                <span x-text="item.timing"></span>
                            </div>

                            <!-- Significance -->
                            <div class="collapse collapse-arrow bg-orange-50">
                                <input type="checkbox" class="peer">
                                <div class="collapse-title text-sm font-medium text-orange-700">
                                    Spiritual Significance
                                </div>
                                <div class="collapse-content text-sm text-gray-600">
                                    <p x-text="item.significance"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Offering Guidelines -->
            <div class="mt-20">
                <h2 class="text-3xl font-bold text-orange-800 text-center mb-12">Prasadam Offering Guidelines</h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="card bg-gradient-to-br from-orange-50 to-amber-50 shadow-lg">
                        <div class="card-body text-center">
                            <i class="fas fa-hands-praying text-3xl text-orange-600 mb-4"></i>
                            <h4 class="font-bold text-orange-800 mb-2">Before Eating</h4>
                            <p class="text-sm text-gray-600">Offer gratitude to Shri Radha Krishna and remember Their mercy</p>
                        </div>
                    </div>

                    <div class="card bg-gradient-to-br from-blue-50 to-indigo-50 shadow-lg">
                        <div class="card-body text-center">
                            <i class="fas fa-utensils text-3xl text-blue-600 mb-4"></i>
                            <h4 class="font-bold text-blue-800 mb-2">While Eating</h4>
                            <p class="text-sm text-gray-600">Eat mindfully in silence or soft chanting, with reverence</p>
                        </div>
                    </div>

                    <div class="card bg-gradient-to-br from-green-50 to-emerald-50 shadow-lg">
                        <div class="card-body text-center">
                            <i class="fas fa-share-alt text-3xl text-green-600 mb-4"></i>
                            <h4 class="font-bold text-green-800 mb-2">Sharing</h4>
                            <p class="text-sm text-gray-600">Share prasadam with others as spreading Divine mercy</p>
                        </div>
                    </div>

                    <div class="card bg-gradient-to-br from-purple-50 to-pink-50 shadow-lg">
                        <div class="card-body text-center">
                            <i class="fas fa-leaf text-3xl text-purple-600 mb-4"></i>
                            <h4 class="font-bold text-purple-800 mb-2">Respect</h4>
                            <p class="text-sm text-gray-600">Never waste prasadam; treat every grain as sacred</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daily Schedule -->
            <div class="mt-16">
                <div class="card bg-gradient-to-r from-orange-100 to-amber-100 shadow-xl">
                    <div class="card-body">
                        <h3 class="card-title text-2xl text-orange-800 mb-6 justify-center">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            Daily Prasadam Schedule
                        </h3>

                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-orange-700">6:30 AM</div>
                                <div class="text-sm text-gray-600 mt-1">Mangal Aarti Prasadam</div>
                                <div class="text-xs text-gray-500">Fruits & Mishri</div>
                            </div>

                            <div class="text-center">
                                <div class="text-2xl font-bold text-orange-700">12:30 PM</div>
                                <div class="text-sm text-gray-600 mt-1">Raj Bhog</div>
                                <div class="text-xs text-gray-500">Full Meal & Sweets</div>
                            </div>

                            <div class="text-center">
                                <div class="text-2xl font-bold text-orange-700">4:00 PM</div>
                                <div class="text-sm text-gray-600 mt-1">Evening Snacks</div>
                                <div class="text-xs text-gray-500">Namkeen & Chai</div>
                            </div>

                            <div class="text-center">
                                <div class="text-2xl font-bold text-orange-700">8:00 PM</div>
                                <div class="text-sm text-gray-600 mt-1">Sandhya Aarti</div>
                                <div class="text-xs text-gray-500">Light Prasadam</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function prasadamPage() {
            return {
                activeFilter: 'all'
                , prasadamItems: [{
                        id: 1
                        , name: 'Kheer'
                        , category: 'daily'
                        , description: 'Traditional rice pudding made with milk, rice, and jaggery, flavored with cardamom'
                        , image: 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=400&h=300&fit=crop'
                        , tags: ['Sweet', 'Dairy', 'Traditional']
                        , timing: 'Daily after Raj Bhog'
                        , significance: 'Kheer represents the sweetness of devotion and is especially dear to Krishna. It symbolizes the pure love between devotee and Divine.'
                    }
                    , {
                        id: 2
                        , name: 'Puri Sabzi'
                        , category: 'daily'
                        , description: 'Fresh puffed bread served with seasonal vegetable curry'
                        , image: 'https://images.unsplash.com/photo-1606491956689-2ea866880c84?w=400&h=300&fit=crop'
                        , tags: ['Main Course', 'Fresh', 'Filling']
                        , timing: 'Daily Raj Bhog - 12:30 PM'
                        , significance: 'Simple yet nutritious meal representing contentment with basic necessities while focusing on spiritual growth.'
                    }
                    , {
                        id: 3
                        , name: 'Laddu'
                        , category: 'sweet'
                        , description: 'Round sweet balls made from gram flour, ghee, and sugar'
                        , image: 'https://images.unsplash.com/photo-1631515243349-e0cb75fb8d3a?w=400&h=300&fit=crop'
                        , tags: ['Sweet', 'Festival', 'Ghee']
                        , timing: 'Special occasions and festivals'
                        , significance: 'The round shape represents completeness and wholeness, symbolizing the eternal nature of the soul.'
                    }
                    , {
                        id: 4
                        , name: 'Panchamrit'
                        , category: 'drink'
                        , description: 'Sacred mixture of milk, yogurt, honey, ghee, and sugar'
                        , image: 'https://images.unsplash.com/photo-1563227812-0ea4c22fad72?w=400&h=300&fit=crop'
                        , tags: ['Sacred', 'Liquid', 'Purifying']
                        , timing: 'During abhishek and special ceremonies'
                        , significance: 'The five nectars represent the five elements and purify the devotee both physically and spiritually.'
                    }
                    , {
                        id: 5
                        , name: 'Makhan Mishri'
                        , category: 'daily'
                        , description: 'Fresh butter mixed with rock sugar crystals'
                        , image: 'https://images.unsplash.com/photo-1628773822990-2b1b5ce5b1be?w=400&h=300&fit=crop'
                        , tags: ['Sweet', 'Pure', 'Krishna Special']
                        , timing: 'Morning Mangal Aarti'
                        , significance: 'Krishna\'s favorite combination, representing His childhood pastimes and innocence. Connects us to His Vrindavan leelas.'
                    }
                    , {
                        id: 6
                        , name: 'Seasonal Fruits'
                        , category: 'daily'
                        , description: 'Fresh seasonal fruits offered with gratitude'
                        , image: 'https://images.unsplash.com/photo-1559181567-c3190ca9959b?w=400&h=300&fit=crop'
                        , tags: ['Fresh', 'Natural', 'Healthy']
                        , timing: 'All aartis throughout the day'
                        , significance: 'Nature\'s pure offerings represent simplicity and natural devotion, acknowledging God in all creation.'
                    }
                    , {
                        id: 7
                        , name: 'Shrikhand'
                        , category: 'festival'
                        , description: 'Sweetened strained yogurt flavored with cardamom and saffron'
                        , image: 'https://images.unsplash.com/photo-1628078642912-d7d61da6d4fe?w=400&h=300&fit=crop'
                        , tags: ['Sweet', 'Cooling', 'Festive']
                        , timing: 'Special festivals and celebrations'
                        , significance: 'The cooling nature represents peace and tranquility that comes from spiritual practice and devotion.'
                    }
                    , {
                        id: 8
                        , name: 'Tulsi Chai'
                        , category: 'drink'
                        , description: 'Sacred basil tea with mild spices and jaggery'
                        , image: 'https://images.unsplash.com/photo-1571934811356-5cc061b6821f?w=400&h=300&fit=crop'
                        , tags: ['Herbal', 'Sacred', 'Warming']
                        , timing: 'Evening time - 4:00 PM'
                        , significance: 'Tulsi is most sacred to Vishnu. This tea purifies thoughts and enhances devotional mood.'
                    }
                    , {
                        id: 9
                        , name: 'Peda'
                        , category: 'sweet'
                        , description: 'Milk-based sweet rounds flavored with cardamom'
                        , image: 'https://images.unsplash.com/photo-1606162616372-c2e5d4fac36e?w=400&h=300&fit=crop'
                        , tags: ['Sweet', 'Milk', 'Traditional']
                        , timing: 'Festivals and special occasions'
                        , significance: 'Made primarily from milk, representing nourishment and maternal love of the Divine Mother.'
                    }
                    , {
                        id: 10
                        , name: 'Dalia Kheer'
                        , category: 'festival'
                        , description: 'Broken wheat pudding with nuts and dry fruits'
                        , image: 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=300&fit=crop'
                        , tags: ['Nutritious', 'Festival', 'Rich']
                        , timing: 'Major festivals and celebrations'
                        , significance: 'Represents abundance and prosperity that comes through devotional service and Divine grace.'
                    }
                    , {
                        id: 11
                        , name: 'Charanamrit'
                        , category: 'drink'
                        , description: 'Sacred water from deity bathing mixed with tulsi leaves'
                        , image: 'https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=400&h=300&fit=crop'
                        , tags: ['Sacred', 'Purifying', 'Holy']
                        , timing: 'After all aartis'
                        , significance: 'Most sacred prasadam that has directly touched the deity. Purifies sins and grants spiritual advancement.'
                    }
                    , {
                        id: 12
                        , name: 'Samosa'
                        , category: 'festival'
                        , description: 'Crispy pastry filled with spiced potatoes and peas'
                        , image: 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=400&h=300&fit=crop'
                        , tags: ['Fried', 'Savory', 'Festival']
                        , timing: 'Special celebrations and community feasts'
                        , significance: 'Community preparation brings devotees together in service, representing unity in devotional activities.'
                    }
                ],

                get filteredItems() {
                    if (this.activeFilter === 'all') {
                        return this.prasadamItems;
                    }
                    return this.prasadamItems.filter(item => item.category === this.activeFilter);
                },

                getCategoryBadge(category) {
                    const badges = {
                        'daily': 'badge-warning'
                        , 'festival': 'badge-secondary'
                        , 'sweet': 'badge-error'
                        , 'drink': 'badge-info'
                    };
                    return badges[category] || 'badge-neutral';
                },

                getTagColor(tag) {
                    const colors = {
                        'Sweet': 'badge-error'
                        , 'Dairy': 'badge-info'
                        , 'Traditional': 'badge-warning'
                        , 'Main Course': 'badge-success'
                        , 'Fresh': 'badge-accent'
                        , 'Filling': 'badge-neutral'
                        , 'Festival': 'badge-secondary'
                        , 'Ghee': 'badge-warning'
                        , 'Sacred': 'badge-primary'
                        , 'Liquid': 'badge-info'
                        , 'Purifying': 'badge-success'
                        , 'Pure': 'badge-accent'
                        , 'Krishna Special': 'badge-error'
                        , 'Natural': 'badge-success'
                        , 'Healthy': 'badge-accent'
                        , 'Cooling': 'badge-info'
                        , 'Festive': 'badge-secondary'
                        , 'Herbal': 'badge-success'
                        , 'Warming': 'badge-warning'
                        , 'Milk': 'badge-info'
                        , 'Nutritious': 'badge-success'
                        , 'Rich': 'badge-warning'
                        , 'Holy': 'badge-primary'
                        , 'Fried': 'badge-warning'
                        , 'Savory': 'badge-neutral'
                    };
                    return colors[tag] || 'badge-outline';
                }
            }
        }

    </script>
</div>
