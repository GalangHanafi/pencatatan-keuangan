<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        // iconnya pakai box icon
        // ini link iconnya
        // https://boxicons.com/
    ];

}
