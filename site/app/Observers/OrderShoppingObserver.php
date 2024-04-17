<?php

namespace App\Observers;

use App\Models\OrderShoppingMongo;
use App\Services\Interfaces\ProductInterface;


class OrderShoppingObserver
{
    public function __construct(protected ProductInterface $repository)
    {
    }

    /**
     * Handle the OrderShoppingMongo "created" event.
     */
    public function created(OrderShoppingMongo $orderShoppingMongo): void
    {
        $product =  $this->repository->getProduct($orderShoppingMongo['product_id']);
        $product['amount'] = $product['amount'] - $orderShoppingMongo['amount'];
        $this->repository->productUpdate($product,$orderShoppingMongo['product_id']);
    }

    /**
     * Handle the OrderShoppingMongo "updated" event.
     */
    public function updated(OrderShoppingMongo $orderShoppingMongo): void
    {
        //
    }

    /**
     * Handle the OrderShoppingMongo "deleted" event.
     */
    public function deleted(OrderShoppingMongo $orderShoppingMongo): void
    {
        //
    }

    /**
     * Handle the OrderShoppingMongo "restored" event.
     */
    public function restored(OrderShoppingMongo $orderShoppingMongo): void
    {
        //
    }

    /**
     * Handle the OrderShoppingMongo "force deleted" event.
     */
    public function forceDeleted(OrderShoppingMongo $orderShoppingMongo): void
    {
        //
    }
}
