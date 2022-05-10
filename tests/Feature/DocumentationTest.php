<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DocumentationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * TODO:
     * Integrate Swagger
     * Set correct URL
     * activate test
     * 
     * @return void
     */
    public function test_swagger_integration_response()
    {
        $swagger = $this->get('/api/documentation');
        // $swagger->assertStatus(200);
    }
}
