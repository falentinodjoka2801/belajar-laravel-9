<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function testCreateSession(){
        $this->get('/session/create')
        ->assertSeeText('ok')
        ->assertSessionHas('userId', '0asistin0')
        ->assertSessionHas('isMember', true);
    }
    public function testGetSession(){
        $this->withSession([
            'userId'    =>  'tinooasis',
            'isMember'  =>  'true'
        ])->get('/session/get')
        ->assertSeeText('User Id : tinooasis, Is Member : true');
    }
    public function testGetSessionFailed(){
        $this->get('/session/get')
        ->assertSeeText('User Id : guest, Is Member : false');
    }
}
