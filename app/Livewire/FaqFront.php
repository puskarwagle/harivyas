<?php

namespace App\Livewire;

use App\Models\Faq;
use App\Models\FaqCategory;
use Livewire\Component;

class FaqFront extends Component
{
    public $faqs = [];
    public $categories = [];
    public $selectedCategory = 'all';
    public $searchTerm = '';
    
    protected $queryString = [
        'selectedCategory' => ['except' => 'all'],
        'searchTerm' => ['except' => '']
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $locale = app()->getLocale();
        
        // Load FAQs with optimized eager loading
        $this->faqs = Faq::active()
            ->ordered()
            ->withTranslations($locale)
            ->with([
                'category' => function ($query) use ($locale) {
                    $query->withTranslations($locale);
                },
                'tags' => function ($query) use ($locale) {
                    $query->withTranslations($locale);
                }
            ])
            ->get()
            ->map(function ($faq) {
                return [
                    'id' => $faq->id,
                    'slug' => $faq->slug,
                    'category' => [
                        'slug' => $faq->category?->slug ?? 'uncategorized',
                        'name' => $faq->category?->translate('name') ?? 'Uncategorized',
                    ],
                    'question' => $faq->translate('question') ?? '[No Question]',
                    'answer' => $faq->translate('answer') ?? '[No Answer]',
                    'tags' => $faq->tags->map(fn($tag) => [
                        'id' => $tag->id,
                        'slug' => $tag->slug,
                        'name' => $tag->translate('name') ?? $tag->slug,
                    ])->toArray(),
                ];
            })
            ->toArray();

        // Load categories with optimized query
        $this->categories = collect([
            ['slug' => 'all', 'name' => __('All Categories')]
        ])->merge(
            FaqCategory::active()
                ->ordered()
                ->withTranslations($locale)
                ->get()
                ->map(fn($cat) => [
                    'slug' => $cat->slug,
                    'name' => $cat->translate('name') ?? $cat->slug,
                ])
        )->toArray();
    }

    // Make this a Livewire action
    public function filterByCategory($categorySlug)
    {
        $this->selectedCategory = $categorySlug;
    }

    // Make this a Livewire action  
    public function clearFilters()
    {
        $this->selectedCategory = 'all';
        $this->searchTerm = '';
    }

    // This should be a computed property
    public function getFilteredFaqsProperty()
    {
        $faqs = collect($this->faqs);
        
        // Filter by category
        if ($this->selectedCategory !== 'all') {
            $faqs = $faqs->filter(fn($faq) => $faq['category']['slug'] === $this->selectedCategory);
        }
        
        // Filter by search term
        if (!empty($this->searchTerm)) {
            $searchTerm = strtolower($this->searchTerm);
            $faqs = $faqs->filter(function ($faq) use ($searchTerm) {
                return str_contains(strtolower($faq['question']), $searchTerm) ||
                       str_contains(strtolower($faq['answer']), $searchTerm) ||
                       str_contains(strtolower($faq['category']['name']), $searchTerm) ||
                       collect($faq['tags'])->some(fn($tag) => str_contains(strtolower($tag['name']), $searchTerm));
            });
        }
        
        return $faqs->values()->toArray();
    }

    public function render()
    {
        return view('livewire.faqfront', [
            'filteredFaqs' => $this->filteredFaqs,
        ])->layout('welcome');
    }
}