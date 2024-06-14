<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'icon',
        'type', // ['income', 'expense']
        'is_default',
    ];

    // relationship between category and user (one user has many categories)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship between category and transaction (one category has many transactions)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
