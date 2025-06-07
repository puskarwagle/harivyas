<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="luxury">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">

    {{-- Load Tailwind CSS and your JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .shree {
            font-family: 'Noto Sans Devanagari', sans-serif;
            font-size: 2rem;
        }

    </style>
</head>
<body style="background-color: #121212; color: #e0e0e0;">

    <header x-data="{ menuOpen: false }">
        <div class="navbar bg-base-100 shadow-sm">
            <!-- NAVBAR START - Mobile hamburger + Logo -->
            <div class="navbar-start">
                <!-- Mobile Hamburger -->
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
                <a class="btn btn-ghost text-xl ml-2 lg:ml-0" href="/">
                    <svg width="40" height="40" viewBox="0 0 100 150" xmlns="http://www.w3.org/2000/svg" class="lg:w-[50px] lg:h-[50px]">
                        <path d="M30 20 C30 60, 30 120, 50 120 C70 120, 70 60, 70 20" stroke="goldenrod" stroke-width="8" fill="none" />
                        <circle cx="50" cy="70" r="5" fill="red" />
                    </svg>
                    <button class="shree btn-text-base-content" href="{{ route('home') }}" wire:navigate>श्री हरि व्यास</button>
                    {{-- <span class="hidden sm:inline">{{ __('menu.nimbarka') }}</span> --}}
                </a>
            </div>

            <!-- NAVBAR CENTER - Desktop menu -->
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal bg-base-200 rounded-box px-1" style="z-index: 1000;">
                    <li>
                        <a href="{{ route('home') }}" wire:navigate>{{ __('menu.home') }}</a>
                    </li>

                    <li>
                        <details>
                            <summary>{{ __('menu.about') }}</summary>
                            <ul class="w-60">
                                <li><a href="{{ route('history') }}" wire:navigate>{{ __('menu.history') }}</a></li>
                                <li><a href="{{ route('maharaj-ji') }}" wire:navigate>{{ __('menu.maharaj') }}</a></li>
                                <li><a href="{{ route('nimbarka-sampradaya') }}" wire:navigate>{{ __('menu.sampradaya') }}</a></li>
                            </ul>
                        </details>
                    </li>

                    <li>
                        <details>
                            <summary>{{ __('menu.philosophy') }}</summary>
                            <ul class="w-48">
                                <li><a href="{{ route('dvaitaAdvaita') }}" wire:navigate>{{ __('menu.dvaitadvaita') }}</a></li>
                                <li><a href="{{ route('radha-krishna-bhakti') }}" wire:navigate>{{ __('menu.bhakti') }}</a></li>
                                <li><a href="{{ route('sadhana') }}" wire:navigate>{{ __('menu.sadhana') }}</a></li>
                                <li><a href="{{ route('moksha') }}" wire:navigate>{{ __('menu.moksha') }}</a></li>
                            </ul>
                        </details>
                    </li>

                    <li>
                        <details>
                            <summary>{{ __('menu.parampara') }}</summary>
                            <ul class="w-64">
                                <!-- Harivyās Nikuñja Paramparā -->
                                <li>
                                    <details>
                                        <summary>Harivyās Nikuñja Paramparā</summary>
                                        <ul>
                                            <li><a href="{{ route('parampara.harivyas-nikunja.nimbarkacharya') }}" wire:navigate>Śrī Nimbārkācārya</a></li>
                                            <li><a href="{{ route('parampara.harivyas-nikunja.keshavakashmiri') }}" wire:navigate>Śrī Keśavakāśmīri Ācārya</a></li>
                                            <li><a href="{{ route('parampara.harivyas-nikunja.bhattadev') }}" wire:navigate>Śrī Bhaṭṭadeva Ācārya</a></li>
                                            <li><a href="{{ route('parampara.harivyas-nikunja.harivyasdev') }}" wire:navigate>Śrī Harivyāsadeva Ācārya</a></li>
                                        </ul>
                                    </details>
                                </li>

                                <!-- Nimbārkācārya Pīṭha Paramparā -->
                                <li>
                                    <details>
                                        <summary>Nimbārkācārya Pīṭha Paramparā</summary>
                                        <ul>
                                            <li><a href="{{ route('parampara.nimbarkacharya-pitha.nimbarkacharya') }}" wire:navigate>Śrī Nimbārkācārya</a></li>
                                            <li><a href="{{ route('parampara.nimbarkacharya-pitha.keshavakashmiri') }}" wire:navigate>Śrī Keśavakāśmīri Ācārya</a></li>
                                            <li><a href="{{ route('parampara.nimbarkacharya-pitha.bhattadev') }}" wire:navigate>Śrī Bhaṭṭadeva Ācārya</a></li>
                                        </ul>
                                    </details>
                                </li>

                                <!-- Kāṭhiyā Bābā Paramparā -->
                                <li>
                                    <details>
                                        <summary>Kāṭhiyā Pīṭha Paramparā</summary>
                                        <ul>
                                            <li><a href="{{ route('parampara.kathiya-baba.kathiya-baba') }}" wire:navigate>Śrī Kāṭhiyā Bābā</a></li>
                                        </ul>
                                    </details>
                                </li>
                            </ul>
                        </details>
                    </li>

                    <li>
                        <details>
                            <summary>{{ __('menu.daily_life') }}</summary>
                            <ul class="w-48">
                                <li><a href="{{ route('schedule') }}" wire:navigate>{{ __('menu.schedule') }}</a></li>
                                <li><a href="{{ route('prasadam') }}" wire:navigate>{{ __('menu.prasadam') }}</a></li>
                                <li><a href="{{ route('rules') }}" wire:navigate>{{ __('menu.rules') }}</a></li>
                            </ul>
                        </details>
                    </li>

                    <li>
                        <a href="{{ route('festivals') }}" wire:navigate>{{ __('menu.festivals') }}</a>
                    </li>

                    <li>
                        <details>
                            <summary>{{ __('menu.seva') }}</summary>
                            <ul class="w-52">
                                <li><a href="{{ route('seva-opportunities') }}" wire:navigate>{{ __('menu.volunteer') }}</a></li>
                                <li><a href="{{ route('ashram-life') }}" wire:navigate>{{ __('menu.ashram_life') }}</a></li>
                                <li><a href="{{ route('donate') }}" wire:navigate>{{ __('menu.donate') }}</a></li>
                            </ul>
                        </details>
                    </li>

                    <li>
                        <details>
                            <summary>{{ __('menu.texts') }}</summary>
                            <ul class="w-64">
                                <li><a href="{{ route('texts.vedanta-parijata-saurabha') }}" wire:navigate>{{ __('menu.vedanta') }}</a></li>
                                <li><a href="{{ route('texts.dasha-shloki') }}" wire:navigate>{{ __('menu.dasha') }}</a></li>
                                <li><a href="{{ route('texts.mahavani') }}" wire:navigate>{{ __('menu.mahavani') }}</a></li>
                            </ul>
                        </details>
                    </li>

                    <li><a href="{{ route('gallery') }}" wire:navigate>{{ __('menu.gallery') }}</a></li>
                    <li><a href="{{ route('digital-media') }}" wire:navigate>{{ __('menu.media') }}</a></li>
                    <li><a href="{{ route('faq') }}" wire:navigate>{{ __('menu.faq') }}</a></li>
                    <li><a href="{{ route('contact') }}" wire:navigate>{{ __('menu.contact') }}</a></li>
                </ul>
            </div>


            <!-- NAVBAR END - Theme toggle + User menu -->
            <div class="navbar-end">
                <form id="langToggleForm" method="GET" action="{{ route('lang.switch', app()->getLocale() === 'en' ? 'hi' : 'en') }}">
                    <label class="swap cursor-pointer mr-2">
                        <input type="checkbox" onchange="document.getElementById('langToggleForm').submit()" {{ app()->getLocale() === 'hi' ? 'checked' : '' }} />
                        <div class="swap-on text-sm">🇬🇧</div> <!-- Show this when checkbox is checked (Hindi is active) -->
                        <div class="swap-off text-sm">🇮🇳</div> <!-- Show this when checkbox is unchecked (English is active) -->
                    </label>
                </form>

                <label class="toggle text-base-content m-1">
                    <input type="checkbox" value="dark" class="theme-controller" />
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


                @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">

                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="m-1">
                            {{-- light Mode SVG --}}
                            <svg id="lightFace" class="theme-face" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 100 100" style="border-radius: 50%; display: block;">
                                <circle cx="50" cy="50" r="48" style="stroke:#ccc; stroke-width:4; fill:#eee;" />
                                <circle cx="50" cy="35" r="12" style="fill:#bbb;" />
                                <path d="M30,75 Q50,55 70,75" style="fill:#bbb;" />
                            </svg>
                            {{-- dark Mode SVG --}}
                            <svg id="darkFace" class="theme-face" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 100 100" style="border-radius: 50%; display: block;">
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
            <ul class="menu bg-base-200 rounded-box mx-4 shadow-lg">
                <li>
                    <a href="{{ route('home') }}" wire:navigate>{{ __('menu.home') }}</a>
                </li>

                <li>
                    <details>
                        <summary>{{ __('menu.about') }}</summary>
                        <ul class="w-60">
                            <li><a href="{{ route('history') }}" wire:navigate>{{ __('menu.history') }}</a></li>
                            <li><a href="{{ route('maharaj-ji') }}" wire:navigate>{{ __('menu.maharaj') }}</a></li>
                            <li><a href="{{ route('nimbarka-sampradaya') }}" wire:navigate>{{ __('menu.sampradaya') }}</a></li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details>
                        <summary>{{ __('menu.philosophy') }}</summary>
                        <ul class="w-48">
                            <li><a href="{{ route('dvaitaAdvaita') }}" wire:navigate>{{ __('menu.dvaitadvaita') }}</a></li>
                            <li><a href="{{ route('radha-krishna-bhakti') }}" wire:navigate>{{ __('menu.bhakti') }}</a></li>
                            <li><a href="{{ route('sadhana') }}" wire:navigate>{{ __('menu.sadhana') }}</a></li>
                            <li><a href="{{ route('moksha') }}" wire:navigate>{{ __('menu.moksha') }}</a></li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details>
                        <summary>{{ __('menu.parampara') }}</summary>
                        <ul class="w-64">
                            <!-- Harivyās Nikuñja Paramparā -->
                            <li>
                                <details>
                                    <summary>Harivyās Nikuñja Paramparā</summary>
                                    <ul>
                                        <li><a href="{{ route('parampara.harivyas-nikunja.nimbarkacharya') }}" wire:navigate>Śrī Nimbārkācārya</a></li>
                                        <li><a href="{{ route('parampara.harivyas-nikunja.keshavakashmiri') }}" wire:navigate>Śrī Keśavakāśmīri Ācārya</a></li>
                                        <li><a href="{{ route('parampara.harivyas-nikunja.bhattadev') }}" wire:navigate>Śrī Bhaṭṭadeva Ācārya</a></li>
                                        <li><a href="{{ route('parampara.harivyas-nikunja.harivyasdev') }}" wire:navigate>Śrī Harivyāsadeva Ācārya</a></li>
                                    </ul>
                                </details>
                            </li>

                            <!-- Nimbārkācārya Pīṭha Paramparā -->
                            <li>
                                <details>
                                    <summary>Nimbārkācārya Pīṭha Paramparā</summary>
                                    <ul>
                                        <li><a href="{{ route('parampara.nimbarkacharya-pitha.nimbarkacharya') }}" wire:navigate>Śrī Nimbārkācārya</a></li>
                                        <li><a href="{{ route('parampara.nimbarkacharya-pitha.keshavakashmiri') }}" wire:navigate>Śrī Keśavakāśmīri Ācārya</a></li>
                                        <li><a href="{{ route('parampara.nimbarkacharya-pitha.bhattadev') }}" wire:navigate>Śrī Bhaṭṭadeva Ācārya</a></li>
                                    </ul>
                                </details>
                            </li>

                            <!-- Kāṭhiyā Bābā Paramparā -->
                            <li>
                                <details>
                                    <summary>Kāṭhiyā Pīṭha Paramparā</summary>
                                    <ul>
                                        <li><a href="{{ route('parampara.kathiya-baba.kathiya-baba') }}" wire:navigate>Śrī Kāṭhiyā Bābā</a></li>
                                    </ul>
                                </details>
                            </li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details>
                        <summary>{{ __('menu.daily_life') }}</summary>
                        <ul class="w-48">
                            <li><a href="{{ route('schedule') }}" wire:navigate>{{ __('menu.schedule') }}</a></li>
                            <li><a href="{{ route('prasadam') }}" wire:navigate>{{ __('menu.prasadam') }}</a></li>
                            <li><a href="{{ route('rules') }}" wire:navigate>{{ __('menu.rules') }}</a></li>
                        </ul>
                    </details>
                </li>

                <li>
                    <a href="{{ route('festivals') }}" wire:navigate>{{ __('menu.festivals') }}</a>
                </li>

                <li>
                    <details>
                        <summary>{{ __('menu.seva') }}</summary>
                        <ul class="w-52">
                            <li><a href="{{ route('seva-opportunities') }}" wire:navigate>{{ __('menu.volunteer') }}</a></li>
                            <li><a href="{{ route('ashram-life') }}" wire:navigate>{{ __('menu.ashram_life') }}</a></li>
                            <li><a href="{{ route('donate') }}" wire:navigate>{{ __('menu.donate') }}</a></li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details>
                        <summary>{{ __('menu.texts') }}</summary>
                        <ul class="w-64">
                            <li><a href="{{ route('texts.vedanta-parijata-saurabha') }}" wire:navigate>{{ __('menu.vedanta') }}</a></li>
                            <li><a href="{{ route('texts.dasha-shloki') }}" wire:navigate>{{ __('menu.dasha') }}</a></li>
                            <li><a href="{{ route('texts.mahavani') }}" wire:navigate>{{ __('menu.mahavani') }}</a></li>
                        </ul>
                    </details>
                </li>

                <li><a href="{{ route('gallery') }}" wire:navigate>{{ __('menu.gallery') }}</a></li>
                <li><a href="{{ route('digital-media') }}" wire:navigate>{{ __('menu.media') }}</a></li>
                <li><a href="{{ route('faq') }}" wire:navigate>{{ __('menu.faq') }}</a></li>
                <li><a href="{{ route('contact') }}" wire:navigate>{{ __('menu.contact') }}</a></li>
            </ul>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer footer-center p-10 bg-base-200 text-base-content">
        <div>
            <div class="text-3xl mb-4">🕉️</div>
            <p class="font-bold text-base-content">श्री हरि व्यास निकुंज मंदिर</p>
            <p class="text-primary">वृंदावन धाम, उत्तर प्रदेश</p>
            <p class="text-primary">Spreading Radha-Krishna Bhakti since 1950</p>
        </div>

        <div>
            <div class="grid grid-flow-col gap-4">
                <a href="/contact" class="link link-hover">Contact</a>
                <a href="/faq" class="link link-hover">FAQ</a>
                <a href="/seva/donate" class="link link-hover">Donate</a>
                <a href="/gallery" class="link link-hover">Gallery</a>
            </div>
        </div>

        <div>
            <p class="text-sm text-primary">
                © 2024 Shri Hari Vyas Nikunja Mandir. All rights reserved.
            </p>
        </div>
    </footer>

    @if (Route::has('login'))
    <div></div>
    @endif
    @livewireScripts
</body>
</html>
