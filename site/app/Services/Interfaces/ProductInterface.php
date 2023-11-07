<?php

namespace App\Services\Interfaces;

use App\Requests\PermissionRequest;

interface ProductInterface
{
    public function getProducts($request):array;
    public function productCreate($request):bool;
    public function getProduct($id):array;
    public function productUpdate($request,$id):bool;
    public function productDelete($id):bool;
}
