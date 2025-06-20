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
    public ?int $expandedFaqId = null;

    public function mount()
    {
        $this->faqs = Faq::withTranslations()
            ->withCategory()
            ->withTags()
            ->ordered()
            ->get();

        $this->categories = FaqCategory::withTranslations()->ordered()->get();

        $this->tags = FaqTag::withTranslations()->get();
    }

    public function toggleFaq($id)
    {
        $this->expandedFaqId = ($this->expandedFaqId === $id) ? null : $id;
    }

    public function render()
    {
        return view('livewire.backend.faq-manager');
    }
}
