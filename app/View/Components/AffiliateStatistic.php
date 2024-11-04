<?php

namespace App\View\Components;

use App\Models\AffiliateClick;
use App\Models\AffiliateLink;
use App\Models\AffiliateSale;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AffiliateStatistic extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $generatedLinks = AffiliateLink::where('user_id', auth()->id())->count();
        $clicks = AffiliateClick::whereHas('affiliateLink', function ($query) {
            $query->where('user_id', auth()->id());
        })->count();

        // sales: AffiliateSale hitung jumlah berapa kali sale
        $sales = AffiliateSale::join('affiliate_links', 'affiliate_links.id', '=', 'affiliate_sales.affiliate_link_id')
            ->where('affiliate_links.user_id', auth()->id())
            ->count();

        return view('components.affiliate-statistic', compact('generatedLinks', 'clicks', 'sales'));
    }
}
