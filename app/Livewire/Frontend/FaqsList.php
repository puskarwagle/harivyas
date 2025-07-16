<?php
namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Support\Facades\App;

class FaqsList extends Component
{
    public string $searchTerm = '';
    public string $selectedCategory = 'all';
    public string $currentLang = 'hi'; // Default to Hindi
    
    // Cache categories for tabs
    public $categories = [];

    public function mount()
    {
        // Set default locale to Hindi
        App::setLocale($this->currentLang);
        
        // Load categories with 'all' option
        $this->categories = collect([
            ['id' => 0, 'name' => __('All')]
        ])->merge(
            FaqCategory::with('translations')->get()->map(function($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->translate('name', $this->currentLang) ?: $category->translate('name', 'hi') ?: 'Unnamed'
                ];
            })
        )->toArray();
        
        $this->selectedCategory = 0;
    }

    public function switchLanguage(string $lang)
    {
        $this->currentLang = $lang;
        App::setLocale($lang);
        
        // Refresh categories for new language
        $this->categories = collect([
            ['id' => 0, 'name' => __('All')]
        ])->merge(
            FaqCategory::with('translations')->get()->map(function($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->translate('name', $this->currentLang) ?: $category->translate('name', 'hi') ?: 'Unnamed'
                ];
            })
        )->toArray();
    }

    public function filterByCategory(int $id)
    {
        $this->selectedCategory = $id;
    }

    public function clearFilters()
    {
        $this->searchTerm = '';
        $this->selectedCategory = 0;
    }

    public function getFilteredFaqsProperty()
    {
        return Faq::query()
            ->with(['faqCategory.translations', 'translations'])
            ->when($this->selectedCategory != 0, function ($q) {
                $q->where('faq_category_id', $this->selectedCategory);
            })
            ->when(strlen($this->searchTerm) > 0, function ($q) {
                $q->whereHas('translations', function ($q2) {
                    $q2->where('content', 'like', '%' . $this->searchTerm . '%')
                       ->whereIn('field', ['question', 'answer']);
                });
            })
            ->orderBy('id')
            ->get();
    }

    public function render()
    {
        return view('livewire.frontend.faqs-list', [
            'filteredFaqs' => $this->filteredFaqs,
            'faqs' => Faq::count(),
            'categories' => $this->categories,
            'selectedCategory' => $this->selectedCategory,
            'searchTerm' => $this->searchTerm,
            'currentLang' => $this->currentLang,
        ]);
    }
}