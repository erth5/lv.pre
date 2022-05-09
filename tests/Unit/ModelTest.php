<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class ModelTest extends TestCase
{
    //Access to debug true needed
    use DatabaseTransactions;

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
     * Teste, das Datenbank Schema von Image
     *
     * @return void
     */
    public function test_db_schema_image()
    {
        $this->assertTrue(
            Schema::hasColumns('images', [
                'id', 'name', 'path', 'created_at', 'updated_at'
            ]),
            1
        );
    }

    /**
     * Teste ob ein Nutzer angelegt werden kann
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
     * Teste alle Datenbanken auf existenz - intern
     *
     * @return void
     */
    public function test_db_schema_all_exist_intern()
    {
        $allDbNames = array('users', 'debugs', 'people', 'images');
        // Mit foreach wird der Index des Array automatisch entfernt
        foreach ($allDbNames as $dbScheme) {
            if (Schema::hasTable($dbScheme)) {
                $this->assertTrue(true);
            } else {
                dd("The Table Name: " . $dbScheme . " is not in the database");
                $this->assertFalse(true);
            }
        }
    }

    /**
     * Teste alle Datenbanken auf existenz - batch
     *
     * @return void
     */
    public function test_db_schema_all_exist_batch()
    {
        // https://code-boxx.com/php-read-file/
        // $allDbNames =  file("database/migrations/migration_list.txt", FILE_SKIP_EMPTY_LINES);

        $allDbNamesArray = array();
        $allDbNames = fopen("database/migrations/migration_list.txt", 'r') or die('error reading file');
        while (!feof($allDbNames)) {
            $textperline = fgets($allDbNames);
            echo ($textperline);
            array_push($allDbNamesArray, $textperline);
        }
        foreach ($allDbNamesArray as $dbScheme) {
            if (Schema::hasTable($textperline)) {
                $this->assertTrue(true);
            } else {
                $this->assertFalse(true);
            }
        }
        fclose($allDbNames);
    }

    /**
     * Teste alle Datenbanken auf existenz - folder
     *
     * @return void
     */
    public function test_db_schema_all_exist_folder()
    {
        $allDbNames = array('users', 'debugs', 'people', 'images');
        foreach ($allDbNames as $dbScheme) {
            if (Schema::hasTable($dbScheme)) {
                $this->assertTrue(true);
            } else {
                $this->assertFalse(true);
            }
        }
    }
}
