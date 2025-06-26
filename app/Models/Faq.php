<?php
namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    use HasTranslations;

    protected $fillable = ['faq_category_id'];
    protected static $translatableFields = ['question', 'answer'];

    public function faqCategory(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class);
    }

    protected static function booted(): void
    {
        // Ensure FAQ always has a category before saving
        static::saving(function (Faq $faq) {
            if (empty($faq->faq_category_id)) {
                $faq->faq_category_id = 1; // General category
            }
        });
    }
}