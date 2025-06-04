<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentTemplate extends Model
{
    protected $fillable = ['type', 'name', 'html', 'default_data'];

    protected $casts = [
        'default_data' => 'array',
    ];
}
