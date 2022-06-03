<?php

namespace Tests\Feature;

use App\Models\Debug;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DebugTest extends TestCase
{
    /**
     * TODO: Umändern in "Wenn Debug Anzeige, ansonsten keine Anzeige"
     */
    // /**
    //  * Prüft, ob genau ein Eintrag in der Debug DB vorhanden ist.
    //  *
    //  * @return void
    //  */
    // public function test_db_debug_has_one_entry()
    // {
    //     $this->assertDatabaseCount('debugs', 1);
    // }


    // /**
    //  * Prüft, ob der Eintrag in der Debug DB wahr ist
    //  *
    //  * @return void
    //  */
    // public function test_debug_entry_is_true()
    // {
    //     $defaultentry = Debug::findOrFail(1, 'debug');
    //     $defaultentryValue = $defaultentry->debug;
    //     $this->assertEquals($defaultentryValue, true);
    // }
}
