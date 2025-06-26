<header class="h-16" x-data="{ menuOpen: false }">
    <div class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <!-- Mobile Hamburger Icon -->
            <div class="lg:hidden">
                <button class="btn btn-circle swap swap-rotate" @click="menuOpen = !menuOpen">
                    <svg x-show="!menuOpen" class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                        <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
                    </svg>
                    <svg x-show="menuOpen" class="fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                        <polygon points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
                    </svg>
                </button>
            </div>

            <!-- Logo - Always visible -->
            <a class="btn btn-ghost ml-2 lg:ml-0 flex items-center gap-2 px-2" href="/" wire:navigate>
                <img src="/images/harivyas.jpeg" alt="harivyas" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full">
                <span class="shree text-lg">श्री हरिव्यास</span>
            </a>
        </div>

        <!-- NAVBAR CENTER - Desktop menu -->
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal bg-base-200 rounded-box px-1" style="z-index: 1000;">
                <!-- Core Info -->
                <li>
                    <details>
                        <summary>{{ __('menu.about') }}</summary>
                        <ul class="w-60">
                            <li><a href="/history" wire:navigate>{{ __('menu.history') }}</a></li>
                            <li><a href="/maharaj-ji" wire:navigate>{{ __('menu.maharaj') }}</a></li>
                            <li><a href="/nimbarka-sampradaya" wire:navigate>{{ __('menu.sampradaya') }}</a></li>
                        </ul>
                    </details>
                </li>

                <!-- Lineage -->
                <li>
                    <details>
                        <summary>{{ __('menu.parampara') }}</summary>
                        <ul class="w-72">
                            <li><a href="/parampara/nimbarkacharya" wire:navigate>Śrī Nimbārkācārya</a></li>
                            <li><a href="/parampara/keshavakashmiri" wire:navigate>Śrī Keśavakāśmīri</a></li>
                            <li><a href="/parampara/bhattadev" wire:navigate>Śrī Bhaṭṭadeva</a></li>
                            <li><a href="/parampara/harivyasdev" wire:navigate>Śrī Harivyāsadeva</a></li>
                        </ul>
                    </details>
                </li>

                <!-- Living Practice -->
                <li>
                    <details>
                        <summary>Ashram Life</summary>
                        <ul class="w-56">
                            <li><a href="/festivals" wire:navigate>{{ __('menu.festivals') }}</a></li>
                            <li><a href="/schedule" wire:navigate>{{ __('menu.schedule') }}</a></li>
                            <li><a href="/prasadam" wire:navigate>{{ __('menu.prasadam') }}</a></li>
                            <li><a href="/rules" wire:navigate>{{ __('menu.rules') }}</a></li>
                            <li><a href="/seva-opportunities" wire:navigate>{{ __('menu.volunteer') }}</a></li>
                            <li><a href="/ashram-life" wire:navigate>{{ __('menu.ashram_life') }}</a></li>
                            <li><a href="/donate" wire:navigate>{{ __('menu.donate') }}</a></li>
                        </ul>
                    </details>
                </li>

                <!-- Resources -->
                <li>
                    <details>
                        <summary>Resources</summary>
                        <ul class="w-64">
                            <li><a href="/sacred_texts/vedanta-parijata-saurabha" wire:navigate>{{ __('menu.vedanta') }}</a></li>
                            <li><a href="/sacred_texts/dasha-shloki" wire:navigate>{{ __('menu.dasha') }}</a></li>
                            <li><a href="/sacred_texts/mahavani" wire:navigate>{{ __('menu.mahavani') }}</a></li>
                            <li><a href="/kirtan" wire:navigate>{{ __('menu.kirtan') }}</a></li>
                            <li><a href="/dvaitaAdvaita" wire:navigate>{{ __('menu.dvaitadvaita') }}</a></li>
                            <li><a href="/sadhana" wire:navigate>{{ __('menu.sadhana') }}</a></li>
                            <li><a href="/media" wire:navigate>{{ __('menu.media') }}</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="/gallery" wire:navigate>{{ __('menu.gallery') }}</a></li>
                <li><a href="/faq" wire:navigate>{{ __('menu.faq') }}</a></li>
                <!-- Contact (standalone - always accessible) -->
                <li><a href="/contact" wire:navigate>{{ __('menu.contact') }}</a></li>
            </ul>
        </div>


        <!-- Lang switch - Theme toggle - User menu -->
        <div class="navbar-end">
            <livewire:frontend.language-switcher />

            {{-- Toggle theme by changing value eg forest --}}
            <div class="tooltip tooltip-bottom" data-tip="Change Theme">
                <label class="toggle text-base-content m-1">
                    <input type="checkbox" value="light" id="theme-controller" />
                    <svg aria-label="moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor">
                            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                        </g>
                    </svg>
                    <svg aria-label="sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M12 2v2"></path>
                            <path d="M12 20v2"></path>
                            <path d="m4.93 4.93 1.41 1.41"></path>
                            <path d="m17.66 17.66 1.41 1.41"></path>
                            <path d="M2 12h2"></path>
                            <path d="M20 12h2"></path>
                            <path d="m6.34 17.66-1.41 1.41"></path>
                            <path d="m19.07 4.93-1.41 1.41"></path>
                        </g>
                    </svg>
                </label>
            </div>

            @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="m-1">
                        {{-- light Mode SVG --}}
                        <svg id="lightFace" class="theme-face" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 100 100" style="border-radius: 50%; display: none;">
                            <circle cx="50" cy="50" r="48" style="stroke:#ccc; stroke-width:4; fill:#eee;" />
                            <circle cx="50" cy="35" r="12" style="fill:#bbb;" />
                            <path d="M30,75 Q50,55 70,75" style="fill:#bbb;" />
                        </svg>
                        {{-- dark Mode SVG --}}
                        <svg id="darkFace" class="theme-face" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 100 100" style="border-radius: 50%; display: block;">
                            <circle cx="50" cy="50" r="48" style="stroke:#444; stroke-width:4; fill:#222;" />
                            <circle cx="50" cy="35" r="12" style="fill:#555;" />
                            <path d="M30,75 Q50,55 70,75" style="fill:#555;" />
                        </svg>
                    </div>

                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                        @auth
                        <li>
                            <a href="{{ url('/dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}">
                                Log in
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                </div>
            </nav>
            @endif
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="menuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="lg:hidden absolute top-16 left-0 right-0 z-50">
        <ul class="menu bg-base-200 rounded-box px-1" style="z-index: 1000;">
            <!-- Core Info -->
            <li>
                <details>
                    <summary>{{ __('menu.about') }}</summary>
                    <ul class="w-60">
                        <li><a href="/history" wire:navigate>{{ __('menu.history') }}</a></li>
                        <li><a href="/maharaj-ji" wire:navigate>{{ __('menu.maharaj') }}</a></li>
                        <li><a href="/nimbarka-sampradaya" wire:navigate>{{ __('menu.sampradaya') }}</a></li>
                    </ul>
                </details>
            </li>

            <!-- Lineage -->
            <li>
                <details>
                    <summary>{{ __('menu.parampara') }}</summary>
                    <ul class="w-72">
                        <li><a href="/parampara/nimbarkacharya" wire:navigate>Śrī Nimbārkācārya</a></li>
                        <li><a href="/parampara/keshavakashmiri" wire:navigate>Śrī Keśavakāśmīri</a></li>
                        <li><a href="/parampara/bhattadev" wire:navigate>Śrī Bhaṭṭadeva</a></li>
                        <li><a href="/parampara/harivyasdev" wire:navigate>Śrī Harivyāsadeva</a></li>
                    </ul>
                </details>
            </li>

            <!-- Living Practice -->
            <li>
                <details>
                    <summary>Ashram Life</summary>
                    <ul class="w-56">
                        <li><a href="/festivals" wire:navigate>{{ __('menu.festivals') }}</a></li>
                        <li><a href="/schedule" wire:navigate>{{ __('menu.schedule') }}</a></li>
                        <li><a href="/prasadam" wire:navigate>{{ __('menu.prasadam') }}</a></li>
                        <li><a href="/rules" wire:navigate>{{ __('menu.rules') }}</a></li>
                        <li><a href="/seva-opportunities" wire:navigate>{{ __('menu.volunteer') }}</a></li>
                        <li><a href="/ashram-life" wire:navigate>{{ __('menu.ashram_life') }}</a></li>
                        <li><a href="/donate" wire:navigate>{{ __('menu.donate') }}</a></li>
                    </ul>
                </details>
            </li>

            <!-- Resources -->
            <li>
                <details>
                    <summary>Resources</summary>
                    <ul class="w-64">
                        <li><a href="/sacred_texts/vedanta-parijata-saurabha" wire:navigate>{{ __('menu.vedanta') }}</a></li>
                        <li><a href="/sacred_texts/dasha-shloki" wire:navigate>{{ __('menu.dasha') }}</a></li>
                        <li><a href="/sacred_texts/mahavani" wire:navigate>{{ __('menu.mahavani') }}</a></li>
                        <li><a href="/kirtan" wire:navigate>{{ __('menu.kirtan') }}</a></li>
                        <li><a href="/dvaitaAdvaita" wire:navigate>{{ __('menu.dvaitadvaita') }}</a></li>
                        <li><a href="/sadhana" wire:navigate>{{ __('menu.sadhana') }}</a></li>
                        <li><a href="/media" wire:navigate>{{ __('menu.media') }}</a></li>
                    </ul>
                </details>
            </li>
            <li><a href="/gallery" wire:navigate>{{ __('menu.gallery') }}</a></li>
            <li><a href="/faq" wire:navigate>{{ __('menu.faq') }}</a></li>
            <!-- Contact (standalone - always accessible) -->
            <li><a href="/contact" wire:navigate>{{ __('menu.contact') }}</a></li>
        </ul>
    </div>
    <script>
            // 🌗 Theme Toggle (lightFace / darkFace)
            document.addEventListener("DOMContentLoaded", function() {
                const themeToggle = document.getElementById('theme-controller');
                const lightFace = document.getElementById('lightFace');
                const darkFace = document.getElementById('darkFace');

                if (!themeToggle || !lightFace || !darkFace) {
                    console.warn("Theme toggle setup incomplete.");
                    return;
                }

                function updateFaces() {
                    if (themeToggle.checked) {
                        lightFace.style.display = 'block';
                        darkFace.style.display = 'none';
                    } else {
                        lightFace.style.display = 'none';
                        darkFace.style.display = 'block';
                    }
                }

                themeToggle.addEventListener('change', updateFaces);
                updateFaces();
            });

        </script>
</header>
