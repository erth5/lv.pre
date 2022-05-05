<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Debug;
use App\Models\Person;
use Database\Seeders\DebugSeeder;
use Database\Seeders\PersonSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DatabaseTest extends TestCase
{
    /**
     * Laravel 5, SQLite
     * Speichert Zustand, Stellt Zustand nach dem Test wieder her
     * Seed Daten ???
     */
    // use DatabaseTransactions;

    /**
     * Migriert das Schema, Rollback zur Migration nach dem Test
     * Herausgefunden: Seed Daten werden gelöscht
     */
    // use DatabaseMigrations;

    /**
     * Migriert die Datnbank nur, wenn das Schema nicht aktuell ist -> Schema passt
     * Seed Daten werden vllt gelöscht
     * Abgeänerte Form in in der TestCase: führt auch ein Seeding durch
     */
    use RefreshDatabase;

    /** 
     * RefreshDatabase, aber Speichert den Zustand zwischen und erkennt, 
     * wenn nichts geändert wurde
     */
    // use LazilyRefreshDatabase;

    /** Setzt die Authentifizierung und andere Middlewares außer Kraft */
    // use WithoutMiddleware;

    /**
     * Teste, dass der Entwicklungs-Standard Eintrag vorhanden ist.
     *
     * @return void
     */
    public function test_db_default_user_name()
    {
        $this->seed(PersonSeeder::class);
        $defaultUser = User::find(1);
        $this->assertEquals("Max Mustermann", $defaultUser->name);
    }

    /**
     * Teste, dass der Entwicklungs-Standard Eintrag vorhanden ist.
     *
     * @return void
     */
    public function test_db_default_person_username()
    {
        $this->seed(PersonSeeder::class);
        $defaultUser = Person::where('username', "=", 'laraveller')->first();
        $this->assertEquals("laraveller", $defaultUser->username);
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
        $defaultentry = Debug::find(1, 'debug');
        $defaultentryValue = $defaultentry->debug;
        $this->assertEquals($defaultentryValue, true);
    }
}
