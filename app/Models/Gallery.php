<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'event_date',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::saved(function ($gallery) {
            \Illuminate\Support\Facades\Cache::forget('active_galleries');
            \Illuminate\Support\Facades\Cache::forget('homepage_galleries');
        });

        static::deleted(function ($gallery) {
            \Illuminate\Support\Facades\Cache::forget('active_galleries');
            \Illuminate\Support\Facades\Cache::forget('homepage_galleries');
        });
    }
}
