<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'province_code',
        'city_code',
        'district_code',
        'village_code',
        'postal_code',
        'latitude',
        'longitude',
        'recipient_name',
        'recipient_email',
        'recipient_phone',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
