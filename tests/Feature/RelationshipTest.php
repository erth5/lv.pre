<?php

namespace Tests\Feature;

use App\Models\Example\Person;
use App\Models\User;
use Database\Seeders\PersonSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RelationshipTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test One to One Relationship User to Person
     * Prüfung mit Variante Factory (Beispiel)
     * @return void
     */
    public function test_ONLYDEBUG_user_has_a_person()
    {
        $this->seed(PersonSeeder::class);
        // dd(User::where('name', 'Max Mustermann')->firstOrFail()->person);
        $this->assertEquals("laraveller", User::where('name', 'Max Mustermann')->firstOrFail()->person->username);
    }

    /**
     * Test One to One Relationship User to Person
     * Prüfung mit Variante Factory (Beispiel)
     * @return void
     */
    public function test_ONLYDEBUG_person_belongs_to_user()
    {
        $this->seed(PersonSeeder::class);
        // dd(Person::where('username', 'laraveller')->firstOrFail()->person);
        $this->assertEquals("Max Mustermann", Person::where('username', 'laraveller')->firstOrFail()->user->name);
    }
}
