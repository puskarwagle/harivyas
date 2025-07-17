<?php

namespace App\Livewire\Backend;

use App\Models\Quote;
use App\Models\Translation;
use Livewire\Component;
use Livewire\WithPagination;

class QuoteManagement extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editingQuote = null;

    // Dynamic language arrays
    public $quote = [];
    public $author = [];
    public $display_date = '';
    public $is_active = true;

    // Filters
    public $search = '';
    public $currentLocale = 'hi';

    // Available languages and active form languages
    public $availableLanguages = [];
    public $activeFormLanguages = ['hi'];

    public function mount()
    {
        $this->loadAvailableLanguages();
        $this->initializeLanguageArrays();
        $this->display_date = now()->format('Y-m-d');
    }

    public function loadAvailableLanguages()
    {
        $this->availableLanguages = Translation::distinct('locale')
            ->pluck('locale')
            ->sort()
            ->values()
            ->toArray();

        if (!in_array('hi', $this->availableLanguages)) {
            $this->availableLanguages[] = 'hi';
        }
    }

    public function initializeLanguageArrays()
    {
        foreach ($this->availableLanguages as $locale) {
            $this->quote[$locale] = '';
            $this->author[$locale] = '';
        }
    }

    public function addLanguageToForm($locale)
    {
        if (!in_array($locale, $this->activeFormLanguages)) {
            $this->activeFormLanguages[] = $locale;
        }
    }

    public function removeLanguageFromForm($locale)
    {
        if ($locale !== 'hi') {
            $this->activeFormLanguages = array_diff($this->activeFormLanguages, [$locale]);
            $this->quote[$locale] = '';
            $this->author[$locale] = '';
        }
    }

    public function createQuote()
    {
        $this->resetQuoteForm();
        $this->showModal = true;
    }

    public function editQuote(Quote $quote)
    {
        $this->editingQuote = $quote;

        $allTranslations = $quote->getAllTranslations();
        $this->activeFormLanguages = ['hi'];

        foreach ($this->availableLanguages as $locale) {
            $this->quote[$locale] = $allTranslations['quote'][$locale] ?? '';
            $this->author[$locale] = $allTranslations['author'][$locale] ?? '';

            if ($locale !== 'hi' && (!empty($this->quote[$locale]) || !empty($this->author[$locale]))) {
                $this->activeFormLanguages[] = $locale;
            }
        }

        $this->display_date = $quote->display_date->format('Y-m-d');
        $this->is_active = $quote->is_active;
        $this->showModal = true;
    }

    public function saveQuote()
    {
        $rules = [
            'quote.hi' => 'required|string|max:1000',
            'author.hi' => 'required|string|max:100',
            'display_date' => 'required|date',
            'is_active' => 'boolean'
        ];

        foreach ($this->availableLanguages as $locale) {
            if ($locale !== 'hi' && in_array($locale, $this->activeFormLanguages)) {
                $rules["quote.{$locale}"] = 'nullable|string|max:1000';
                $rules["author.{$locale}"] = 'nullable|string|max:100';
            }
        }

        $this->validate($rules);

        $quoteTranslations = [];
        $authorTranslations = [];

        foreach ($this->availableLanguages as $locale) {
            if (!empty($this->quote[$locale])) {
                $quoteTranslations[$locale] = $this->quote[$locale];
            }
            if (!empty($this->author[$locale])) {
                $authorTranslations[$locale] = $this->author[$locale];
            }
        }

        if ($this->editingQuote) {
            $this->editingQuote->update([
                'display_date' => $this->display_date,
                'is_active' => $this->is_active
            ]);

            $this->editingQuote->setTranslations([
                'quote' => $quoteTranslations,
                'author' => $authorTranslations
            ]);

            session()->flash('message', 'Quote updated successfully');
        } else {
            $quote = Quote::create([
                'display_date' => $this->display_date,
                'is_active' => $this->is_active
            ]);

            $quote->setTranslations([
                'quote' => $quoteTranslations,
                'author' => $authorTranslations
            ]);

            session()->flash('message', 'Quote created successfully');
        }

        $this->resetQuoteForm();
        $this->showModal = false;
    }

    public function deleteQuote(Quote $quote)
    {
        $quote->delete();
        session()->flash('message', 'Quote deleted successfully');
    }

    public function toggleActive($id)
    {
        $quote = Quote::find($id);
        $quote->update(['is_active' => !$quote->is_active]);
    }

    public function resetQuoteForm()
    {
        $this->editingQuote = null;
        $this->activeFormLanguages = ['hi'];
        $this->initializeLanguageArrays();
        $this->display_date = now()->format('Y-m-d');
        $this->is_active = true;
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetQuoteForm();
    }

    public function switchLocale($locale)
    {
        $this->currentLocale = $locale;
    }

    public function getLanguageDisplayName($locale)
    {
        $names = [
            'hi' => 'हिंदी',
            'en' => 'English',
            'ne' => 'नेपाली',
            'bn' => 'বাংলা',
            'te' => 'తెలుగు',
            'ta' => 'தமிழ்',
            'ur' => 'اردو',
            'gu' => 'ગુજરાતી',
            'kn' => 'ಕನ್ನಡ',
            'ml' => 'മലയാളം',
            'pa' => 'ਪੰਜਾਬੀ'
        ];

        return $names[$locale] ?? strtoupper($locale);
    }

    public function render()
    {
        $quotes = Quote::with('translations')
            ->when($this->search, function ($query) {
                $query->whereHas('translations', function ($q) {
                    $q->where('content', 'like', '%' . $this->search . '%')
                        ->whereIn('field', ['quote', 'author']);
                });
            })
            ->orderBy('display_date', 'desc')
            ->paginate(10);

        return view('livewire.backend.quote-management', [
            'quotes' => $quotes
        ])->layout('components.layouts.app');
    }
}