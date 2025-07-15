<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Quote;
use Livewire\WithPagination;

class QuoteManagement extends Component
{
    use WithPagination;

    public $quote = '';
    public $author = '';
    public $display_date = '';
    public $is_active = true;
    public $editingId = null;
    public $lang = 'hi';

    protected $rules = [
        'quote' => 'required|min:10|max:1000',
        'author' => 'required|min:2|max:100',
        'display_date' => 'required|date',
        'is_active' => 'boolean'
    ];

    public function mount()
    {
        $this->display_date = now()->format('Y-m-d');
    }

    public function save()
    {
        $this->validate();

        if ($this->editingId) {
            Quote::find($this->editingId)->update([
                'quote' => $this->quote,
                'author' => $this->author,
                'display_date' => $this->display_date,
                'is_active' => $this->is_active
            ]);
            $this->editingId = null;
        } else {
            Quote::create([
                'quote' => $this->quote,
                'author' => $this->author,
                'display_date' => $this->display_date,
                'is_active' => $this->is_active
            ]);
        }

        $this->reset(['quote', 'author']);
        $this->display_date = now()->format('Y-m-d');
        $this->is_active = true;
    }

    public function edit($id)
    {
        $quote = Quote::find($id);
        $this->editingId = $id;
        $this->quote = $quote->quote;
        $this->author = $quote->author;
        $this->display_date = $quote->display_date->format('Y-m-d');
        $this->is_active = $quote->is_active;
    }

    public function cancel()
    {
        $this->reset(['quote', 'author', 'editingId']);
        $this->display_date = now()->format('Y-m-d');
        $this->is_active = true;
    }

    public function delete($id)
    {
        Quote::find($id)->delete();
    }

    public function toggleActive($id)
    {
        $quote = Quote::find($id);
        $quote->update(['is_active' => !$quote->is_active]);
    }

    public function render()
    {
        return view('livewire.backend.quote-management', [
            'quotes' => Quote::orderBy('display_date', 'desc')->paginate(10)
        ])->layout('components.layouts.app');;
    }
}