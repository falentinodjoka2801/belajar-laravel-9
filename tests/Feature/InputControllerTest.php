<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase{
    public function testInput(){
        $this->get('/input/hello?name=Tino')
        ->assertSeeText('Hello Tino');

        $this->post('/input/hello', ['name' => 'Oasis Tino'])
        ->assertSeeText('Hello Oasis Tino');
    }
    public function testNestedInput(){
        $this->post('/input/hello/first', ['name' => ['first' => 'Tino', 'last' => 'Oasis']])
        ->assertSeeText('Hello Tino Oasis');

        $this->post('/input/hello/first', ['name' => ['first' => 'Oasis']])
        ->assertSeeText('Hello Oasis LastName');
    }
}
