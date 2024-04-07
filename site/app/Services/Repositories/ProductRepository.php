<?php

namespace App\Services\Repositories;

use App\Models\Product;
use App\Services\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{
    public function getProducts($request): array
    {
        $limit =  $request->get('limit') ?? 5;
        return Product::paginate($limit,['id','name','description','price','amount'])->toArray();
    }

    public function productCreate($request): bool
    {
        Product::create($request);
        return true;
    }
    public function getProduct($id): array
    {
        return Product::find($id)->toArray();
    }

    public function productUpdate($request, $id): bool
    {
        Product::where('id',$id)->lockForUpdate()->update($request);
        return true;
    }
    public function productDelete($id): bool
    {
        Product::find($id)->delete();
        return true;
    }
}
