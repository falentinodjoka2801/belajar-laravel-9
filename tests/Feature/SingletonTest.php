<?php

namespace Tests\Feature;

use App\Data;
use App\Data\Mahasiswa;
use Tests\TestCase;

class SingletonTest extends TestCase
{
    public function testSingleton(){
        $app    =   $this->app;
        $app->singleton(Mahasiswa::class, fn () => new Mahasiswa('28012000', 'Falentino Djoka'));

        $mahasiswa1     =   $app->make(Mahasiswa::class);
        $mahasiswa2     =   $app->make(Mahasiswa::class);

        self::assertSame($mahasiswa1, $mahasiswa2);
    }
    public function testInstance(){
        $app    =   $this->app;

        $tino   =   new Mahasiswa('28012000', 'Falentino Djoka');
        $app->instance(Mahasiswa::class, $tino);

        $mahasiswa1     =   $app->make(Mahasiswa::class);
        $mahasiswa2     =   $app->make(Mahasiswa::class);

        self::assertEquals('Falentino Djoka', $mahasiswa1->nama);
        self::assertEquals('Falentino Djoka', $mahasiswa2->nama);
        self::assertSame($mahasiswa1, $mahasiswa2);
    }
}
