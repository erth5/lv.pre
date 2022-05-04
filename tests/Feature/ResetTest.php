<?php

namespace Tests\Feature;

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

    public function test_fill_debug_data()
    {
        $this->seed();
        $defaultUser = User::find(1);
        $this->assertEquals($defaultUser->name, "Max Mustermann");
    }
}
