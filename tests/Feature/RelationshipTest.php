<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Example\Person;
use Database\Seeders\PersonSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test One to One Relationship User to Person
     * Prüfung mit Variante Factory (Beispiel)
     * @return void
     */
    public function test_user_has_a_person()
    {
        if (DB::table('people')->count() == 0 && DB::table('users')->count() == 0)
            $this->seed(PersonSeeder::class);
        // dd(User::where('name', 'Max Mustermann')->firstOrFail()->person);
        $this->assertEquals("laraveller", User::where('name', 'Max Mustermann')->firstOrFail()->person->username);
    }

    /**
     * Test One to One Relationship User to Person
     * Prüfung mit Variante Factory (Beispiel)
     * @return void
     */
    public function test_person_belongs_to_user()
    {
        if (DB::table('people')->count() == 0 && DB::table('users')->count() == 0)
            $this->seed(PersonSeeder::class);
        // dd(Person::where('username', 'laraveller')->firstOrFail()->person);
        // dd(Person::where('username', 'laraveller')->firstOrFail());
        $this->assertEquals("Max Mustermann", Person::where('username', 'laraveller')->firstOrFail()->user->name);
    }
}
