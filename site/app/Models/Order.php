<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
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
        return $this->hasMany(OrderShopping::class,'order_id','id');
    }
}
