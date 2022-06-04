<?php

namespace Tests\Feature;

use App\Models\Image;
use DirectoryIterator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFileExists;
use function PHPUnit\Framework\assertTrue;

class ImageTest extends TestCase
{
    /**
     * proof existence of image folder
     *
     * @return void
     */
    public function test_gives_it_a_image_folder()
    {
        assertTrue(is_dir(storage_path('app\public\images')));
    }

    /**
     * Proof saved Images has Database-Entrys
     *
     * @return void
     */
    public function test_saved_files_has_database_entrys()
    {
        $path = storage_path('app\public\images/');
        foreach (new DirectoryIterator($path) as $file) {
            if ($file->isDot()) continue;
            $fileName = $file->getFilename();
            assertEquals($fileName, Image::where('name', $fileName)->get()->first()->name);
        }
        assertTrue(true);
    }

    /**
     * Proof Database-Entrys linked to saved Images
     *
     * @return void
     */
    public function test_database_entrys_has_saved_files()
    {
        $images = Image::all();
        if (count($images) == 0)
            assertTrue(true);
        else {
            foreach ($images as $image) {
                $DbImageName = ($image->getAttribute('name'));
                assertFileExists(storage_path('app\public\images/' . $DbImageName));
            }
        }
    }
}
