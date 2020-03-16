<?php

namespace Tests\Feature;

use App\Department;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    /**
     * Department test
     *
     * @return void
     */
    public function testGetDepartmentIndexRouteShowReturnOkStatus()
    {
        $response = $this->get('/departments');
        $response->assertStatus(200);
    }

    /**
     * Department test
     *
     * @return void
     */
    public function testGetDepartmentCreateRouteShowReturnOkStatus()
    {
        $response = $this->get('/departments/create');
        $response->assertStatus(200);
    }

    /**
     * Department test
     *
     * @return void
     */
    public function testGetDepartmentShowRouteShowReturnOkStatus()
    {
        $department = Department::first();
        $response = $this->get("/departments/$department->id");
        $response->assertStatus(200);
    }

    /**
     * Department test
     *
     * @return void
     */
    public function testGetDepartmentEditRouteShowReturnOkStatus()
    {
        $department = Department::first();
        $response = $this->get("/departments/$department->id/edit");
        $response->assertStatus(200);
    }
}
