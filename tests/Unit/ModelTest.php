<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Test;
use App\Models\User;
use Database\Factories\TestFactory;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\runDatabaseMigrations;

class ModelTest extends TestCase
{
    // drop and migrating database,  Faker instance for a given locale
    // use RefreshDatabase, DatabaseMigrations, WithFaker;

    /**
     * Teste, das der Entwicklungs Standard Eintrag vorhanden ist.
     *
     * @return void
     */

    public function test_db_user()
    {
        $defaultUser = User::find(1);
        $this->assertEquals($defaultUser->name, "Max Mustermann");
    }

    /**
     * Teste, das die Testseiten aktiv sind
     *
     * @return void
     */
    public function test_db_test()
    {
        $testSeiten = Test::find(1);
        $this->assertEquals($testSeiten->test, true);
    }
    //         Schreibweiße von "factory" in Laravel 9
    //         $mresp = Model::factory(Test::class)->create();
}
