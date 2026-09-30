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

    /**
     * Get active schemes from cache or database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getActiveSchemes()
    {
        return \Illuminate\Support\Facades\Cache::rememberForever('active_schemes', function () {
            return self::where('is_active', true)->get();
        });
    }

    protected static function booted()
    {
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('active_schemes');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('active_schemes');
        });
    }
}
