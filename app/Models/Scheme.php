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
        // ⚡ BOLT OPTIMIZATION: Clear Asesor cache when Scheme is updated or deleted
        // This prevents stale nested scheme data in the eagerly loaded Asesor cache
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_scheme');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_scheme');
        });
    }
}
