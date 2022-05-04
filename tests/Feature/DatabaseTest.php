<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Debug;
use App\Models\Person;
use Database\Seeders\DebugSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Teste, dass der Entwicklungs-Standard Eintrag vorhanden ist.
     *
     * @return void
     */
    public function test_db_default_user()
    {
        $this->seed();

        $defaultUser = User::find('1');
        $this->assertEquals($defaultUser->name, "Max Mustermann");
    }

    public function test_db_default_person()
    {
        $this->seed();
        $defaultUser = Person::find(1);
        $this->assertEquals($defaultUser->username, "laraveller");
    }

    /**
     * Prüft, ob genau ein Eintrag in der Debug DB vorhanden ist.
     *
     * @return void
     */
    public function test_db_debug_has_one_entry()
    {
        $this->seed();
        $this->assertDatabaseCount('debugs', 1);
    }


    /**
     * Prüft, ob der Eintrag in der Debug DB wahr ist
     *
     * @return void
     */
    public function test_debug_entry_is_true()
    {
        $this->seed(DebugSeeder::class);
        $defaultentry = Debug::find(1, 'debug');
        // Umwandlung array zu 1 Element, == zu ===
        $defaultentryValue = $defaultentry->debug;
        $this->assertEquals($defaultentryValue, true);
    }


    // 4-8 Relationships tests
}
