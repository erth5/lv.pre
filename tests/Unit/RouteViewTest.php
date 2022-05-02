<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteViewTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_routing()
    {
        $response = $this->get('/debug');
        $response->assertStatus(200);
    }

    public function test_view_db()
    {
        $view = $this->get('/test/db');
        $view->assertSee('Successfully connected to the database');
    }
    public function test_view_telescope()
    {
        $view = $this->get('/telescope');
        $view->assertStatus(404);
        // $view->assertSee('Telescope - pre');
    }
    public function test_view_users_and_peoples_table()
    {
        $view = $this->get('/test/user');
        $view->assertSee('Successfully connected to the database');
    }

}

