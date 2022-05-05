<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Debug;
use App\Models\Person;
use Carbon\Factory;
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
        Debug::factory(1)->create([
            'debug' => true,
        ]);
    }
}
