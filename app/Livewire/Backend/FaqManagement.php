<?php
namespace App\Livewire\Backend;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Translation;
use Livewire\Component;
use Livewire\WithPagination;

class FaqManagement extends Component
{
    use WithPagination;
    
    // State management
    public $showModal = false;
    public $showCategoryModal = false;
    public $editingFaq = null;
    public $editingCategory = null;
    public $selectedCategoryId = '';
    
    // Dynamic language arrays
    public $question = [];
    public $answer = [];
    public $categoryName = [];
    public $faq_category_id = 1;
    
    // Filters
    public $search = '';
    public $filterCategory = '';
    public $currentLocale = 'hi'; // Default to Hindi
    
    // Available languages and active form languages
    public $availableLanguages = [];
    public $activeFormLanguages = ['hi']; // Hindi always active
    
    public function mount()
    {
        $this->loadAvailableLanguages();
        $this->initializeLanguageArrays();
    }

    public function loadAvailableLanguages()
    {
        $this->availableLanguages = Translation::distinct('locale')
            ->pluck('locale')
            ->sort()
            ->values()
            ->toArray();
            
        // Ensure Hindi is always available
        if (!in_array('hi', $this->availableLanguages)) {
            $this->availableLanguages[] = 'hi';
        }
    }

    public function initializeLanguageArrays()
    {
        // Initialize arrays with empty strings for all available languages
        foreach ($this->availableLanguages as $locale) {
            $this->question[$locale] = '';
            $this->answer[$locale] = '';
            $this->categoryName[$locale] = '';
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
        if ($locale !== 'hi') { // Can't remove Hindi
            $this->activeFormLanguages = array_diff($this->activeFormLanguages, [$locale]);
            // Clear the data when removing
            $this->question[$locale] = '';
            $this->answer[$locale] = '';
            $this->categoryName[$locale] = '';
        }
    }

    public function render()
    {
        // Load categories with translations
        $categories = FaqCategory::withTranslations($this->currentLocale)
            ->orderBy('id')
            ->get();
        
        // Build search query for translated content
        $faqs = Faq::with(['faqCategory', 'translations'])
            ->when($this->search, function($query) {
                $query->whereHas('translations', function($q) {
                    $q->where('content', 'like', '%' . $this->search . '%')
                      ->whereIn('field', ['question', 'answer']);
                });
            })
            ->when($this->filterCategory, fn($q) => $q->where('faq_category_id', $this->filterCategory))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.backend.faq-management', [
            'faqs' => $faqs,
            'categories' => $categories
        ])->layout('components.layouts.app');
    }

    // FAQ Methods
    public function createFaq()
    {
        $this->resetFaqForm();
        $this->showModal = true;
    }

    public function editFaq(Faq $faq)
    {
        $this->editingFaq = $faq;
        
        // Load all translations for editing
        $allTranslations = $faq->getAllTranslations();
        
        // Reset active languages to Hindi + languages that have content
        $this->activeFormLanguages = ['hi'];
        
        foreach ($this->availableLanguages as $locale) {
            $this->question[$locale] = $allTranslations['question'][$locale] ?? '';
            $this->answer[$locale] = $allTranslations['answer'][$locale] ?? '';
            
            // Add language to active form if it has content
            if ($locale !== 'hi' && (!empty($this->question[$locale]) || !empty($this->answer[$locale]))) {
                $this->activeFormLanguages[] = $locale;
            }
        }
        
        $this->faq_category_id = $faq->faq_category_id;
        $this->showModal = true;
    }

    public function saveFaq()
    {
        // Dynamic validation rules
        $rules = [
            'question.hi' => 'required|string|max:255',
            'answer.hi' => 'required|string',
            'faq_category_id' => 'required|exists:faq_categories,id'
        ];

        // Add conditional validation for other languages if they have content
        foreach ($this->availableLanguages as $locale) {
            if ($locale !== 'hi' && in_array($locale, $this->activeFormLanguages)) {
                $rules["question.{$locale}"] = 'nullable|string|max:255';
                $rules["answer.{$locale}"] = 'nullable|string';
            }
        }

        $this->validate($rules);

        // Prepare translations data (only non-empty values)
        $questionTranslations = [];
        $answerTranslations = [];

        foreach ($this->availableLanguages as $locale) {
            if (!empty($this->question[$locale])) {
                $questionTranslations[$locale] = $this->question[$locale];
            }
            if (!empty($this->answer[$locale])) {
                $answerTranslations[$locale] = $this->answer[$locale];
            }
        }

        if ($this->editingFaq) {
            // Update existing FAQ
            $this->editingFaq->update(['faq_category_id' => $this->faq_category_id]);
            
            // Update translations
            $this->editingFaq->setTranslations([
                'question' => $questionTranslations,
                'answer' => $answerTranslations
            ]);
            
            session()->flash('message', 'FAQ updated successfully');
        } else {
            // Create new FAQ
            $faq = Faq::create(['faq_category_id' => $this->faq_category_id]);
            
            // Add translations
            $faq->setTranslations([
                'question' => $questionTranslations,
                'answer' => $answerTranslations
            ]);
            
            session()->flash('message', 'FAQ created successfully');
        }

        $this->resetFaqForm();
        $this->showModal = false;
    }

    public function deleteFaq(Faq $faq)
    {
        $faq->delete();
        session()->flash('message', 'FAQ deleted successfully');
    }

    // Category Methods
    public function createCategory()
    {
        $this->resetCategoryForm();
        $this->showCategoryModal = true;
    }

    public function editCategory(FaqCategory $category)
    {
        if ($category->id === 1) {
            session()->flash('error', 'Cannot edit the General category');
            return;
        }
        
        $this->editingCategory = $category;
        $allTranslations = $category->getAllTranslations();
        
        // Reset active languages to Hindi + languages that have content
        $this->activeFormLanguages = ['hi'];
        
        foreach ($this->availableLanguages as $locale) {
            $this->categoryName[$locale] = $allTranslations['name'][$locale] ?? '';
            
            // Add language to active form if it has content
            if ($locale !== 'hi' && !empty($this->categoryName[$locale])) {
                $this->activeFormLanguages[] = $locale;
            }
        }
        
        $this->showCategoryModal = true;
    }

    public function saveCategory()
    {
        // Dynamic validation rules
        $rules = ['categoryName.hi' => 'required|string|max:255'];

        // Add conditional validation for other languages if they have content
        foreach ($this->availableLanguages as $locale) {
            if ($locale !== 'hi' && in_array($locale, $this->activeFormLanguages)) {
                $rules["categoryName.{$locale}"] = 'nullable|string|max:255';
            }
        }

        $this->validate($rules);

        // Prepare translations data (only non-empty values)
        $nameTranslations = [];
        foreach ($this->availableLanguages as $locale) {
            if (!empty($this->categoryName[$locale])) {
                $nameTranslations[$locale] = $this->categoryName[$locale];
            }
        }

        if ($this->editingCategory) {
            // Update translations
            $this->editingCategory->setTranslations([
                'name' => $nameTranslations
            ]);
            session()->flash('message', 'Category updated successfully');
        } else {
            // Create new category
            $category = FaqCategory::create();
            $category->setTranslations([
                'name' => $nameTranslations
            ]);
            session()->flash('message', 'Category created successfully');
        }

        $this->resetCategoryForm();
        $this->showCategoryModal = false;
    }

    public function deleteCategory(FaqCategory $category)
    {
        try {
            $category->delete();
            session()->flash('message', 'Category deleted successfully');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    // Helper Methods
    public function resetFaqForm()
    {
        $this->editingFaq = null;
        $this->activeFormLanguages = ['hi'];
        $this->initializeLanguageArrays();
        $this->faq_category_id = 1;
        $this->resetErrorBag();
    }

    public function resetCategoryForm()
    {
        $this->editingCategory = null;
        $this->activeFormLanguages = ['hi'];
        $this->initializeLanguageArrays();
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFaqForm();
    }

    public function closeCategoryModal()
    {
        $this->showCategoryModal = false;
        $this->resetCategoryForm();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterCategory()
    {
        $this->resetPage();
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
}