<?php

namespace App\Traits;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasTranslations
{
    protected static $defaultLocale = 'en';
    protected static $fallbackLocale = 'hi';
    
    // Cache translations in memory to avoid repeated queries
    protected $translationCache = [];

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function translate(string $field, string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        
        // Check memory cache first
        $cacheKey = "{$field}.{$locale}";
        if (isset($this->translationCache[$cacheKey])) {
            return $this->translationCache[$cacheKey];
        }
        
        $result = null;
        
        // Use relationship cache if loaded (performance optimization)
        if ($this->relationLoaded('translations')) {
            $result = $this->translateFromCollection($field, $locale);
        } else {
            $result = $this->translateFromDatabase($field, $locale);
        }
        
        // Cache the result
        $this->translationCache[$cacheKey] = $result;
        
        return $result;
    }

    protected function translateFromCollection(string $field, string $locale): ?string
    {
        $translations = $this->translations;
        
        // Try requested locale
        $translation = $translations->where('field', $field)->where('locale', $locale)->first();
        if ($translation) {
            return $translation->content;
        }
        
        // Fallback to default locale
        if ($locale !== static::$defaultLocale) {
            $translation = $translations->where('field', $field)->where('locale', static::$defaultLocale)->first();
            if ($translation) {
                return $translation->content;
            }
        }
        
        // Fallback to Hindi if not English and different from default
        if ($locale !== static::$fallbackLocale && static::$defaultLocale !== static::$fallbackLocale) {
            $translation = $translations->where('field', $field)->where('locale', static::$fallbackLocale)->first();
            if ($translation) {
                return $translation->content;
            }
        }
        
        return null;
    }

    protected function translateFromDatabase(string $field, string $locale): ?string
    {
        // Try requested locale
        $translation = $this->translations()
            ->where('field', $field)
            ->where('locale', $locale)
            ->first();
            
        if ($translation) {
            return $translation->content;
        }
        
        // Fallback to default locale
        if ($locale !== static::$defaultLocale) {
            $translation = $this->translations()
                ->where('field', $field)
                ->where('locale', static::$defaultLocale)
                ->first();
                
            if ($translation) {
                return $translation->content;
            }
        }
        
        // Fallback to Hindi if not English
        if ($locale !== static::$fallbackLocale && static::$defaultLocale !== static::$fallbackLocale) {
            $translation = $this->translations()
                ->where('field', $field)
                ->where('locale', static::$fallbackLocale)
                ->first();
                
            if ($translation) {
                return $translation->content;
            }
        }
        
        return null;
    }

    public function setTranslation(string $field, string $content, string $locale = null): void
    {
        $locale = $locale ?? app()->getLocale();
        
        $this->translations()->updateOrCreate(
            [
                'field' => $field,
                'locale' => $locale
            ],
            [
                'content' => $content
            ]
        );
        
        // Clear cache for this field/locale
        $cacheKey = "{$field}.{$locale}";
        unset($this->translationCache[$cacheKey]);
        
        // Refresh the relationship if it was loaded
        if ($this->relationLoaded('translations')) {
            $this->unsetRelation('translations');
            $this->load('translations');
        }
    }

    public function getTranslationsForField(string $field): array
    {
        return $this->translations()
            ->where('field', $field)
            ->pluck('content', 'locale')
            ->toArray();
    }

    public function hasTranslation(string $field, string $locale = null): bool
    {
        $locale = $locale ?? app()->getLocale();
        
        if ($this->relationLoaded('translations')) {
            return $this->translations->where('field', $field)->where('locale', $locale)->isNotEmpty();
        }
        
        return $this->translations()
            ->where('field', $field)
            ->where('locale', $locale)
            ->exists();
    }

    public function getTranslatableFields(): array
    {
        return static::$translatableFields ?? [];
    }

    // Scope for eager loading translations efficiently
    public function scopeWithTranslations($query, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        
        return $query->with([
            'translations' => function ($q) use ($locale) {
                $q->whereIn('locale', [$locale, static::$defaultLocale, static::$fallbackLocale])
                  ->orderByRaw("FIELD(locale, '{$locale}', '" . static::$defaultLocale . "', '" . static::$fallbackLocale . "')");
            }
        ]);
    }

    // Helper method to get all translations for a model
    public function getAllTranslations(): array
    {
        $result = [];
        $translations = $this->relationLoaded('translations') 
            ? $this->translations 
            : $this->translations()->get();
            
        foreach ($translations as $translation) {
            $result[$translation->field][$translation->locale] = $translation->content;
        }
        
        return $result;
    }

    // Bulk set translations (useful for forms)
    public function setTranslations(array $translations): void
    {
        foreach ($translations as $field => $localeData) {
            if (is_array($localeData)) {
                foreach ($localeData as $locale => $content) {
                    if (!empty($content)) {
                        $this->setTranslation($field, $content, $locale);
                    }
                }
            }
        }
    }

    // Clear translation cache (useful for testing)
    public function clearTranslationCache(): void
    {
        $this->translationCache = [];
    }
}