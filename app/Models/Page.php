<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id', 'name', 'slug', 'is_default', 'is_visible', 
        'is_published', 'show_in_nav', 'nav_order', 'type', 'meta'
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'is_visible' => 'boolean',
        'is_published' => 'boolean',
        'show_in_nav' => 'boolean',
        'meta' => 'array',
    ];

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
