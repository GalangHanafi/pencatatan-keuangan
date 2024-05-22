<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'account_id',
        'category_id',
        'type',
        'amount',
        'date',
        'description',
    ];

    // relation between transaction and user (one user has many transactions)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relation between transaction and account (one account has many transactions)
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    // relation between transaction and category (one category has many transactions)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
