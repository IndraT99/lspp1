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

    // Invalidate cache when an Asesor is updated or deleted
    protected static function booted()
    {
        static::saved(function ($asesor) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');
        });

        static::deleted(function ($asesor) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');
        });
    }
}
