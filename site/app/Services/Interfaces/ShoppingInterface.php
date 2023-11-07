<?php

namespace App\Services\Interfaces;


interface ShoppingInterface
{
    public function getShoppings($userId):array;
    public function shoppingCreate($request):bool;
}
