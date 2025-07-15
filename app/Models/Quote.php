<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote',
        'author',
        'display_date',
        'is_active'
    ];

    protected $casts = [
        'display_date' => 'date',
        'is_active' => 'boolean'
    ];
}