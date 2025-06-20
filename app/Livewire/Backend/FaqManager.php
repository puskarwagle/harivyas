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
    public $faqLocales = [];
    public $selectedLocale;
    public $availableLocales = [];
    public $faqAvailableLocales = [];

    public function mount()
    {   
        $this->selectedLocale = app()->getLocale(); // or 'en' as default
        $this->loadFaqs();
        $this->categories = FaqCategory::withTranslations()->ordered()->get();
        $this->tags = FaqTag::withTranslations()->get();
    }

    public function changeLocale($locale)
    {
        $this->selectedLocale = $locale;
        $this->loadFaqs();
    }

    public function getAvailableLocalesForFaq($faq)
    {
        return \DB::table('translations')
            ->where('translatable_type', Faq::class)
            ->where('translatable_id', $faq->id)
            ->pluck('locale')
            ->unique()
            ->values()
            ->toArray();
    }

    private function loadFaqs()
    {
        $this->faqs = Faq::withTranslations($this->selectedLocale)
            ->withCategory()
            ->withTags()
            ->ordered()
            ->get();

        foreach ($this->faqs as $faq) {
            $this->faqLocales[$faq->id] = $this->selectedLocale;

            // Cache the locales once per FAQ
            $this->faqAvailableLocales[$faq->id] = \DB::table('translations')
                ->where('translatable_type', Faq::class)
                ->where('translatable_id', $faq->id)
                ->pluck('locale')
                ->unique()
                ->values()
                ->toArray();
        }
    }

    public function changeFaqLocale($faqId, $locale)
    {
        $this->faqLocales[$faqId] = $locale;

        // Re-fetch that FAQ with new translation
        $faqIndex = $this->faqs->search(fn ($f) => $f->id === $faqId);
        if ($faqIndex !== false) {
            $faq = Faq::withTranslations($locale)
                    ->withCategory()
                    ->withTags()
                    ->find($faqId);

            $this->faqs[$faqIndex] = $faq;
        }
    }

    public function getTranslatedText($faq, $field)
    {
        $locale = $this->faqLocales[$faq->id] ?? $this->selectedLocale;

        logger("Translating Faq #{$faq->id} Field: {$field} Locale: {$locale}");

        $translation = $faq->translate($field, $locale, false);

        return $translation ?? 'No translation available';
    }

    public function render()
    {
        return view('livewire.backend.faq-manager');
    }
}