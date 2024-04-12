<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView(){
        $this->get('/hello')
        ->assertSeeText('Hello Tino Oasis');
    }
    public function testNested(){
        $this->get('/hello-world')
        ->assertSeeText('World Tino Oasis part II');
    }

    //Testing a view without route, just use this functionality (Unit Test)
    public function testTemplate(){
        $this->view('hello.world', ['name' => 'Oasis'])
        ->assertSeeText('World Oasis');
    }
}
