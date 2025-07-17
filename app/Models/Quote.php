<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasTranslations;

    protected $fillable = ['display_date', 'is_active'];
    protected static $translatableFields = ['quote', 'author'];

    protected $casts = [
        'display_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForDate($query, $date = null)
    {
        $date = $date ?? now()->toDateString();
        return $query->where('display_date', $date);
    }
}