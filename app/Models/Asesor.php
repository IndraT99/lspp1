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
}
