<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Debug;
use Illuminate\Support\Facades\Schema;

use function Psy\debug;

class ModelTest extends TestCase
{
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
        $this->assertTrue(
            Schema::hasColumns('debugs', [
                'id', 'debug'
            ]),
            1
        );
    }

    /**
     * Teste, das die Testseiten aktiv sind
     *
     * @return void
     */
    public function test_db_schema_people()
    {
        /**
         * Im Unit test nicht funktionsfähig
         * $this->seed(Debug::class);
         */

        $this->assertTrue(
            Schema::hasColumns('people', [
                'id', 'user_id', 'surname', 'last_name', 'username'
            ]),
            1
        );
    }
}
