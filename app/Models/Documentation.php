<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image_path',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::saved(function ($documentation) {
            \Illuminate\Support\Facades\Cache::forget('active_documentations');
        });

        static::deleted(function ($documentation) {
            \Illuminate\Support\Facades\Cache::forget('active_documentations');
        });
    }
}
