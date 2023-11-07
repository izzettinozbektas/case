<?php

namespace App\Providers;


use App\Services\Interfaces\PermissionInterface;
use App\Services\Interfaces\ProductInterface;
use App\Services\Interfaces\RoleInterface;
use App\Services\Interfaces\UserInterface;
use App\Services\Interfaces\OrderInterface;
use App\Services\Repositories\PermissionRepository;
use App\Services\Repositories\ProductRepository;
use App\Services\Repositories\RoleRepository;
use App\Services\Repositories\UserRepository;
use App\Services\Repositories\OrderRepository;
use App\Services\Interfaces\ShoppingInterface;
use App\Services\Repositories\ShoppingRepository;



class RepositoryPatternProvider
{
    /**
     * Register Repository dependency injection
     *
     * @return void
     */
    public static function register(): void
    {
        // burada İnterface ile repository eşliyoruz
        app()->bind(UserInterface::class, UserRepository::class);
        app()->bind(RoleInterface::class, RoleRepository::class);
        app()->bind(PermissionInterface::class, PermissionRepository::class);
        app()->bind(ProductInterface::class,ProductRepository::class);
        app()->bind(OrderInterface::class,OrderRepository::class);
        app()->bind(ShoppingInterface::class,ShoppingRepository::class);
    }
}
