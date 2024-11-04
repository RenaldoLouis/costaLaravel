<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'layout',
        'content',
        'order',
    ];

    protected $casts = [
        'content' => 'array', // Mengonversi JSON ke array
    ];

    public function showcase()
    {
        return $this->belongsTo(Showcase::class);
    }
}
