<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'product_id',
        'quantity',
        'price',
        'payment_method',
        'status',

    ];

    // PRODUCT RELATION
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // USER RELATION
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}