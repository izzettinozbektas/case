<?php

namespace App\Http\Controllers;

use App\Resources\ShoppingResource;
use App\Response\Response;
use App\Services\Interfaces\ShoppingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    protected $repository;
    protected $response;
    public function __construct(ShoppingInterface $repository,Response $response)
    {
        $this->repository = $repository;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response->sendResponse(new ShoppingResource($this->repository->getShoppings(Auth::id())));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $datas['user_id'] = Auth::id();
        $datas['total_price']  = $datas['price'] * $datas['amount'];
        return $this->response->sendResponse($this->repository->shoppingCreate($datas));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
