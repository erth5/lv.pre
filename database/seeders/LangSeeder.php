<?php

namespace Database\Seeders;

use App\Models\Example\Lang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lang::factory()->create([
            'language' => 'english',
            'abbreviation' => 'en',
            'country_code' => 'US, USA (ISO 3166-1)',
            'flag' => 'https://flagpedia.net/data/flags/w1160/us.webp'
        ]);
        Lang::factory()->create([
            'language' => 'german',
            'abbreviation' => 'de',
            'country_code' => 'DE, DEU (ISO 3166-1)',
            'flag' => 'https://flagpedia.net/data/flags/w1160/de.png'
        ]);
        // Lang::factory(1)->create();
    }
}
