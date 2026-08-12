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
        // ⚡ Bolt: Clear active_asesors cache when an asesor is modified
        static::saved(function ($asesor) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors');
        });

        static::deleted(function ($asesor) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors');
        });
    }
}
