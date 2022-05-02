<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Test;
use App\Models\User;
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

        User::create([
            'name' => 'Max Mustermann',
            'email' => 'fdsdwp@protonmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => token_name(10),
        ]);
        User::factory(10)->create();

        Person::create([
            'surname' => "Max",
            'last_name' => "Mustermann",
            'username' => "laraveller",
            // 'cose_name' => "Maximus"
        ]);
        Person::factory(10)->create();

        Test::factory(1)->create([
            'test' => true,
        ]);
    }
}
