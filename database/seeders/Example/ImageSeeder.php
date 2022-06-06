<?php

namespace Database\Seeders\Example;

use App\Models\Example\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::factory()->create([
            'name' => 'example',
            'path' => 'example_path',
        ]);
    }
}