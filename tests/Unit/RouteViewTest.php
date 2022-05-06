<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RouteViewTest extends TestCase
{
    //Access to debug true needed
    use DatabaseMigrations;

    /**
     * A basic unit test for debug.
     *
     * @return void
     */
    public function test_routing_debug()
    {
        $pathResponse = $this->get('/debug');
        $pathResponse->assertStatus(200);
    }

    public function test_view_db()
    {
        $viewDb = $this->get('/test/db');
        $viewDb->assertStatus(200);
        $viewDb->assertSee('Successfully connected to the database');
    }
    public function test_view_telescope_need_DUSK()
    {
        $viewTelescope = $this->get('/telescope');
        $viewTelescope->assertSee('Not Found');
        $viewTelescope->assertStatus(404);
    }
    public function test_view_users_and_peoples_table()
    {
        $viewUser = $this->get('/debug/user');
        $viewUser->assertStatus(200);
        // AssertEuqals(Person surname = User surname);
    }

}

