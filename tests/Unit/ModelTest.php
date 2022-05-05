<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;

class ModelTest extends TestCase
{
    use DatabaseMigrations;

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
     * Teste, das Datenbank Schema von Debug
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
     * Teste, das Datenbank Schema von Person
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
    /**
     * Teste Standard Datenbank Tabellen aud Existenz
     *
     * @return void
     */

    public function test_db_can_create_and_delete_user()
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
        $user->delete();
        $this->assertModelMissing($user);
    }

    /**
     * Teste alle Datenbanken auf id
     *
     * @return void
     */
    public function test_db_schema_all_exist()
    {
        $allDbNames = array('users', 'debugs', 'people');
        // Mit foreach wird der Index des Array automatisch entfernt
        foreach ($allDbNames as $dbScheme) {
            if (Schema::hasTable($dbScheme)) {
                $this->assertTrue(true);
            } else {
                $this->assertFalse(true);
            }
        }
    }
}
