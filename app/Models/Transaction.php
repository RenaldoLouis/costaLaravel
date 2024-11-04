<?php

// app/Models/Transaction.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Nama tabel
    protected $table = 'transactions';

    // Kolom yang dapat diisi
    protected $fillable = [
        'user_id', 'amount', 'type', 'description'
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Fungsi tambahan sesuai kebutuhan
}
