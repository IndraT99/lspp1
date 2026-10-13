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

    protected static function booted()
    {
        static::saved(function ($asesor) {
            Cache::forget('public_asesors');
        });

        static::deleted(function ($asesor) {
            Cache::forget('public_asesors');
        });
    }

    public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }
}
