<?php

namespace Tests\Feature;

use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    public function testRedirect(){
        $this->get('/redirect/from')
        ->assertRedirect('/redirect/to');
    }
}
