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

    // ⚡ Bolt: Clear active_asesors cache when an Asesor is added/updated/deleted
    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('active_asesors');
        });

        static::deleted(function () {
            Cache::forget('active_asesors');
        });
    }
}
