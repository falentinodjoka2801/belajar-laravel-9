<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testPZN(){
        $this->get('/pzn')
        ->assertStatus(200)
        ->assertSeeText('Hello Programmer Zaman Now');
    }
    public function testRedirect(){
        $this->get('/youtube')
        ->assertRedirect('/pzn');
    }
    public function testFallback(){
        $this->get('/home')
        ->assertSeeText('Page Not Found');
    }
}
