<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase{
    public function testConfiguration(){
        $authorFirstName    =   config('contoh.name.first');
        $authorLastName     =   config('contoh.name.last');

        self::assertEquals('Falentino', $authorFirstName);
        self::assertEquals('Djoka', $authorLastName);
    }
}
