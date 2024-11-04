<?php

// app/Models/AffiliateClick.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateClick extends Model
{
    protected $fillable = ['affiliate_link_id', 'visitor_ip', 'clicked_at'];

    // Relasi ke AffiliateLink
    public function affiliateLink()
    {
        return $this->belongsTo(AffiliateLink::class);
    }
}
