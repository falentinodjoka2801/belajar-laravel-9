<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;

use Tests\TestCase;

class FileControllerTest extends TestCase{
    public function testUpload(){
        $picture    =   UploadedFile::fake()->image('tino.png');

        $this->post('/file/upload', [
            'picture' => $picture
        ])->assertSeeText('OK tino.png');
    }
}
