<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Asesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reg_number',
        'scheme_id',
        'is_active',
    ];

    public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }

    protected static function booted()
    {
        // ⚡ Bolt: Invalidate the cache when an Asesor is created, updated, or deleted
        static::saved(function ($model) {
            Cache::forget('asesors.active.with_scheme');
        });

        static::deleted(function ($model) {
            Cache::forget('asesors.active.with_scheme');
        });
    }
}
