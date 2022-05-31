<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Debug;
use App\Models\Person;
use Database\Seeders\PersonSeeder;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DatabaseTest extends TestCase
{
    /** Migriert vor dem Test, Entfernt alles nach dem Test */
    // use DatabaseMigrations;

    /** Migriert vor und nach dem Test */
    // use RefreshDatabase;

    /** fuer SQLite, Speichert den Zustand zwischen und stellt ihn wieder her */
    use DatabaseTransactions;

    /** Setzt die Authentifizierung und andere Middlewares außer Kraft */
    // use WithoutMiddleware;


    /**
     * Teste, dass der Entwicklungs-Standard Eintrag vorhanden ist.
     *
     * @return void
     */
    public function test_db_default_user_name()
    {
        $this->seed('PersonSeeder');
        // Funktionsfähig
        $defaultUser = User::where('name', "=", 'Max Mustermann')->first();

        // Nicht funktionsfähig
        // $defaultUser = User::findOrFail(1)->first();

        $this->assertEquals('Max Mustermann', $defaultUser->name);
    }


    /**
     * Teste, dass der Entwicklungs-Standard Eintrag vorhanden ist.
     *
     * @return void
     */
    public function test_db_default_person_username()
    {
        $this->seed(PersonSeeder::class);
        $defaultPerson = Person::where('username', "=", 'laraveller')->first();
        $this->assertEquals("laraveller", $defaultPerson->username);
    }


    /**
     * Teste, dass der Entwicklungs-Standard Eintrag vorhanden ist.
     *
     * @return void
     */
    public function test_db_default_person_last_name()
    {
        $this->seed(PersonSeeder::class);
        $this->assertDatabaseHas('people', [
            'last_name' => 'Mustermann',
        ]);
    }


    /**
     * Teste ob ein Nutzer angelegt werden kann
     * Testet nicht auf Basis von softDeletes
     *
     * @return void
     */


    public function test_db_can_create_and_delete_user()
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
        $user->forceDelete();
        $this->assertModelMissing($user);
    }


    /**
     * Prüft, ob genau ein Eintrag in der Debug DB vorhanden ist.
     *
     * @return void
     */
    public function test_db_debug_has_one_entry()
    {
        $this->assertDatabaseCount('debugs', 1);
    }


    /**
     * Prüft, ob der Eintrag in der Debug DB wahr ist
     *
     * @return void
     */
    public function test_debug_entry_is_true()
    {
        $defaultentry = Debug::findOrFail(1, 'debug');
        $defaultentryValue = $defaultentry->debug;
        $this->assertEquals($defaultentryValue, true);
    }
}
