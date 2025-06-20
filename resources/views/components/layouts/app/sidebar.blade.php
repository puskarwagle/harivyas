<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" data-theme="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-base-100">
    <div x-data="{
        sidebarOpen: false,
        collapsed: localStorage.getItem('sidebar-collapsed') === 'true',
        toggle() {
            this.collapsed = !this.collapsed;
            localStorage.setItem('sidebar-collapsed', this.collapsed);
        },
        openSidebar() {
            this.sidebarOpen = true;
        },
        closeSidebar() {
            this.sidebarOpen = false;
        }
    }" class="drawer lg:drawer-open">

        <input type="checkbox" class="drawer-toggle" x-model="sidebarOpen" />

        <div class="drawer-content flex flex-col">
            <div class="navbar bg-base-100 lg:hidden border-b border-base-300">
                <div class="flex-none">
                    <button @click="openSidebar()" class="btn btn-square btn-ghost">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <div class="flex-none" style="border: 0px solid red;">
                    <div class="dropdown dropdown-end" style="position: absolute; right: 0; top: 0;margin-top: 0.5rem; margin-right: 0.5rem;">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full bg-neutral-600 text-neutral-content uppercase" style="display: flex; align-items: center; justify-content: center;">
                                {{ auth()->user()->initials() }}
                            </div>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52 border border-base-300">
                            <li class="menu-title">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-base-300 text-neutral-content flex items-center justify-center text-xs">
                                        {{ auth()->user()->initials() }}
                                    </div>
                                    <div>
                                        <div class="font-semibold">{{ auth()->user()->name }}</div>
                                        <div class="text-xs opacity-60">{{ auth()->user()->email }}</div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{ route('settings.profile') }}" wire:navigate>Settings</a></li>
                            <li>
                                <form method="POST" action="{{ url('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <main class="flex-1 p-4">
                {{ $slot }}
            </main>
        </div>

        <div class="drawer-side">
            <label class="drawer-overlay" @click="closeSidebar()"></label>
            <aside :class="(collapsed ? 'w-20' : 'w-64') + ' min-h-full bg-base-200 transition-all duration-300 relative border-r border-base-300'">

                <button @click="toggle()" class="hidden lg:block absolute -right-3 top-6 z-10 w-6 h-6 bg-base-100 border border-base-300 rounded-full btn btn-xs btn-circle">
                    <svg :class="collapsed ? 'rotate-180' : ''" class="w-3 h-3 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button @click="closeSidebar()" class="lg:hidden absolute top-4 right-4 btn btn-sm btn-circle btn-ghost">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="p-6">
                    <a href="{{ route('home') }}" :class="collapsed ? 'justify-center' : 'flex items-center gap-2'" wire:navigate>
                        <x-app-logo class="w-8 h-8" />
                    </a>
                </div>

                {{-- Mid section --}}
                <div class="px-4 pb-4">
                    <div class="mb-6">
                        <h3 x-show="!collapsed" x-transition class="text-xs font-semibold text-base-content/60 uppercase tracking-wider mb-2 px-2">
                            Platform
                        </h3>
                        <ul class="menu menu-sm">
                            <li>
                                <a href="{{ route('dashboard') }}" :class="(collapsed ? 'justify-center px-2' : '') + ' {{ request()->routeIs('dashboard') ? 'active' : '' }}'" wire:navigate>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span x-show="!collapsed" x-transition>Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-6">
                        <h3 x-show="!collapsed" x-transition class="font-semibold text-base-content/60 uppercase tracking-wider mb-2 px-2">
                            BADALAV
                        </h3>
                        <ul class="menu menu-sm">
                            <li>
                                <a href="{{ route('gallerymanager.create') }}" :class="(collapsed ? 'justify-center uppercase px-2' : '') + ' {{ request()->routeIs('gallerymanager.create') ? 'active' : '' }}'" wire:navigate>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span x-show="!collapsed" x-transition>Gallery</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faqmanager') }}" :class="(collapsed ? 'justify-center px-2' : '') + ' {{ request()->routeIs('faqmanager') ? 'active' : '' }}'" wire:navigate>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span x-show="!collapsed" x-transition>FAQ</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- Bottom bits --}}
                    <div class="border-t border-base-300 pt-4 mb-6 absolute bottom-0 left-0 right-0">
                        <ul class="menu menu-sm">
                            <li>
                                <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" :class="collapsed ? 'justify-center px-2' : ''">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 1v4m8-4v4" />
                                    </svg>
                                    <span x-show="!collapsed" x-transition>Repository</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank" :class="collapsed ? 'justify-center px-2' : ''">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span x-show="!collapsed" x-transition>Documentation</span>
                                </a>
                            </li>
                        </ul>
                        <div class="border-t border-base-300 pt-4">
                            <div x-data="{ userMenuOpen: false }" class="relative">
                                <button @click="userMenuOpen = !userMenuOpen" :class="(collapsed ? 'justify-center px-2' : '') + ' w-full flex items-center gap-2 p-2 rounded-lg hover:bg-base-300 transition-colors'">
                                    <div class="w-8 h-8 rounded-lg bg-neutral text-neutral-content flex items-center justify-center text-sm font-medium">
                                        {{ auth()->user()->initials() }}
                                    </div>
                                    <div x-show="!collapsed" x-transition class="flex-1 text-left">
                                        <div class="font-semibold text-sm">{{ auth()->user()->name }}</div>
                                        <div class="text-xs text-base-content/60">{{ auth()->user()->email }}</div>
                                    </div>
                                    <svg x-show="!collapsed" :class="userMenuOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="userMenuOpen" x-transition @click.away="userMenuOpen = false" :class="(collapsed ? 'left-20' : 'left-0') + ' absolute bottom-full mb-2 w-56 bg-base-100 border border-base-300 rounded-lg shadow-lg z-50'">
                                    <div class="p-4 border-b border-base-300">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-lg bg-neutral text-neutral-content flex items-center justify-center text-sm font-medium">
                                                {{ auth()->user()->initials() }}
                                            </div>
                                            <div>
                                                <div class="font-semibold text-sm">{{ auth()->user()->name }}</div>
                                                <div class="text-xs text-base-content/60">{{ auth()->user()->email }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <a href="{{ route('settings.profile') }}" wire:navigate class="flex items-center gap-2 px-3 py-2 text-sm rounded-lg hover:bg-base-200 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Settings
                                        </a>
                                        <form method="POST" action="{{ url('logout') }}">
                                            @csrf
                                            <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm rounded-lg hover:bg-base-200 transition-colors text-left">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </aside>
        </div>
    </div>
</body>
</html>
