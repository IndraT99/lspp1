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
        // ⚡ Bolt Optimization: Cache Invalidation
        // Clears the active asesors cache when a related Scheme is updated/deleted
        // Prevents stale data in the eager-loaded relationship
        static::saved(function ($scheme) {
            \Illuminate\Support\Facades\Cache::forget('asesors_active_with_schemes');
        });

        static::deleted(function ($scheme) {
            \Illuminate\Support\Facades\Cache::forget('asesors_active_with_schemes');
        });
    }
}
