<?php

namespace Database\Seeders;

use App\Models\Debug\Debug;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Debug für Entwicklung
         * TODO: aus, wenn in Produktivbetrieb
         */
        if (env('APP_DEBUG') == true) {
            Debug::factory(1)->create([
                'debug' => true,
            ]);
        } else {
            Debug::factory(1)->create([
                'debug' => false,
            ]);
        }
    }
}
