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
        // ⚡ Bolt: Invalidate the Asesor cache because it eager-loads Schemes, preventing stale nested data
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_scheme');
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_scheme');
        });
    }
}
