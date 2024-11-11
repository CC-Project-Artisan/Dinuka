<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'imageUrl',
        'title',
        'category',
        'price',
    ];
}
