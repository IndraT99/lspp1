<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Cache;

class Scheme extends Model
{
    protected static function booted()
    {
        static::saved(function ($scheme) {
            Cache::forget('active_schemes');
            Cache::forget('active_asesors');
        });

        static::deleted(function ($scheme) {
            Cache::forget('active_schemes');
            Cache::forget('active_asesors');
        });
    }

    public static function getActiveSchemes()
    {
        // ⚡ Bolt: Cache active schemes to prevent repeated database queries
        // Impact: Reduces DB load on home, schemes list, and registration pages
        return Cache::rememberForever('active_schemes', function () {
            return self::where('is_active', true)->get();
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
