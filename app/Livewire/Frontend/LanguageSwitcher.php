<?php
namespace App\Livewire\Frontend;
use Livewire\Component;

class LanguageSwitcher extends Component
{
    public function render()
    {
        $translations = [];
        $files = ['home'];
        foreach ($files as $file) {
            $path = resource_path("lang/{$file}.php");
            if (file_exists($path)) {
                $translations = array_merge($translations, include $path);
            }
        }
        return view('livewire.frontend.language-switcher', compact('translations'));
    }
}