<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Person;
use Database\Seeders\PersonSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RelationshipTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test One to One Relationship Person to User
     *
     * @return void
     */
    public function test_belongs_to_User()
    {
        /**
         * Prüfung mit Variante Seeding ()
         */
        // $user = User::factory()->create();
        // $person = Person::factory->create();
        // $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->people); 

        /**
         * Prüfung mit Variante Factory (Beispiel)
         */
        // $this->seed(PersonSeeder::class);
        // $defaultUser = Person::where('username',"=", 'laraveller')->first();
        // $this->assertEquals("Max Mustermann", $defaultUser->User()->name);
    }

    /**
     * Test One to One Relationship User to Person
     *
     * @return void
     */
    public function test_has_a_person()
    {
        /**
         * Prüfung mit Variante Seeding ()
         */
        // $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $person->users);

        /**
         * Prüfung mit Variante Factory (Beispiel)
         * Property wird nicht erkannt, gleiches Beispiel,
         * wie in "test_db_default_user" -> völlig unlogisch
         */
        // $this->seed(PersonSeeder::class);
        // $defaultUser = User::find(1);
        // $this->assertEquals("Max Mustermann", $defaultUser->name);
    }
}
