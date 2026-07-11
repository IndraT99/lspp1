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
        // ⚡ Bolt Optimization: Invalidate active_asesors_with_scheme cache globally on save/delete
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_scheme');
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('active_asesors_with_scheme');
        });
    }
}
