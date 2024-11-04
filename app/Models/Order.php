<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dealer_id',
        'status',
        'total',
        'code',
        'invoice_number',
        'payment_method',
        'payment_status',
        'shipping_name',
        'shipping_phone',
        'shipping_address',
        'shipping_address2',
        'shipping_email',
        'shipping_postcode',
        'shipping_method',
        'shipping_cost',
        'shipping_number',
        'billing_id',
        'province_code',
        'city_code',
        'district_code',
        'village_code',
        'latitude',
        'longitude',
        'doku_request_json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }
}
