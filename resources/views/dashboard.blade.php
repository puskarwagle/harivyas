<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">

            {{-- यूज़र मैनेजर --}}
            <a href="{{ route('usersManager') }}" class="block p-6 bg-base-100 border border-neutral-300 rounded-xl hover:shadow-xl transition-all dark:border-neutral-700 group">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="124" height="124" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <circle cx="9" cy="7" r="4" /></svg>
                    <div class="text-lg font-semibold text-primary">यूज़र प्रबंधन</div>
                    <div class="mt-2 text-sm text-base-content/80">यूज़र्स को जोड़ें, हटाएँ या संपादित करें</div>
                </div>
            </a>

            {{-- पोस्ट बनाएं --}}
            <a href="{{ route('galleryManager.posts.create') }}" class="block p-6 bg-base-100 border border-neutral-300 rounded-xl hover:shadow-xl transition-all dark:border-neutral-700 group">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="124" height="124" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-plus-icon lucide-image-plus">
                        <path d="M16 5h6" />
                        <path d="M19 2v6" />
                        <path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5" />
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                        <circle cx="9" cy="9" r="2" /></svg>
                    <div class="text-lg font-semibold text-primary">नई पोस्ट बनाएं</div>
                    <div class="mt-2 text-sm text-base-content/80">गैलरी में नई पोस्ट जोड़ें</div>
                </div>
            </a>

            {{-- सभी पोस्ट --}}
            <a href="{{ route('galleryManager.images.index') }}" class="block p-6 bg-base-100 border border-neutral-300 rounded-xl hover:shadow-xl transition-all dark:border-neutral-700 group">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="124" height="124" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-images-icon lucide-images">
                        <path d="M18 22H4a2 2 0 0 1-2-2V6" />
                        <path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18" />
                        <circle cx="12" cy="8" r="2" />
                        <rect width="16" height="16" x="6" y="2" rx="2" /></svg>
                    <div class="text-lg font-semibold text-primary">सभी पोस्ट</div>
                    <div class="mt-2 text-sm text-base-content/80">गैलरी में उपलब्ध सभी पोस्ट देखें</div>

                </div>
            </a>

            {{-- सभी चित्र --}}
            {{-- <a href="{{ route('galleryManager.images.index') }}" class="block p-6 bg-base-100 border border-neutral-300 rounded-xl hover:shadow-xl transition-all dark:border-neutral-700 group">
            <div class="flex items-center">
                <i class="fas fa-image text-xl text-primary group-hover:scale-110 transition-transform"></i>
                <div class="text-lg font-semibold text-primary">सभी चित्र</div>
            </div>
            <div class="mt-2 text-sm text-base-content/80">गैलरी में सभी चित्र देखें</div>
            </a> --}}

            {{-- प्रश्नोत्तर प्रबंधन --}}
            <a href="{{ route('faqManager') }}" class="block p-6 bg-base-100 border border-neutral-300 rounded-xl hover:shadow-xl transition-all dark:border-neutral-700 group">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="124" height="124" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-question-mark-icon lucide-shield-question-mark">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                        <path d="M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" /></svg>
                    <div class="text-lg font-semibold text-primary">प्रश्नोत्तर प्रबंधन</div>
                    <div class="mt-2 text-sm text-base-content/80">सामान्य प्रश्नों को जोड़ें या संपादित करें</div>

                </div>
            </a>

            {{-- दैनिक उद्धरण --}}
            <a href="{{ route('quoteManager') }}" class="block p-6 bg-base-100 border border-neutral-300 rounded-xl hover:shadow-xl transition-all dark:border-neutral-700 group">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="124" height="124" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote-icon lucide-quote">
                        <path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z" />
                        <path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z" /></svg>
                    <div class="text-lg font-semibold text-primary">दैनिक उद्धरण</div>
                    <div class="mt-2 text-sm text-base-content/80">दैनिक प्रेरणादायक उद्धरण प्रबंधित करें</div>
                </div>
            </a>

        </div>


        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
