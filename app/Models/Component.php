<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'page_id',
        'component_template_id',
        'name',
        'html',
        'data',
        'order',
        'is_default',
    ];

    protected $casts = [
        'data' => 'array',
        'is_default' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function template()
    {
        return $this->belongsTo(ComponentTemplate::class, 'component_template_id');
    }
}
