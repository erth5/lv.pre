<?php

namespace Database\Seeders\Debug;

use App\Models\Debug\Debug;
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
        /**
         * Debug für Entwicklung
         * TODO: aus, wenn in Produktivbetrieb
         */
        Debug::factory(1)->create([
            'debug' => true,
        ]);
    }
}
