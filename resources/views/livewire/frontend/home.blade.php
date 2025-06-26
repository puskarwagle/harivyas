	<div>
	    <div class="snap-y snap-mandatory overflow-y-scroll h-screen bg-gradient-to-br from-base-250 via-base-150 to-base-100">
	        <!-- Hero Section -->
	        <section class="hero snap-start min-h-[calc(100vh-100px)] relative overflow-hidden">
	            <div class="hero-content text-center z-10">
	                <div class="max-w-4xl">
	                    <div class="mb-8">
	                        {{-- <h1 class="text-6xl md:text-8xl font-bold text-primary mb-4 font-serif">{{ __('home.title_main') }}</h1> --}}
	                        <h2 class="shree text-4xl md:text-6xl font-bold text-primary mb-2" x-text="$store.lang.trans('title_main')"></h2>
	                    </div>

	                    {{-- <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
	                        <a href="/nimbarka-sampradaya" class="btn btn-neutral btn-lg">
	                            <i class="fas fa-book-open mr-2"></i>
	                            {{ __('home.explore_philosophy') }}
	                        </a>
	                        <a href="/schedule" class="btn btn-secondary btn-lg">
	                            <i class="fas fa-clock mr-2"></i>
	                            {{ __('home.visit_schedule') }}
	                        </a>
	                        <a href="/donate" class="btn btn-success btn-lg">
	                            <i class="fas fa-heart mr-2"></i>
	                            {{ __('home.support_us') }}
	                        </a>
	                    </div> --}}

	                    <div class="stats stats-vertical lg:stats-horizontal md:stats-horizontal shadow-lg bg-base-100/80 backdrop-blur-sm">
	                        <div class="stat place-items-center">
	                            <div class="stat-title text-primary">{{ __('home.daily_aartis') }}</div>
	                            <div class="stat-value text-3xl text-primary">3</div>
	                            <div class="stat-desc">6AM • 12PM • 7PM</div>
	                        </div>
	                        <div class="stat place-items-center">
	                            <div class="stat-title text-primary">{{ __('home.founded') }}</div>
	                            <div class="stat-value text-3xl text-primary">1980</div>
	                            <div class="stat-desc">{{ __('home.years_of_seva') }}</div>
	                        </div>
	                        <div class="stat place-items-center">
	                            <div class="stat-title text-primary">{{ __('home.lineage') }}</div>
	                            <div class="stat-value text-3xl text-primary">5121+</div>
	                            <div class="stat-desc">{{ __('home.years_of_tradition') }}</div>
	                        </div>
	                    </div>

	                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 animate-bounce cursor-pointer" onclick="document.getElementById('section2').scrollIntoView({ behavior: 'smooth' })">
	                        <i class="fas fa-chevron-down text-2xl text-primary"></i>
	                    </div>
	                </div>
	            </div>
	        </section>

	        <section id="section2" class="snap-start min-h-screen flex items-center">
	            <div class="container mx-auto px-4 py-20">
	                <h2 class="text-4xl font-bold text-center text-primary mb-4">{{ __('home.discover_our_ashram') }}</h2>
	                <p class="text-center text-base-content/80 mb-12 max-w-2xl mx-auto">{{ __('home.ashram_description') }}</p>

	                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
	                    <div class="card shadow-xl hover:shadow-2xl bg-base-100 transition-all duration-300 group cursor-pointer" @click="window.location.href='/philosophy/dvaita-advaita'">
	                        <div class="card-body text-center">
	                            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">📿</div>
	                            <h3 class="card-title justify-center text-primary mb-2">{{ __('home.philosophy') }}</h3>
	                            <p class="text-base-content">{{ __('home.philosophy_desc') }}</p>
	                        </div>
	                    </div>

	                    <div class="card shadow-xl hover:shadow-2xl bg-base-100 transition-all duration-300 group cursor-pointer" @click="window.location.href='/parampara'">
	                        <div class="card-body text-center">
	                            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🙏</div>
	                            <h3 class="card-title justify-center text-primary mb-2">{{ __('home.parampara') }}</h3>
	                            <p class="text-base-content">{{ __('home.parampara_desc') }}</p>
	                        </div>
	                    </div>

	                    <div class="card shadow-xl hover:shadow-2xl bg-base-100 transition-all duration-300 group cursor-pointer" @click="window.location.href='/daily-life/schedule'">
	                        <div class="card-body text-center">
	                            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🌅</div>
	                            <h3 class="card-title justify-center text-primary mb-2">{{ __('home.daily_life') }}</h3>
	                            <p class="text-base-content">{{ __('home.daily_life_desc') }}</p>
	                        </div>
	                    </div>

	                    <div class="card shadow-xl hover:shadow-2xl bg-base-100 transition-all duration-300 group cursor-pointer" @click="window.location.href='/seva-opportunities'">
	                        <div class="card-body text-center">
	                            <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">🤝</div>
	                            <h3 class="card-title justify-center text-primary mb-2">{{ __('home.seva') }}</h3>
	                            <p class="text-base-content">{{ __('home.seva_desc') }}</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>

	        <section class="snap-start min-h-screen flex items-center">
	            <div class="container mx-auto px-4 py-20">
	                <div class="max-w-4xl mx-auto">
	                    <h2 class="text-4xl font-bold text-center text-primary mb-12">{{ __('home.todays_schedule') }}</h2>

	                    <div class="grid md:grid-cols-3 gap-6">
	                        <div class="card bg-base-100 shadow-xl">
	                            <div class="card-body text-center">
	                                <div class="text-3xl mb-4">🌅</div>
	                                <h3 class="card-title justify-center text-primary">{{ __('home.morning_aarti') }}</h3>
	                                <div class="text-2xl font-bold text-primary my-4">6:00 AM</div>
	                                <p class="text-base-content/80">{{ __('home.mangala_aarti') }}</p>
	                                <p class="text-sm text-base-content/70 mt-2">{{ __('home.start_day_blessings') }}</p>
	                            </div>
	                        </div>

	                        <div class="card bg-base-100 shadow-xl">
	                            <div class="card-body text-center">
	                                <div class="text-3xl mb-4">☀️</div>
	                                <h3 class="card-title justify-center text-primary">{{ __('home.noon_bhog') }}</h3>
	                                <div class="text-2xl font-bold text-primary my-4">12:00 PM</div>
	                                <p class="text-base-content/80">{{ __('home.rajbhog_aarti') }}</p>
	                                <p class="text-sm text-base-content/70 mt-2">{{ __('home.sacred_offering') }}</p>
	                            </div>
	                        </div>

	                        <div class="card bg-base-100 shadow-xl">
	                            <div class="card-body text-center">
	                                <div class="text-3xl mb-4">🌙</div>
	                                <h3 class="card-title justify-center text-primary">{{ __('home.evening_aarti') }}</h3>
	                                <div class="text-2xl font-bold text-primary my-4">7:00 PM</div>
	                                <p class="text-base-content/80">{{ __('home.sayan_aarti') }}</p>
	                                <p class="text-sm text-base-content/70 mt-2">{{ __('home.conclude_evening') }}</p>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="text-center mt-8">
	                        <a href="/daily-life/schedule" class="btn btn-primary">
	                            <i class="fas fa-calendar mr-2"></i>
	                            {{ __('home.view_full_schedule') }}
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </section>

	        <section class="snap-start min-h-screen flex items-center">
	            <div class="container mx-auto px-4 py-20 text-center">
	                <h2 class="shree text-4xl font-bold text-primary mb-12">{{ __('home.sacred_teachings') }}</h2>

	                {{-- @php
                $todaysQuote = \App\Models\Quote::getTodaysOrLatestQuote();
                @endphp


                @if($todaysQuote)
                <div class="card shadow-xl">
                    <div class="card-body bg-base-100">
                        <div class="text-6xl text-primary/60 mb-4">"</div>

                        <blockquote id="quote-hi" class="text-xl text-base-content italic mb-6 leading-relaxed">
                            {{ $todaysQuote->quote_hi }}
	                </blockquote>

	                <blockquote id="quote-en" class="text-xl text-base-content italic mb-6 leading-relaxed">
	                    {{ $todaysQuote->quote_en }}
	                </blockquote>

	                <div class="text-right space-y-1">
	                    <cite id="author-hi" class="block text-primary font-semibold">
	                        - {{ $todaysQuote->author_hindi }}
	                    </cite>
	                    <cite id="author-en" class="block text-primary font-semibold">
	                        - {{ $todaysQuote->author_english }}
	                    </cite>
	                </div>
	            </div>
	    </div>
	    @endif --}}

	    <div class="space-y-4">
	        <div class="flex items-center p-4 bg-base-100 rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" @click="window.location.href='/sacred_texts/vedanta-parijata-saurabha'">
	            <div class="text-3xl mr-4">📖</div>
	            <div>
	                <h3 class="font-semibold text-base-content">{{ __('home.vedanta_title') }}</h3>
	                <p class="text-sm text-base-content/80">{{ __('home.vedanta') }}</p>
	            </div>
	            <i class="fas fa-chevron-right ml-auto text-primary"></i>
	        </div>

	        <div class="flex items-center p-4 bg-base-100 rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" @click="window.location.href='/sacred_texts/dasha-shloki'">
	            <div class="text-3xl mr-4">📜</div>
	            <div>
	                <h3 class="font-semibold text-base-content">{{ __('home.dasha_title') }}</h3>
	                <p class="text-sm text-base-content/80">{{ __('home.dasha') }}</p>
	            </div>
	            <i class="fas fa-chevron-right ml-auto text-primary"></i>
	        </div>

	        <div class="flex items-center p-4 bg-base-100 rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" @click="window.location.href='/kirtan'">
	            <div class="text-3xl mr-4">🎵</div>
	            <div>
	                <h3 class="font-semibold text-base-content">{{ __('home.kirtan_title') }}</h3>
	                <p class="text-sm text-base-content/80">{{ __('home.kirtan') }}</p>
	            </div>
	            <i class="fas fa-chevron-right ml-auto text-primary"></i>
	        </div>

	        <div class="flex items-center p-4 bg-base-100 rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer" @click="window.location.href='/festivals'">
	            <div class="text-3xl mr-4">🎉</div>
	            <div>
	                <h3 class="font-semibold text-base-content">{{ __('home.festivals_title') }}</h3>
	                <p class="text-sm text-base-content/80">{{ __('home.festivals') }}</p>
	            </div>
	            <i class="fas fa-chevron-right ml-auto text-primary"></i>
	        </div>
	    </div>
	</div>
	</section>

	<section class="snap-start min-h-screen flex items-center">
	    <div class="container mx-auto px-4 text-center">
	        <h2 class="text-4xl font-bold text-primary mb-6">{{ __('home.join_community') }}</h2>
	        <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
	            {{ __('home.join_community_desc') }}
	        </p>

	        <div class="flex flex-col sm:flex-row gap-4 justify-center">
	            <a href="/contact" class="btn btn-secondary btn-lg border-base-100 hover:bg-base-100">
	                <i class="fas fa-map-marker-alt mr-2"></i>
	                {{ __('home.visit_us') }}
	            </a>
	            <a href="/seva/ashram-life" class="btn btn-neutral btn-lg border-base-100 text-primary hover:bg-base-100 hover:text-primary">
	                <i class="fas fa-home mr-2"></i>
	                {{ __('home.ashram_life') }}
	            </a>
	            <a href="/seva/donate" class="btn btn-accent btn-lg border-base-100 hover:bg-base-100">
	                <i class="fas fa-heart mr-2"></i>
	                {{ __('home.donate') }}
	            </a>
	        </div>
	    </div>
	</section>
	</div>
</div>
