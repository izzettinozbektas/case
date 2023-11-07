<?php

namespace App\Services\Repositories;

use App\Models\Order;
use App\Models\OrderShopping;
use App\Models\Shopping;
use App\Services\Interfaces\OrderInterface;
use Illuminate\Support\Facades\Auth;


class OrderRepository implements OrderInterface
{
    public function getOrders($request): array
    {
        $limit =  $request->get('limit') ?? 5;
        return Order::with(['orderShopping.product'])->paginate($limit)->toArray();
    }
    public function getOrder($id): array
    {
        return Order::find($id)->toArray();
    }

    public function orderCreate($request): bool
    {
        $totalPrice = Shopping::where('user_id',$request['user_id'])->sum('total_price');
        $request['total_price'] = $totalPrice;
        unset($request['card_number'],$request['expiration_date'],$request['securty_code']);
        $orderModel = Order::create($request);
        if($request['status'])
        {
            $datas = Shopping::where('user_id',$request['user_id'])->get()->toArray();
            foreach ($datas as $data){
                $data['order_id'] = $orderModel->id;
                OrderShopping::create($data);
            }
            Shopping::where('user_id',$request['user_id'])->delete();
        }

        return true;
    }
}
