<?php

namespace Tests\Unit;

use App\Http\Controllers\TestController;
use App\Http\Services\DebugService;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    // /**
    //  * A basic unit test for controller.
    //  *
    //  * @return void
    //  */

    // public function test_controller()
    // {
    //     $cresp = new TestController;
    //     // $this->assertEquals();
    // }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_debug_service_exist()
    {
        $sresp = new DebugService;
        $this->assertEquals(false, $sresp->debugFunction(false));
    }
}
