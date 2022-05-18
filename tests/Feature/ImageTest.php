<?php

namespace Tests\Feature;

use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use function PHPUnit\Framework\assertIsString;

class ImageTest extends TestCase
{
    /**
     * Proof saved Images has Database-Entrys
     *
     * @return void
     */
    public function test_saved_files_has_database_entrys()
    {
        $images = Image::all();
        foreach ($images as $image){
            assertIsString($image->getAttribute('path'));
            // TODO Get Ressource richtig machen
            // Storage::disk('uploads')->path('/');
        }
    }

    /**
     * Proof Database-Entrys linked to saved Images
     *
     * @return void
     */
    public function test_database_entrys_has_saved_files()
    {
        $ImageDirectory = "storage/app/imagess";
        foreach (glob($ImageDirectory . '/*.*') as $filePath) {
            $fileName = substr($filePath, 0);
            dd($fileName);
            // TODO Abgleichen mit Namen
        };
    }

    /**
     * Upload a Valid Image
     *
     * @return void
     */
    public function test_image_can_be_uploaded()
    {
        // Storage::fake('image');

        // $file = UploadedFile::fake()->image('image.jpg');

        // $response = $this->post('/image', [
        //     'image' => $file,
        // ]);

        // self::assertFileExists(storage_path('images' . $file->hashName()));
        // self::assertFileExists(storage_path('app\images\FLyGWRBo4rIwWpZpndJ6tLfpn5GaflYFUN9npkrO.gif'));
    }

    /**
     * Upload a InValid Image
     *
     * @return void
     */
}
