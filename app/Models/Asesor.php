<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Asesor extends Model
{
    use HasFactory;

    protected static function booted()
    {
        // ⚡ Invalidate active asesors cache when an asesor is created, updated, or deleted
        static::saved(function () {
            Cache::forget('active_asesors');
        });

        static::deleted(function () {
            Cache::forget('active_asesors');
        });
    }

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
}
