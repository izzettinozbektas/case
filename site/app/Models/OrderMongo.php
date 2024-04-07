<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

class OrderMongo extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'payservice_response'
    ];
    // geçici olarak kapatıyoruz
    public $timestamps= false;
    public function orderShopping(): HasMany
    {
        return $this->hasMany(OrderShoppingMongo::class);
    }
}
