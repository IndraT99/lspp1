<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'is_active',
        'unit_count',
        'packaging_type',
        'document_path',
        'registration_link',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        // ⚡ Invalidate caches that depend on Scheme data to prevent stale nested relationships
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('asesors.active');
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('asesors.active');
        });
    }
}
