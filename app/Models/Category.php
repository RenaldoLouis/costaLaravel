<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'description',
        'image',
        'is_active',
        'parent_id',
        'content_box_title',
        'content_box',
        'content_box_title_in',
        'content_box_in'
    ];

    // casts
    protected $casts = [
        'parent_id' => 'integer',
        'is_active' => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
