<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;

class ImageUploadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_image_can_be_uploaded()
    {
        Storage::fake('image');

        $file = UploadedFile::fake()->image('image.jpg');

        $response = $this->post('/image', [
            'image' => $file,
        ]);

        // self::assertFileExists(storage_path('images' . $file->hashName()));
        self::assertFileExists(storage_path('app\images\FLyGWRBo4rIwWpZpndJ6tLfpn5GaflYFUN9npkrO.gif'));
    }
}
