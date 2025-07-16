<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nibandha extends Model
{
    use HasTranslations;

    protected $fillable = ['user_id'];

    protected static $translatableFields = ['title', 'description', 'essay'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}