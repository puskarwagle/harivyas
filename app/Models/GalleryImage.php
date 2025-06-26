<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['gallery_post_id', 'url', 'caption'];

    public function post()
    {
        return $this->belongsTo(GalleryPost::class, 'gallery_post_id');
    }
}

