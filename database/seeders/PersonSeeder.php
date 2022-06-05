<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Example\Person;
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
        // Default Demo User
        Person::factory()->create([
            'user_id' => User::factory()->create([
                'name' => 'Max Mustermann',
                'email' => 'fdsdwp@protonmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => token_name(10)
            ])->first(),
            'surname' => 'Max',
            'last_name' => 'Mustermann',
            'username' => 'laraveller'
        ]);

        /**
         * Variante: Factory
         * Generierung von Person zugehöriger User in der Factory
         */
        // Beispiel Einträge ohne Person
        User::factory(3)->create();
        // Beispieleinträge
        Person::factory(10)->create();

        /**
         * Variante: Seeder
         * Generierung zugehöriger User im Seeder
         * 
         * TODO schreibe name zu surname und last_name
         * */
        // // Beispiel Einträge ohne Person
        // User::factory(3)->create();
        // // Beispieleinträge
        // User::factory(10)->create()->each(function ($user) {
        //     // je ein Person referenz
        //     $person = Person::factory()->make();
        //     $user->person()->save($person);
        // });

    }
}
