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

    //  use DatabaseMigrations;

    public function test_migrations()
    {
        /**
         * TODO: Seed Database
         */
        $this->seed();
        $defaultentry = Debug::findOrFail(1, 'debug');
        $defaultentryValue = $defaultentry->debug;
        $this->assertEquals($defaultentryValue, true);
    }
}
