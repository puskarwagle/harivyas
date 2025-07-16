<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaqCategory extends Model
{
    use HasTranslations;

    protected $fillable = ['id'];
    protected static $translatableFields = ['name'];

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    protected static function booted(): void
    {
        static::deleting(function (FaqCategory $category) {
            if ($category->id === 1) {
                throw new \Exception('Cannot delete the General category');
            }

            $category->faqs()->update(['faq_category_id' => 1]);
        });
    }

    public function delete()
    {
        if ($this->id === 1) {
            throw new \Exception('Cannot delete the General category');
        }

        return parent::delete();
    }
}
