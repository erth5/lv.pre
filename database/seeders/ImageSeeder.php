<?php

namespace Database\Seeders;

use App\Models\Example\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Queue\Failed\NullFailedJobProvider;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Demo User
        Image::factory()->create([
            'name' => 'Ressource_Image_Routes',
            'path' => 'images/Ressource_Image_Routes',
            'person_id' => 1,
            'user_id' => 1,
            'upload_time' => null,
            'update:time' => null,
            'remove_time' => null,
        ]);
    }
}
