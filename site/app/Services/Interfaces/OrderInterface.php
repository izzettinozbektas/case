<?php

namespace App\Services\Interfaces;


interface OrderInterface
{
    public function getOrders($request):array;
    public function getOrder($id):array;
    public function orderCreate($request):bool;

}
