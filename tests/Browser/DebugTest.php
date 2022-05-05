<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class DebugTest extends DuskTestCase
{

    /**
     * Verwendung möglich
     * use DatabaseMigrations;
     */

    /**
     * Test Navigation durch die Debug Seiten
     *
     * @return void
     */
    public function testDebugTelescope()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/telescope/requests')
                // Prüft, ob im Body Element das Schlüsselwort "Telescope" steht
                ->assertSee('Telescope')
                ->assertPathIs('/telescope/requests');
        });
    }

    public function testDump_and_Debug()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/debug/views')
                ->assertSee('array');
        });
    }

    public function testRidirect()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Telescope');
        });
    }
}
