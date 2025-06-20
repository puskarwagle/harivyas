<?php

namespace App\Livewire\Backend;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqTag;
use Livewire\Component;

class FaqManager extends Component
{
    public $faqs;
    public $categories;
    public $tags;
    public $selectedLocale = 'en';
    public $availableLocales = [];

    public function mount()
    {
        $this->loadAvailableLocales();
        $this->loadFaqs();
        $this->categories = FaqCategory::withTranslations()->ordered()->get();
        $this->tags = FaqTag::withTranslations()->get();
    }

    public function changeLocale($locale)
    {
        $this->selectedLocale = $locale;
        $this->loadFaqs();
    }

    private function loadAvailableLocales()
    {
        // Get unique locales from translations table
        $locales = \DB::table('translations')
            ->select('locale')
            ->distinct()
            ->pluck('locale')
            ->toArray();

        // Map to readable names
        $localeNames = [
            'en' => 'English',
            'hi' => 'Hindi',
            'ne' => 'Nepali',
            'bn' => 'Bengali',
            'ur' => 'Urdu',
            'sa' => 'Sanskrit'
        ];

        $this->availableLocales = collect($locales)
            ->mapWithKeys(fn($locale) => [$locale => $localeNames[$locale] ?? strtoupper($locale)])
            ->toArray();
    }

    private function loadFaqs()
    {
        $this->faqs = Faq::withTranslations($this->selectedLocale)
            ->withCategory()
            ->withTags()
            ->ordered()
            ->get();
    }

    public function getTranslatedText($faq, $field)
    {
        $translation = $faq->translate($field, $this->selectedLocale, false); // No fallback
        return $translation ?? 'No translation available';
    }

    public function render()
    {
        return view('livewire.backend.faq-manager');
    }
}