<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'html_title',
        'title_in',
        'html_title_in',
        'slug',
        'excerpt',
        'excerpt_in',
        'content',
        'content_in',
        'image',
        'user_id',
        'meta_title',
        'meta_title_in',
        'meta_description',
        'meta_description_in',
        'meta_image',
        'meta_image_in',
        'meta_keywords',
        'meta_keywords_in',
        'meta_robots',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
