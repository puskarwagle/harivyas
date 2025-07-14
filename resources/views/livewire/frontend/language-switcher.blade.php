<div>
<!-- Livewire Component -->
<div>
    <div id="language-switcher" class="tooltip tooltip-bottom" data-tip="भाषा/Language">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-sm" id="lang-trigger">
                <span id="current-flag">🌐</span>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-10 w-40 p-2 shadow" id="lang-menu">
                <!-- Languages will be populated by JS -->
            </ul>
        </div>
    </div>
</div>

<script>
    class LanguageSwitcher {
        constructor() {
            this.supportedLanguages = {
                'en': { flag: '🇺🇸', native: 'English' },
                'hi': { flag: '🇮🇳', native: 'हिन्दी' },
                'ne': { flag: '🇳🇵', native: 'नेपाली' }
            };
            
            this.translations = @json($translations ?? []);
            this.currentLang = localStorage.getItem('locale') || 'en';
            
            this.init();
        }
        
        init() {
            this.updateCurrentFlag();
            this.populateMenu();
            this.bindEvents();
            this.updateAllTranslations(); // Initial translation update
        }
        
        updateCurrentFlag() {
            const flagElement = document.getElementById('current-flag');
            if (flagElement) {
                flagElement.textContent = this.supportedLanguages[this.currentLang]?.flag || '🌐';
            }
        }
        
        populateMenu() {
            const menu = document.getElementById('lang-menu');
            if (!menu) return;
            
            menu.innerHTML = '';
            
            Object.entries(this.supportedLanguages).forEach(([code, lang]) => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = '#';
                a.innerHTML = `<span>${lang.flag}</span><span>${lang.native}</span>`;
                a.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.switchLanguage(code);
                });
                
                li.appendChild(a);
                menu.appendChild(li);
            });
        }
        
        switchLanguage(code) {
            if (!this.supportedLanguages[code]) return;
            
            this.currentLang = code;
            localStorage.setItem('locale', code);
            this.updateCurrentFlag();
            this.updateAllTranslations();
            
            // Trigger custom event for other components
            document.dispatchEvent(new CustomEvent('languageChanged', { 
                detail: { lang: code } 
            }));
            
            // Optional: Reload page for server-side locale change
            // window.location.reload();
        }
        
        bindEvents() {
            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                const switcher = document.getElementById('language-switcher');
                if (switcher && !switcher.contains(e.target)) {
                    // Remove focus from dropdown trigger
                    const trigger = document.getElementById('lang-trigger');
                    if (trigger) trigger.blur();
                }
            });
        }
        
        trans(key) {
            // Support dot notation: 'home.daily_aartis'
            const keys = key.split('.');
            let translation = this.translations;
            
            for (const k of keys) {
                translation = translation[k];
                if (!translation) return key;
            }
            
            return translation[this.currentLang] || translation['en'] || key;
        }
        
        updateAllTranslations() {
            // Find all elements with data-trans attribute and update them
            document.querySelectorAll('[data-trans]').forEach(element => {
                const key = element.getAttribute('data-trans');
                if (key) {
                    element.textContent = this.trans(key);
                }
            });
        }
    }

    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', () => {
        window.langSwitcher = new LanguageSwitcher();
    });

    // Re-initialize if Livewire reloads the component
    document.addEventListener('livewire:load', () => {
        window.langSwitcher = new LanguageSwitcher();
    });

    // Handle Livewire navigations
    document.addEventListener('livewire:navigated', () => {
        window.langSwitcher = new LanguageSwitcher();
    });
</script>

    <style>
        /* Ensure proper dropdown behavior */
        .dropdown:focus-within .dropdown-content {
            display: block;
        }

        .dropdown-content {
            display: none;
        }

        .dropdown:focus-within .dropdown-content,
        .dropdown-content:focus-within {
            display: block;
        }
    </style>
</div>
