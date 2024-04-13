<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Support\Facades\Storage;

use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testStorage(){
        $fileSystem     =   Storage::disk('local');
        $fileSystem->put('file.txt', "Oasis - Stand by Me");
        
        $content    =   $fileSystem->get('file.txt');
        self::assertEquals('Oasis - Stand by Me', $content);
    }
    public function testPublic(){
        $fileContent    =   'Oasis - Stand by Me';

        $fileSystem     =   Storage::disk('public');
        $fileSystem->put('file.txt', $fileContent);
        
        $content    =   $fileSystem->get('file.txt');
        self::assertEquals($content, $fileContent);
    }
}
