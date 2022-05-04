<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Debug;
use App\Models\Person;
use Database\Seeders\DebugSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DatabaseTest extends TestCase
{
    /**
     * Laravel 5
     */
    // use DatabaseTransactions;
    // use DatabaseMigrations;

    /**
     * Migriert die Datnbank nicht, wenn das Schema aktuell ist (Daten bleiben erhalten?)
     * Führt eine Transaction -> stellt den Stand vor dem Test wieder her
     */
    // use RefreshDatabase;

    /** RefreshDatabase, aber Speichert den Zustand zwischen und erkennt, wenn nichts geändert wurde */
    // use LazilyRefreshDatabase;

    /**
     * Führt die Migration einmal aus und setzt diesen Zustand für jeden Test zurück */
    // use RefreshDatabase;

    /** Setzt die Authentifizierung und andere Middlewares außer Kraft */
    // use WithoutMiddleware;

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
        $defaultUser = User::find(1);
        $this->assertEquals($defaultUser->name, "Max Mustermann");
    }

    /**
     * Teste, dass der Entwicklungs-Standard Eintrag vorhanden ist.
     *
     * @return void
     */
    public function test_db_default_person()
    {
        $defaultUser = Person::find(1);
        // $defaultUser = Person::whereIn('id', 1);
        $defaultUser_name = $defaultUser->username;
        $this->assertEquals("laraveller", $defaultUser_name);
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
        // Umwandlung array zu 1 Element, == zu ===
        $defaultentryValue = $defaultentry->debug;
        $this->assertEquals($defaultentryValue, true);
    }
}
