<?php

namespace App\Livewire;

use App\Models\Faq;
use App\Models\FaqCategory;
use Livewire\Component;

class FaqFront extends Component
{
    public $faqs = [];
    public $categories = [];

    public function mount()
    {
        $this->faqs = Faq::with(['category', 'tags', 'translations'])->get()->map(function ($faq) {
            return [
                'id' => $faq->id,
                'category' => [
                    'slug' => $faq->category?->slug ?? 'uncategorized',
                    'name' => $faq->category?->translate('name') ?? 'Uncategorized',
                ],
                'question' => $faq->translate('question'),
                'answer' => $faq->translate('answer'),
                'tags' => $faq->tags->map(fn($tag) => [
                    'id' => $tag->id,
                    'name' => $tag->translate('name'),
                ])->toArray(),
            ];
        })->toArray();

        // FIX: Create the 'All' category first.
        $allCategory = [
            ['slug' => 'all', 'name' => 'All']
        ];
        
        // FIX: Get the other categories from the database.
        $dbCategories = FaqCategory::all()->map(fn($cat) => [
            'slug' => $cat->slug,
            'name' => $cat->translate('name'),
        ])->toArray();

        // FIX: Merge them together in one step. This is cleaner and avoids overwriting variables.
        $this->categories = array_merge($allCategory, $dbCategories);
    }

    public function render()
    {
        return view('livewire.faq', [
            'faqs' => $this->faqs,
            'categories' => $this->categories,
        ])->layout('welcome');
    }
}