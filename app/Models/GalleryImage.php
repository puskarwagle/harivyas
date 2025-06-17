<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'url',
        'tags', 'show_in_homepage', 'location',
        'year'
    ];

    protected $casts = [
        'tags' => 'array',
        'show_in_homepage' => 'boolean',
    ];
}
