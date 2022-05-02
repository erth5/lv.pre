<?php

namespace Tests\Unit;

use App\Models\Test;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;

class DatabaseTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * Teste, das der Entwicklungs Standard Eintrag vorhanden ist.
     *
     * @return void
     */


    /** @test  */
    public function test_db_testuser()
    {
        $defaultUser = User::find(1);
        $this->assertEquals($defaultUser->name, "Max Mustermann");
    }

    /** 
     * Teste Datenbank Schema des test Models
     * @test
     */
    public function test_debug_entry()
    {
        // Datenbank erhält nur eine 
        $defaultentry = Test::find('id', '1');
        $allentrys = Test::all();
        // Umwandlung array zu 1 Element, == zu ===
        // $this->assertEquals($dereine Eintrag, $Alle Einträge);
    }


    // 4-8 Relationships tests
}
