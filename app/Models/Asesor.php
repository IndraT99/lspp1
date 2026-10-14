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
        // ⚡ Bolt Performance Optimization:
        // Clear the cache when an asesor is modified to ensure data consistency
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors');
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors');
        });
    }
}
