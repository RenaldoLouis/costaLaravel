<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'title',
        'title_in',
        'subtitle',
        'subtitle_in',
        'description',
        'description_in',
        'image',
        'image_in',
        'link',
        'is_active',
    ];

    // casts
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
