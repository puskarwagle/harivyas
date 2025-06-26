<?php
namespace App\Livewire\Backend;

use App\Models\Faq;
use App\Models\FaqCategory;
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
    
    // FAQ form fields - now arrays for multiple locales
    public $question = ['en' => '', 'hi' => ''];
    public $answer = ['en' => '', 'hi' => ''];
    public $faq_category_id = 1;
    
    // Category form fields - now array for multiple locales
    public $categoryName = ['en' => '', 'hi' => ''];
    
    // Filters
    public $search = '';
    public $filterCategory = '';
    public $currentLocale = 'en';
    
    protected $rules = [
        'question.en' => 'required|string|max:255',
        'question.hi' => 'nullable|string|max:255',
        'answer.en' => 'required|string',
        'answer.hi' => 'nullable|string',
        'faq_category_id' => 'required|exists:faq_categories,id',
        'categoryName.en' => 'required|string|max:255',
        'categoryName.hi' => 'nullable|string|max:255'
    ];

    public function mount()
    {
        $this->currentLocale = app()->getLocale();
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
        
        // Load translations for editing
        $this->question = [
            'en' => $faq->translate('question', 'en') ?? '',
            'hi' => $faq->translate('question', 'hi') ?? ''
        ];
        $this->answer = [
            'en' => $faq->translate('answer', 'en') ?? '',
            'hi' => $faq->translate('answer', 'hi') ?? ''
        ];
        $this->faq_category_id = $faq->faq_category_id;
        $this->showModal = true;
    }

    public function saveFaq()
    {
        $this->validate([
            'question.en' => 'required|string|max:255',
            'question.hi' => 'nullable|string|max:255',
            'answer.en' => 'required|string',
            'answer.hi' => 'nullable|string',
            'faq_category_id' => 'required|exists:faq_categories,id'
        ]);

        if ($this->editingFaq) {
            // Update existing FAQ
            $this->editingFaq->update(['faq_category_id' => $this->faq_category_id]);
            
            // Update translations
            $this->editingFaq->setTranslations([
                'question' => $this->question,
                'answer' => $this->answer
            ]);
            
            session()->flash('message', 'FAQ updated successfully');
        } else {
            // Create new FAQ
            $faq = Faq::create(['faq_category_id' => $this->faq_category_id]);
            
            // Add translations
            $faq->setTranslations([
                'question' => $this->question,
                'answer' => $this->answer
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
        $this->categoryName = [
            'en' => $category->translate('name', 'en') ?? '',
            'hi' => $category->translate('name', 'hi') ?? ''
        ];
        $this->showCategoryModal = true;
    }

    public function saveCategory()
    {
        $this->validate([
            'categoryName.en' => 'required|string|max:255',
            'categoryName.hi' => 'nullable|string|max:255'
        ]);

        if ($this->editingCategory) {
            // Update translations
            $this->editingCategory->setTranslations([
                'name' => $this->categoryName
            ]);
            session()->flash('message', 'Category updated successfully');
        } else {
            // Create new category
            $category = FaqCategory::create();
            $category->setTranslations([
                'name' => $this->categoryName
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
        $this->question = ['en' => '', 'hi' => ''];
        $this->answer = ['en' => '', 'hi' => ''];
        $this->faq_category_id = 1;
        $this->resetErrorBag();
    }

    public function resetCategoryForm()
    {
        $this->editingCategory = null;
        $this->categoryName = ['en' => '', 'hi' => ''];
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
}