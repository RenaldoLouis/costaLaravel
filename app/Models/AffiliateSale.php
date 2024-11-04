<?php

// app/Models/AffiliateSale.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateSale extends Model
{
    protected $fillable = ['affiliate_link_id', 'amount', 'commission', 'sale_at'];

    // Relasi ke AffiliateLink
    public function affiliateLink()
    {
        return $this->belongsTo(AffiliateLink::class);
    }
}
