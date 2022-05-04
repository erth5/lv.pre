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
         * Variante: Seeder
         * Generierung zugehöriger User im Seeder
         * 
         * TODO schreibe name zu surname und last_name
         * */
        Person::factory()->create([
            'user_id' => User::factory(1)->create([
                'name' => 'Max Mustermann',
                'email' => 'fdsdwp@protonmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => token_name(10),
            ])->first(),
            'surname' => "Max",
            'last_name' => "Mustermann",
            'username' => "laraveller",
        ]);

        // Fehleintrag-wird richtigerweiße nicht Verknüpft
        User::factory(3)->create();
        // 20 Beispieleinträge
        User::factory(10)->create()->each(function ($user) {
            // je ein Person referenz
            $person = Person::factory()->make();
            $user->person()->save($person);
        });

        /**
         * Debug für Entwicklung
         * TODO: aus, wenn in Produktivbetrieb
         */
        Debug::factory(1)->create([
            'debug' => true,
        ]);
    }
}
