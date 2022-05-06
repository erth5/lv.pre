<?php

namespace Tests\Feature;

use App\Models\Debug;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResetTest extends TestCase
{
    /**
     * Reset DB Test
     *
     * @return void
     */

     use DatabaseMigrations;

    public function test_migrations()
    {
        /**
         * DatabaseMigrations erzielt hier keine Änderung,
         * TestDaten bleiben jedoch nach den Tests erhalten
         * Das hier Testdaten vorhanden sind ist völlig unlogisch
         */
        $defaultentry = Debug::findOrFail(1, 'debug');
        $defaultentryValue = $defaultentry->debug;
        $this->assertEquals($defaultentryValue, true);
    }
}
