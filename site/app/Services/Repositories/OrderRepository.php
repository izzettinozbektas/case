<?php

namespace App\Services\Repositories;

use App\Models\Order;
use App\Models\OrderMongo;
use App\Models\OrderShopping;
use App\Models\OrderShoppingMongo;
use App\Models\Shopping;
use App\Services\Interfaces\OrderInterface;
use Illuminate\Support\Facades\Auth;


class OrderRepository implements OrderInterface
{
    public function getOrders($request): array
    {

        $limit =  $request->get('limit') ?? 5;

        //return Order::with(['orderShopping.product'])->paginate($limit)->toArray();
        return  OrderMongo::with(['orderShopping'])->paginate($limit)->toArray();
    }
    public function getOrder($id): array
    {
        //return Order::find($id)->toArray();
        return OrderMongo::find($id)->toArray();
    }

    public function orderCreate($request): bool
    {
        $totalPrice = Shopping::where('user_id',$request['user_id'])->sum('total_price');
        $request['total_price'] = $totalPrice;
        unset($request['card_number'],$request['expiration_date'],$request['securty_code']);
        // $orderModel = Order::create($request);
        // mongo db kayıtı
        $orderMongo = new OrderMongo();
        $orderShoppingMongo = new OrderShoppingMongo();
        $orderMongo->fill($request);
        $orderMongo->save();

        if($request['status'])
        {
            $datas = Shopping::where('user_id',$request['user_id'])->get()->toArray();
            foreach ($datas as $data){
                //OrderShopping::create($data);
                //mongo db kayıt
                $orderShoppingMongo->fill($data);
                $orderMongo->orderShopping()->save($orderShoppingMongo);
            }
            Shopping::where('user_id',$request['user_id'])->delete();
        }

        return true;
    }
}
