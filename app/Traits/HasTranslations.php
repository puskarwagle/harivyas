<?php

namespace App\Traits;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasTranslations
{
    // Cache translations in memory to avoid repeated queries
    protected $translationCache = [];

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function translate(string $field, string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();

        $cacheKey = "{$field}.{$locale}";
        if (isset($this->translationCache[$cacheKey])) {
            return $this->translationCache[$cacheKey];
        }

        $result = null;

        if ($this->relationLoaded('translations')) {
            $translation = $this->translations->first(function ($t) use ($field, $locale) {
                return $t->field === $field && $t->locale === $locale;
            });
            $result = $translation?->content;
        } else {
            $translation = $this->translations()
                ->where('field', $field)
                ->where('locale', $locale)
                ->first();
            $result = $translation?->content;
        }

        $this->translationCache[$cacheKey] = $result;

        return $result;
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
            return $this->translations->contains(fn($t) => $t->field === $field && $t->locale === $locale);
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
            'translations' => fn($q) => $q->where('locale', $locale)
        ]);
    }

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

    public function clearTranslationCache(): void
    {
        $this->translationCache = [];
    }
}
