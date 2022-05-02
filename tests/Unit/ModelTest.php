<?php

namespace Tests\Unit;

use App\Models\Debug;
use Tests\TestCase;
use App\Models\Test;
use Illuminate\Support\Facades\Schema;

class ModelTest extends TestCase
{
    // drop and migrating database,  Faker instance for a given locale
    // use RefreshDatabase, DatabaseMigrations, WithFaker;

    /**
     * Teste Standard Datenbank Schema
     *
     * @return void
     */

    public function test_db_schema_user()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id', 'name', 'email', 'email_verified_at', 'password'
            ]),
            1
        );
    }

    /**
     * Teste, das die Testseiten aktiv sind
     *
     * @return void
     */
    //Schreibweiße von "factory" in Laravel 9
    //$mresp = Model::factory(Test::class)->create();
    public function test_db_schema_debug()
    {
        $debugSeiten = Debug::find(1);
        $this->assertEquals($debugSeiten->debug, true);
    }

    /**
     * Teste, das die Testseiten aktiv sind
     *
     * @return void
     */
    public function test_db_schema_people()
    {
        $this->assertTrue(
            Schema::hasColumns('people', [
                'id', 'surname', 'last_name', 'username'
            ]),
            1
        );
    }
}
