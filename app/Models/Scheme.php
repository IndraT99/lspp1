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

    // ⚡ Bolt: Invalidate cache when a Scheme is saved or deleted since Asesor eager loads Scheme
    protected static function booted()
    {
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');
        });
    }
}
