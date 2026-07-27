<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        // ⚡ Bolt: Invalidate the cache when an assessor is saved or deleted to ensure data freshness.
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');
        });
    }
}
