<?php

namespace Tests\Feature;

use App\Models\Person;
use App\Models\User;
use Database\Seeders\PersonSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RelationshipTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test One to One Relationship User to Person
     * Prüfung mit Variante Factory (Beispiel)
     * @return void
     */
    public function test_has_a_person()
    {
        $this->seed(PersonSeeder::class);
        $this->assertEquals("laraveller", User::findOrFail(1)->first()->person->username);
    }

    /**
     * Test One to One Relationship User to Person
     * Prüfung mit Variante Factory (Beispiel)
     * @return void
     */
    public function test_relationship_belongs_to()
    {
        $this->seed(PersonSeeder::class);
        // $defUser = Person::findOrFail(1);
        // $this->assertEquals('Max Mustermann', $defUser->user->name);
        $this->assertEquals('Max Mustermann', Person::find(1)->user->name);
    }
}
