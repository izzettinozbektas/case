<?php

namespace App\Services\Repositories;

use App\Exceptions\AmountException;
use App\Models\Product;
use App\Models\Shopping;
use App\Services\Interfaces\ShoppingInterface;


class ShoppingRepository implements ShoppingInterface
{
    public function getShoppings($userId): array
    {
        return Shopping::where('user_id',$userId)->get()->toArray();
    }

    public function shoppingCreate($request): bool
    {
        if(Product::where('id',$request['product_id'])->where('amount','>=',$request['amount'])->exists())
        {
            Shopping::create($request);
            return true;
        }
        throw new AmountException("Yeterli Stok Yok",200);
    }
}
