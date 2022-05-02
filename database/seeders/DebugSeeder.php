<?php

namespace Database\Seeders;

use App\Models\Debug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Funktionstest Schreibweiße
        Debug::factory(1)->create();
    }
}
