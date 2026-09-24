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

    protected static function booted()
    {
        // ⚡ Bolt: Invalidate Asesor cache when a Scheme is updated to prevent stale eager-loaded nested data
        static::saved(function ($model) {
            Cache::forget('asesors.active.with_scheme');
        });

        static::deleted(function ($model) {
            Cache::forget('asesors.active.with_scheme');
        });
    }
}
