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
        // ⚡ Bolt Performance Optimization:
        // Clear related caches when a scheme is modified to prevent stale nested data in asesors
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors');
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors');
        });
    }
}
