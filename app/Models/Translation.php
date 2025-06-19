<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    /** @use HasFactory<\Database\Factories\TranslationFactory> */
    use HasFactory;
    protected $fillable = [
        'translatable_type',
        'translatable_id', 
        'locale',
        'field',
        'content'
    ];

    public function translatable()
    {
        return $this->morphTo();
    }
}
