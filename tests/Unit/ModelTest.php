<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Test;
use App\Models\User;

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
    //     $this->assertTrue(
    //         Schema::hasColumns('users', [
    //             'id', 'name', 'email', 'email_verified_at', 'password'
    //         ]),
    //         1
    //     );
    }

    /**
     * Teste, das die Testseiten aktiv sind
     *
     * @return void
     */
    public function test_db_schema_debug()
    {
        $testSeiten = Test::find(1);
        $this->assertEquals($testSeiten->test, true);
    }
    //         Schreibweiße von "factory" in Laravel 9
    //         $mresp = Model::factory(Test::class)->create();

        /**
     * Teste, das die Testseiten aktiv sind
     *
     * @return void
     */
    public function test_db_schema_relation(){

    }
}
