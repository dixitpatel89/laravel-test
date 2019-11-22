<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testPositiveTest()
    {
        $response = $this->get('/user/1');
        $response->assertStatus(200);
    }

    public function testNagativeTest()
    {
        $response = $this->get('/user/2');
        $response->assertStatus(404);
    }

    public function testNonNumericTest()
    {
        $response = $this->get('/user/abc');
        $response->assertStatus(422);
    }
}
