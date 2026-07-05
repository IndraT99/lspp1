<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatUji extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'capacity',
        'is_active',
    ];

    protected static function booted()
    {
        static::saved(function ($tempatUji) {
            \Illuminate\Support\Facades\Cache::forget('active_tempat_ujis');
        });

        static::deleted(function ($tempatUji) {
            \Illuminate\Support\Facades\Cache::forget('active_tempat_ujis');
        });
    }
}
