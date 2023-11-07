<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\PermissionController;
use \App\Http\Controllers\RoleController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function (){
    // get route start>
    Route::get('/logouth', [AuthController::class, 'logouth']);
    Route::get('/userSearch', [UserController::class, 'userSearch']);
    Route::get('/userInfo', [UserController::class, 'userInfo']);
    // get route end>


    //post route start>
    Route::post('setUserRole/{id}', [UserController::class, 'assignRole']);
    Route::post('revokeUserRole/{id}', [UserController::class, 'revokeRole']);

    // resource route start
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/users', UserController::class);

    Route::resource('/products',ProductController::class);
    Route::resource('/orders',OrderController::class);
    Route::resource('/shopping',ShoppingController::class);

    // resource route end

    Route::group(['middleware' => ['permissionCheck']], function () {
    });
});



