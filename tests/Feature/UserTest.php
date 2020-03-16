<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * User test
     *
     * @return void
     */
    public function testGetUserIndexRouteShowReturnOkStatus()
    {
        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    /**
     * User test
     *
     * @return void
     */
    public function testGetUserCreateRouteShowReturnOkStatus()
    {
        $response = $this->get('/users/create');
        $response->assertStatus(200);
    }

    /**
     * User test
     *
     * @return void
     */
    public function testGetUserShowRouteShowReturnOkStatus()
    {
        $user = User::first();
        $response = $this->get("/users/$user->id");
        $response->assertStatus(200);
    }

    /**
     * User test
     *
     * @return void
     */
    public function testGetUserEditRouteShowReturnOkStatus()
    {
        $user = User::first();
        $response = $this->get("/users/$user->id/edit");
        $response->assertStatus(200);
    }
}
