<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderShopping extends Model
{
    use HasFactory;
    protected $table = 'order_shoppings';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'price',
        'total_price',
        'status',
        'amount'
    ];
    public function product():HasOne
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
