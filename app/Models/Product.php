<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_in',
        'sku',
        'slug',
        'tagline',
        'tagline_in',
        'description',
        'description_in',
        'summary',
        'summary_in',
        'image',
        'price',
        'category_id',
        'is_active',
        'is_featured',
        'discount_percentage',
        'discount_amount',
        'discount_fixed',
        'dealer_price',
        'affiliate_commission',
        'weight',
        'serial_numbers',
        'meta_title',
        'meta_title_in',
        'meta_description',
        'meta_description_in',
        'meta_image',
        'meta_image_in',
        'meta_keywords',
        'meta_keywords_in',
        'content_box_title',
        'content_box',
        'content_box_title_in',
        'content_box_in',
    ];

    // casts
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'category_id' => 'integer',
    ];

    // relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Relasi ke AffiliateLink
    public function affiliateLinks()
    {
        return $this->hasMany(AffiliateLink::class);
    }

}
