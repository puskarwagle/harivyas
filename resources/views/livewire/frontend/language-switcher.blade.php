<div x-data="languageSwitcher()" x-init="init()" class="tooltip tooltip-bottom" data-tip="भाषा/Language">
    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-sm">
            <span x-text="supportedLanguages[currentLang].flag"></span>
        </div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-10 w-40 p-2 shadow">
            <template x-for="(lang, code) in supportedLanguages" :key="code">
                <li>
                    <a @click="switchLanguage(code)">
                        <span x-text="lang.flag"></span>
                        <span x-text="lang.native"></span>
                    </a>
                </li>
            </template>
        </ul>
    </div>
</div>

<script>
    // Global Alpine store
    document.addEventListener('alpine:init', () => {
        Alpine.store('lang', {
            currentLang: localStorage.getItem('locale') || 'en'
            , translations: @json($translations),

            switchLanguage(lang) {
                this.currentLang = lang;
                localStorage.setItem('locale', lang);
            },

            trans(key) {
                const translation = this.translations[key];
                if (!translation) return key;
                return translation[this.currentLang] || translation['en'] || key;
            }
        });
    });

    function languageSwitcher() {
        return {
            currentLang: 'en'
            , supportedLanguages: {
                'en': {
                    flag: '🇺🇸'
                    , native: 'English'
                }
                , 'hi': {
                    flag: '🇮🇳'
                    , native: 'हिन्दी'
                }
                , 'ne': {
                    flag: '🇳🇵'
                    , native: 'नेपाली'
                }
            },

            get currentLang() {
                return this.$store.lang.currentLang;
            },

            switchLanguage(lang) {
                this.$store.lang.switchLanguage(lang);
            }
        }
    }

</script>
