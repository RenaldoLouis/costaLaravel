<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'postcode',
        'email',
        'phone',
        'user_id',
        'province_code',
        'city_code',
        'district_code',
        'village_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
