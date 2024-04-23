<?php

namespace Tests\Feature;

use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    public function testCreateCookie(){
        $this->get('/cookie/set')
            ->assertSeeText('Hello Cookie')
            ->assertCookie('user-id', 'falentino-djoka')
            ->assertCookie('is-member', 'true');
    }
    public function testGetCookie(){
        $this->withCookie('user-id', 'falentino-djoka')
        ->withCookie('is-member', 'true')
        ->get('/cookie/get')
        ->assertJson([
            'user-id'   =>  'FALENTINO-DJOKA',
            'is-member' =>  'true'
        ]);
    }
}
