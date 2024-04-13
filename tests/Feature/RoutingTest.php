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
    public function testRouteParameter(){
        $this->get('/products/1')
        ->assertSeeText('Product 1');

        $this->get('/products/2')
        ->assertSeeText('Product 2');

        $this->get('/products/1/items/abc')
        ->assertSeeText('Product 1, Items abc');
        
        $this->get('/products/2/items/oasis')
        ->assertSeeText('Product 2, Items oasis');
    }
    public function testRouteParameterRegex(){
        $this->get('/category/100')
        ->assertSeeText('Category 100');

        $this->get('/category/tino')
        ->assertSeeText('404 Page Not Found');
    }
    public function testNamedRoute(){
        $this->get('/produk/28012000')
        ->assertSeeText('http://localhost/products/28012000');

        $this->get('/produk-redirect/28012000')
        ->assertRedirect('/products/28012000');
    }
}
