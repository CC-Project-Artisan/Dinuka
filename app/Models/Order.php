<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'email', 
        'shipping_address', 
        'status', 
        'total', 
        'stripe_payment_id',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
