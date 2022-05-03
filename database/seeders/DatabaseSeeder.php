<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Debug;
use App\Models\Person;
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

        /** Variante 1 */


        /** Variante 2 */
        // User::create([
        //     'name' => 'Max Mustermann',
        //     'email' => 'fdsdwp@protonmail.com',
        //     'password' => bcrypt('password'),
        //     'email_verified_at' => now(),
        //     'remember_token' => token_name(10),
        // ]);
        // User::factory(10)->create();

        // Person::create([
        //     'id' => User::factory(1)->create([
        //         'name' => 'Max Mustermann',
        //         'email' => 'fdsdwp@protonmail.com',
        //         'password' => bcrypt('password'),
        //         'email_verified_at' => now(),
        //         'remember_token' => token_name(10),
        //     ])->first(),
        //     'surname' => "Max",
        //     'last_name' => "Mustermann",
        //     'username' => "laraveller",
        // ]);
        Person::factory(10)->create();

        Debug::factory(1)->create([
            'debug' => true,
        ]);
    }
}
