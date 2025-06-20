<?php

namespace App\Livewire\Backend;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqTag;
use App\Models\Translation;
use Illuminate\Support\Str;
use Livewire\Component;

class FaqForm extends Component
{
    // Test livewire
    public $livewireTest = 'Livewire is running!';
    
    // Category form
    public $categoryName = '';
    public $categorySlug = '';
    public $categoryLocale = '';
    
    // Tag form
    public $tagName = '';
    public $tagSlug = '';
    public $tagLocale = '';
    
    // FAQ form
    public $question = '';
    public $answer = '';
    public $faqLocale = '';
    public $selectedCategoryId = '';
    public $selectedTagIds = [];
    public $isActive = true;
    
    // Language form
    public $newLocale = '';
    
    // Messages
    public $successMessage = '';
    public $errorMessage = '';
    
    public function mount()
    {
        $this->resetMessages();
    }
    
    public function render()
    {
        $categories = FaqCategory::active()->ordered()->with('translations')->get();
        $tags = FaqTag::with('translations')->get();
        $locales = $this->getAvailableLocales();
        
        return view('livewire.backend.faq-form', compact('categories', 'tags', 'locales'));
    }
    
    // Category Management
    public function createCategory()
    {
        $this->resetMessages();
        
        $this->validate([
            'categoryName' => 'required|string|max:255',
            'categorySlug' => 'required|string|max:255|unique:faq_categories,slug',
            'categoryLocale' => 'required|string|max:10'
        ]);
        
        try {
            $category = FaqCategory::create([
                'slug' => $this->categorySlug,
                'is_active' => true
            ]);
            
            Translation::create([
                'translatable_type' => FaqCategory::class,
                'translatable_id' => $category->id,
                'locale' => $this->categoryLocale,
                'field' => 'name',
                'content' => $this->categoryName
            ]);
            
            $this->successMessage = "Category '{$this->categoryName}' created successfully!";
            $this->resetCategoryForm();
        } catch (\Exception $e) {
            $this->errorMessage = "Failed to create category: " . $e->getMessage();
        }
    }
    
    // Tag Management
    public function createTag()
    {
        $this->resetMessages();
        
        $this->validate([
            'tagName' => 'required|string|max:255',
            'tagSlug' => 'required|string|max:255|unique:faq_tags,slug',
            'tagLocale' => 'required|string|max:10'
        ]);
        
        try {
            $tag = FaqTag::create([
                'slug' => $this->tagSlug
            ]);
            
            Translation::create([
                'translatable_type' => FaqTag::class,
                'translatable_id' => $tag->id,
                'locale' => $this->tagLocale,
                'field' => 'name',
                'content' => $this->tagName
            ]);
            
            $this->successMessage = "Tag '{$this->tagName}' created successfully!";
            $this->resetTagForm();
        } catch (\Exception $e) {
            $this->errorMessage = "Failed to create tag: " . $e->getMessage();
        }
    }
    
    // FAQ Management
    public function createFaq()
    {
        $this->resetMessages();
        
        $this->validate([
            'question' => 'required|string|max:1000',
            'answer' => 'required|string',
            'faqLocale' => 'required|string|max:10',
            'selectedCategoryId' => 'required|exists:faq_categories,id'
        ]);
        
        try {
            $faq = Faq::create([
                'slug' => Str::slug($this->question),
                'category_id' => $this->selectedCategoryId,
                'is_active' => $this->isActive
            ]);
            
            // Create question translation
            Translation::create([
                'translatable_type' => Faq::class,
                'translatable_id' => $faq->id,
                'locale' => $this->faqLocale,
                'field' => 'question',
                'content' => $this->question
            ]);
            
            // Create answer translation
            Translation::create([
                'translatable_type' => Faq::class,
                'translatable_id' => $faq->id,
                'locale' => $this->faqLocale,
                'field' => 'answer',
                'content' => $this->answer
            ]);
            
            // Attach tags if selected
            if (!empty($this->selectedTagIds)) {
                $faq->tags()->attach($this->selectedTagIds);
            }
            
            $this->successMessage = "FAQ created successfully!";
            $this->resetFaqForm();
        } catch (\Exception $e) {
            $this->errorMessage = "Failed to create FAQ: " . $e->getMessage();
        }
    }
    
    // Language Management
    public function addLocale()
    {
        $this->resetMessages();
        
        $this->validate([
            'newLocale' => 'required|string|max:10'
        ]);
        
        $this->successMessage = "Locale '{$this->newLocale}' is now available for selection!";
        $this->newLocale = '';
    }
    
    // Auto-generate slugs
    public function updatedCategoryName()
    {
        $this->categorySlug = Str::slug($this->categoryName);
    }
    
    public function updatedTagName()
    {
        $this->tagSlug = Str::slug($this->tagName);
    }
    
    // Helper methods
    private function getAvailableLocales()
    {
        $locales = Translation::distinct('locale')->pluck('locale')->toArray();
        return array_merge($locales, ['en', 'hi', 'ne']); // Add common defaults
    }
    
    private function resetMessages()
    {
        $this->successMessage = '';
        $this->errorMessage = '';
    }
    
    private function resetCategoryForm()
    {
        $this->categoryName = '';
        $this->categorySlug = '';
        $this->categoryLocale = '';
    }
    
    private function resetTagForm()
    {
        $this->tagName = '';
        $this->tagSlug = '';
        $this->tagLocale = '';
    }
    
    private function resetFaqForm()
    {
        $this->question = '';
        $this->answer = '';
        $this->faqLocale = '';
        $this->selectedCategoryId = '';
        $this->selectedTagIds = [];
        $this->isActive = true;
    }
}