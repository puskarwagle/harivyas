<?php

namespace App\Livewire\Backend;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqTag;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;

class FaqManager extends Component
{
    use WithPagination;

    // Filters
    public $search = '';
    public $categoryFilter = '';
    public $statusFilter = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    // Modal states
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $selectedFaq = null;

    // Form data
    #[Validate('required|string|max:500')]
    public $question = '';
    
    #[Validate('required|string')]
    public $answer = '';
    
    #[Validate('required|exists:faq_categories,id')]
    public $category_id = '';
    
    public $tags = [];
    public $is_active = true;
    public $sort_order = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'categoryFilter' => ['except' => ''],
        'statusFilter' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function mount()
    {
        $this->resetForm();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategoryFilter()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showCreateModal = true;
    }

    public function openEditModal($faqId)
    {
        $faq = Faq::with(['category', 'tags'])->findOrFail($faqId);
        $this->selectedFaq = $faq;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->category_id = $faq->category_id;
        $this->tags = $faq->tags->pluck('id')->toArray();
        $this->is_active = $faq->is_active;
        $this->sort_order = $faq->sort_order;
        $this->showEditModal = true;
    }

    public function openDeleteModal($faqId)
    {
        $this->selectedFaq = Faq::findOrFail($faqId);
        $this->showDeleteModal = true;
    }

    public function closeModals()
    {
        $this->showCreateModal = false;
        $this->showEditModal = false;
        $this->showDeleteModal = false;
        $this->selectedFaq = null;
        $this->resetForm();
    }

    public function create()
    {
        $this->validate();

        $faq = Faq::create([
            'question' => $this->question,
            'answer' => $this->answer,
            'category_id' => $this->category_id,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ]);

        if (!empty($this->tags)) {
            $faq->tags()->sync($this->tags);
        }

        $this->closeModals();
        session()->flash('success', 'FAQ created successfully.');
    }

    public function update()
    {
        $this->validate();

        $this->selectedFaq->update([
            'question' => $this->question,
            'answer' => $this->answer,
            'category_id' => $this->category_id,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ]);

        $this->selectedFaq->tags()->sync($this->tags);

        $this->closeModals();
        session()->flash('success', 'FAQ updated successfully.');
    }

    public function delete()
    {
        $this->selectedFaq->delete();
        $this->closeModals();
        session()->flash('success', 'FAQ deleted successfully.');
    }

    public function toggleStatus($faqId)
    {
        $faq = Faq::findOrFail($faqId);
        $faq->update(['is_active' => !$faq->is_active]);
        session()->flash('success', 'FAQ status updated.');
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->categoryFilter = '';
        $this->statusFilter = '';
        $this->sortBy = 'created_at';
        $this->sortDirection = 'desc';
        $this->resetPage();
    }

    private function resetForm()
    {
        $this->question = '';
        $this->answer = '';
        $this->category_id = '';
        $this->tags = [];
        $this->is_active = true;
        $this->sort_order = 0;
    }

    public function render()
    {
        $faqs = Faq::query()
            ->with(['category', 'tags'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('question', 'like', '%' . $this->search . '%')
                      ->orWhere('answer', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('is_active', $this->statusFilter);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);

        $categories = FaqCategory::orderBy('id')->get();
        $availableTags = FaqTag::orderBy('id')->get();

        return view('livewire.backend.faq-manager', [
            'faqs' => $faqs,
            'categories' => $categories,
            'availableTags' => $availableTags,
        ]);
    }
}