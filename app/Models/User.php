<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_code',
        'gender',
        'birth',
        'balance',
        'is_affiliate',
        'is_reseller',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'tiktok',
        'reseller_verified_at',
        'affiliator_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_affiliate' => 'boolean',
        'is_reseller' => 'boolean',
        'is_verified_reseller' => 'boolean',
    ];


    // Relasi ke AffiliateLink
    public function affiliateLinks()
    {
        return $this->hasMany(AffiliateLink::class);
    }

    // app/Models/User.php
    public function updateBalance($amount)
    {
        $this->balance += $amount;
        $this->save();
    }

    // orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    // User.php
    public function getSlugAttribute()
    {
        return md5($this->id);
    }

    // addresses
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
