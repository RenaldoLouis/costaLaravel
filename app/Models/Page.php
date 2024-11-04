<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_in',
        'slug',
        'excerpt',
        'excerpt_in',
        'content',
        'content_in',
        'image',
        'is_active'
    ];

    // casts
    protected $casts = [
        'is_active' => 'boolean'
    ];
}
