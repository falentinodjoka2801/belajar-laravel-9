<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use App\Data\Mahasiswa;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertSame;

class ServiceContainerTest extends TestCase
{
    public function testDependencyInjection(){
        //$foo  =   new Foo();

        // $foo1   =   $this->app->make(Foo::class);
        // $foo2   =   $this->app->make(Foo::class);

        // self::assertEquals('Foo', $foo1->foo());
        // self::assertEquals('Foo', $foo2->foo());
        // self::assertNotSame($foo1, $foo2);

        $app    =   $this->app;

        $app->bind(Mahasiswa::class, function(){
            return new Mahasiswa('28012000', 'Falentino Djoka');
        });

        $falentinoDjoka =   $app->make(Mahasiswa::class);
        $feryAnugerah   =   $app->make(Mahasiswa::class);

        self::assertEquals('Falentino Djoka', $falentinoDjoka->nama);
        self::assertEquals('28012000', $falentinoDjoka->npm);
        self::assertNotSame($falentinoDjoka, $feryAnugerah);
    }
    public function testFooBarSingleton(){
        $app    =   $this->app;

        $app->singleton(Foo::class, fn () => new Foo());

        $foo    =   $app->make(Foo::class);
        $bar    =   $app->make(Bar::class);

        self::assertEquals('Foo and Bar', $bar->bar());
        self::assertSame($foo, $bar->foo);
    }
    public function testFooBarInstance(){
        $app    =   $this->app;

        $app->singleton(Foo::class, fn () => new Foo());
        $app->singleton(Bar::class, function($app){
            $foo    =   new Foo();
            return new Bar($foo);
        });

        $foo    =   $app->make(Foo::class);
        $bar1   =   $app->make(Bar::class);
        $bar2   =   $app->make(Bar::class);

        self::assertNotSame($foo, $bar1->foo); 
        self::assertSame($bar1->foo, $bar2->foo); 
        // self::assertSame($bar1, $bar2);
    }
}
