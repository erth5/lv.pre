<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase, WithFaker;

    /** @test  */
    public function test_user_default_schema()
    {

        
    //     $this->assertTrue(
    //         Schema::hasColumns('users', [
    //             'id', 'name', 'email', 'email_verified_at', 'password'
    //         ]),
    //         1
    //     );
    }

    public function test_default_user_entry()
    {
        // $defaultUser = User::find('id', '1');
        $allusers = User::all();
        dd($allusers);
        // $this->assertEquals(1, $allusers);
    }
}
