<?php

namespace App\Providers;

use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Support\ServiceProvider;

class FooBarServiceProvider extends ServiceProvider{
    public array $singletons    =   [
        HelloService::class =>  HelloServiceIndonesia::class
    ];

    public function register(){
        
    }
    public function boot(){
        //
    }
}
