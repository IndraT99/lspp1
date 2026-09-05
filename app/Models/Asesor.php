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
        parent::booted();

        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('asesors_public_list');
        });

        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('asesors_public_list');
        });
    }
}
