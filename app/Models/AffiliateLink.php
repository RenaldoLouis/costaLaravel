<?php

// app/Models/AffiliateLink.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateLink extends Model
{
    protected $fillable = ['user_id', 'product_id', 'affiliate_code', 'affiliate_url'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi ke AffiliateClick
    public function affiliateClicks()
    {
        return $this->hasMany(AffiliateClick::class);
    }

    // Relasi ke AffiliateSale
    public function affiliateSales()
    {
        return $this->hasMany(AffiliateSale::class);
    }
}
