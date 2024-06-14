<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'balance',
        'icon',
        'is_default',
    ];

    // relation between account and user (one user has many accounts)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relation between account and transaction (one account has many transactions)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
