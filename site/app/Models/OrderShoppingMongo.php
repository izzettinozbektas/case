<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasOne;

class OrderShoppingMongo extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'order_shoppings';
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
