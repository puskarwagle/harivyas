<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entries extends Model
{
    protected $fillable = [
        'sender_name',
        'type',
        'content',
        'title',
        'reply_to_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function replyTo()
    {
        return $this->belongsTo(Entries::class, 'reply_to_id');
    }

    public function replies()
    {
        return $this->hasMany(Entries::class, 'reply_to_id');
    }
}