<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Variante: Factory
         * Generierung von Person zugehöriger User in der Factory
         */

        Person::factory()->create([
            'user_id' => User::factory()->create([
                'name' => 'Max Mustermann',
                'email' => 'fdsdwp@protonmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => token_name(10),
            ])->first(),
            'surname' => 'Max',
            'last_name' => 'Mustermann',
            'username' => 'laraveller',
        ]);

        User::factory(3)->create();
        Person::factory(10)->create();
    }
}
