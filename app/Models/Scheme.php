<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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

    // ⚡ Bolt: Cache invalidation to prevent stale nested data
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('active_asesors_with_schemes');
        });

        static::deleted(function ($model) {
            Cache::forget('active_asesors_with_schemes');
        });
    }
}
