<?php

namespace Tests\Feature;

use App\Models\Person;
use App\Models\User;
use Database\Seeders\PersonSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RelationshipTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test One to One Relationship User to Person
     * Prüfung mit Variante Factory (Beispiel)
     * @return void
     */
    public function test_has_a_person()
    {
        $this->seed(PersonSeeder::class);
        // Mit transaction nicht mehr möglich
        // $this->assertEquals("laraveller", User::findOrFail(1)->first()->person->username);
        $this->assertEquals("laraveller", User::where('name', '=', 'Max Mustermann')->first()->person->username);
    }

    /**
     * Test One to One Relationship User to Person
     * Prüfung mit Variante Factory (Beispiel)
     * @return void
     */
    public function test_relationship_belongs_to()
    {
        $this->seed(PersonSeeder::class);
        // Mit transaction nicht mehr möglich
        // $this->assertEquals('Max Mustermann', Person::findOrFail(1)->user->name);
        $this->assertEquals("Max Mustermann", Person::where('username', '=', 'laraveller')->first()->user->name);
    }
}
