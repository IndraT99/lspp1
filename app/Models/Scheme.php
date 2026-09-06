<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Scheme extends Model
{
    protected static function booted()
    {
        static::saved(function ($scheme) {
            Cache::forget('asesors_active_with_scheme');
        });

        static::deleted(function ($scheme) {
            Cache::forget('asesors_active_with_scheme');
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
