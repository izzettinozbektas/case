<?php

namespace App\Services\Repositories;

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
        Shopping::create($request);
        return true;
    }
}
