<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqsList extends Component
{
    public string $searchTerm = '';
    public string $selectedCategory = 'all';

    // Cache categories for tabs
    public $categories = [];

    public function mount()
    {
        // Load categories with 'all' option
        $this->categories = collect([
            ['id' => 0, 'name' => __('All')]
        ])->merge(
            FaqCategory::orderBy('name')->get(['id', 'name'])->toArray()
        )->toArray();

        $this->selectedCategory = 0;
    }

        public function filterByCategory(int $id)
    {
        $this->selectedCategory = $id;
    }

        public function clearFilters()
        {
            $this->searchTerm = '';
            $this->selectedCategory = 'all';
        }

    public function getFilteredFaqsProperty()
    {
        $query = Faq::query()
            ->with('faqCategory')
            ->when($this->selectedCategory !== 0, function ($q) {
                $q->where('faq_category_id', $this->selectedCategory);
            })
            ->when(strlen($this->searchTerm) > 0, function ($q) {
                $q->where(function ($q2) {
                    $q2->where('question', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('answer', 'like', '%' . $this->searchTerm . '%');
                });
            })
            ->orderBy('question')
            ->get();

        return $query;
    }

    public function render()
    {
        return view('livewire.frontend.faqs-list', [
            'filteredFaqs' => $this->filteredFaqs,
            'faqs' => Faq::count(),
            'categories' => $this->categories,
            'selectedCategory' => $this->selectedCategory,
            'searchTerm' => $this->searchTerm,
        ]);
    }
}
