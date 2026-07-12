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
        static::saved(function ($asesor) {
            Cache::forget('active_asesors');
        });

        static::deleted(function ($asesor) {
            Cache::forget('active_asesors');
        });
    }

    public static function getActiveAsesors()
    {
        // ⚡ Bolt: Cache active asesors with eager-loaded schemes
        // Impact: Eliminates N+1 queries and repeated DB hits on the asesor list page
        return Cache::rememberForever('active_asesors', function () {
            return self::where('is_active', true)->with('scheme')->get();
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
