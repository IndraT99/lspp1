<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Scheme extends Model
{
    protected static function booted()
    {
        // ⚡ Invalidate active asesors cache because asesors eager-load their schemes
        static::saved(function () {
            Cache::forget('active_asesors');
        });

        static::deleted(function () {
            Cache::forget('active_asesors');
        });
    }

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
}
