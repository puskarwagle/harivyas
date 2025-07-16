<?php
namespace App\Livewire\Backend;
use App\Models\Nibandha;
use Livewire\Component;
use Livewire\WithPagination;
class NibandhaManager extends Component
{
use WithPagination;
public $nibandhaId = null;
public $title = '';
public $description = '';
public $essay = '';
public $isEditing = false;
public $currentLocale = 'hi';
public $availableTranslations = [];
public $availableLocales = [];
public $showAddLanguage = false;
public $newLanguageCode = '';

protected $rules = [
'title' => 'required|string|max:255',
'essay' => 'required|string',
'newLanguageCode' => 'required|string|min:2|max:10|alpha_dash',
];

public function mount()
{
    $this->currentLocale = app()->getLocale();
    $this->loadAvailableLocales();
}

public function loadAvailableLocales()
{
    // Get all unique locales from translations table
    $this->availableLocales = \App\Models\Translation::distinct()
        ->pluck('locale')
        ->filter()
        ->sort()
        ->values()
        ->toArray();
    
    // Ensure current locale is in the list
    if (!in_array($this->currentLocale, $this->availableLocales)) {
        $this->availableLocales[] = $this->currentLocale;
        $this->availableLocales = array_unique($this->availableLocales);
        sort($this->availableLocales);
    }
}

public function switchContentLanguage($locale)
{
    $this->currentLocale = $locale;
    
    // If editing, reload content in new language
    if ($this->isEditing && $this->nibandhaId) {
        $nibandha = Nibandha::findOrFail($this->nibandhaId);
        $this->title = $nibandha->translate('title', $locale) ?? '';
        $this->description = $nibandha->translate('description', $locale) ?? '';
        $this->essay = $nibandha->translate('essay', $locale) ?? '';
        
        // Load available translations for this nibandha
        $this->loadAvailableTranslations($nibandha);
    }
}

public function addNewLanguage()
{
    $this->validate(['newLanguageCode' => 'required|string|min:2|max:10|alpha_dash']);
    
    $newLocale = strtolower(trim($this->newLanguageCode));
    
    // Add to available locales if not already present
    if (!in_array($newLocale, $this->availableLocales)) {
        $this->availableLocales[] = $newLocale;
        sort($this->availableLocales);
    }
    
    // Switch to the new language
    $this->switchContentLanguage($newLocale);
    
    // Reset the form
    $this->reset(['showAddLanguage', 'newLanguageCode']);
    
    session()->flash('message', "Language '{$newLocale}' added successfully!");
}

public function loadAvailableTranslations($nibandha)
{
    $this->availableTranslations = [];
    $allTranslations = $nibandha->getAllTranslations();
    
    foreach (['title', 'description', 'essay'] as $field) {
        if (isset($allTranslations[$field])) {
            $this->availableTranslations[$field] = array_keys($allTranslations[$field]);
        }
    }
}


public function save()
{
    $this->validate();

    // Auto-fill description with title if empty
    if (empty($this->description)) {
        $this->description = $this->title;
    }

    if ($this->isEditing) {
        $nibandha = Nibandha::findOrFail($this->nibandhaId);
    } else {
        $nibandha = new Nibandha();
        $nibandha->user_id = auth()->id();
        $nibandha->save();
    }
    
    $locale = $this->currentLocale;
    $nibandha->setTranslation('title', $this->title, $locale);
    $nibandha->setTranslation('description', $this->description, $locale);
    $nibandha->setTranslation('essay', $this->essay, $locale);
    
    $message = $this->isEditing ? 'Essay updated successfully!' : 'Essay created successfully!';
    
    $this->reset(['nibandhaId', 'title', 'description', 'essay', 'isEditing', 'availableTranslations']);
    session()->flash('message', $message);
}
public function edit($id)
{
    $nibandha = Nibandha::findOrFail($id);
    $locale = $this->currentLocale;
    $this->nibandhaId = $id;
    $this->title = $nibandha->translate('title', $locale) ?? '';
    $this->description = $nibandha->translate('description', $locale) ?? '';
    $this->essay = $nibandha->translate('essay', $locale) ?? '';
    $this->isEditing = true;
    
    // Load available translations for this nibandha
    $this->loadAvailableTranslations($nibandha);
}
public function delete($id)
{
    Nibandha::findOrFail($id)->delete();
    session()->flash('message', 'Essay deleted successfully!');
}

public function cancel()
{
    $this->reset(['nibandhaId', 'title', 'description', 'essay', 'isEditing', 'availableTranslations']);
}

public function render()
{
    $nibandhas = Nibandha::with('user', 'translations')
        ->latest()
        ->paginate(10);
    
    return view('livewire.backend.nibandha-manager', [
        'nibandhas' => $nibandhas
    ])->layout('components.layouts.app');
}
}