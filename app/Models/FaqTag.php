<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqTag extends Model
{
    /** @use HasFactory<\Database\Factories\FaqTagFactory> */
    use HasFactory, HasTranslations;

    protected static $translatableFields = ['name'];

    protected $fillable = ['slug'];
    
    public function faqs(): BelongsToMany
    {
        return $this->belongsToMany(Faq::class, 'faq_tag_pivot');
    }
}
