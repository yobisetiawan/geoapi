<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProvinceControllerTest extends TestCase
{
    public function test_province_index_returns_success_and_data()
    {
        $response = $this->getJson('/api/v1/list-provinces?iso3=USA');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'data'
                 ]);
    }

    public function test_province_index_returns_error_if_no_iso3()
    {
        $response = $this->getJson('/api/v1/list-provinces');
        $response->assertStatus(400)
                 ->assertJson([
                     'status' => 'error',
                 ]);
    }

    public function test_province_index_returns_error_if_no_data()
    {
        $response = $this->getJson('/api/v1/list-provinces?iso3=INVALID');
        $response->assertStatus(404)
                 ->assertJson([
                     'status' => 'error',
                 ]);
    }
}
