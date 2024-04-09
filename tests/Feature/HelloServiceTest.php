<?php

namespace Tests\Feature;

use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;

use Tests\TestCase;

class HelloServiceTest extends TestCase
{
    public function testHelloSerive(){
        $app    =   $this->app;

        $app->singleton(HelloService::class, HelloServiceIndonesia::class);
        
        $helloService   =   $app->make(HelloService::class);
        self::assertEquals('Halo Tino', $helloService->hello('Tino'));
    }
}
