<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Faq extends Model
{
    use HasTranslations;

    protected static $translatableFields = ['question', 'answer'];
    
    protected $fillable = [
        'slug',
        'category_id',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class, 'category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(FaqTag::class, 'faq_tag_pivot');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function scopeWithCategory($query)
    {
        return $query->with(['category', 'category.translations']);
    }

    public function scopeWithTags($query)
    {
        return $query->with(['tags', 'tags.translations']);
    }

    public function scopeWithTranslations($query, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return $query->with([
            'translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }
        ]);
    }

    // Helper methods for frontend
    public function getTagsArray(): array
    {
        return $this->tags->map(function ($tag) {
            return $tag->translate('name') ?? $tag->slug;
        })->toArray();
    }

    public function getCategoryName(): string
    {
        return $this->category?->translate('name') ?? 'Uncategorized';
    }
}
