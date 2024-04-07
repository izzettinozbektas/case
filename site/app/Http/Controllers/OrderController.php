<?php

namespace App\Http\Controllers;

use App\Resources\OrderResource;
use App\Response\Response;
use App\Services\Interfaces\OrderInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $repository;
    protected $response;
    public function __construct(OrderInterface $repository, Response $response)
    {
        $this->repository = $repository;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->response->sendPaginateResponse(new OrderResource($this->repository->getOrders($request)));
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
        // örnek ödemee servsini dönüşü.
        $examplePayService = new \stdClass();
        $examplePayService->status = true;
        $examplePayService->response = "işlem başarılı";

        // arayaseper servisleri eklene bilir.
        $datas = $request->all();
        $datas['payservice_response'] = $examplePayService->response; // ödeme data
        $datas['user_id'] = Auth::id();
        $datas['status'] = $examplePayService->status;
        return $this->response->sendResponse($this->repository->orderCreate($datas),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->response->sendResponse(new OrderResource($this->repository->getOrder($id)));
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
