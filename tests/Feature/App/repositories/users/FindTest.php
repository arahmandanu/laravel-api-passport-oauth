<?php

namespace Tests\App\Repositories\Users;

use Tests\TestCase;

class FindTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api/v1/user');
        $response->assertStatus(200);
    }
}
