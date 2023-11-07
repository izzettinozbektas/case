<?php

namespace App\Http\Controllers;

use App\Resources\ProductResource;
use App\Response\Response;
use App\Services\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;
    protected $response;
    public function __construct(ProductInterface $repository,Response $response)
    {
        $this->repository = $repository;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->response->sendPaginateResponse(new ProductResource($this->repository->getProducts($request)));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        return $this->response->sendResponse($this->repository->productCreate($datas));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->response->sendResponse( new ProductResource($this->repository->getProduct($id)));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datas = $request->all();
        return $this->response->sendResponse($this->repository->productUpdate($datas,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->response->sendResponse($this->repository->productDelete($id));
    }
}
