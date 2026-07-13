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
        static::saved(function ($scheme) {
            \Illuminate\Support\Facades\Cache::forget('home_schemes');
        });

        static::deleted(function ($scheme) {
            \Illuminate\Support\Facades\Cache::forget('home_schemes');
        });
    }
}
