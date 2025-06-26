<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'description', 'tags',
        'show_in_homepage', 'location', 'year'
    ];

    protected $casts = [
        'tags' => 'array',
        'show_in_homepage' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

