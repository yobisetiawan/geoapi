<?php

namespace Tests\Feature;

use Tests\TestCase;

class CountryControllerTest extends TestCase
{
    public function test_country_index_returns_success_and_data()
    {
        $response = $this->getJson('/api/v1/list-countries');
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'status',
                     'data'
                 ]);
    }

    public function test_country_index_returns_error_if_no_data()
    {
        // Mock CountryRepository to return null
        $mock = \Mockery::mock('App\\Repositories\\CountryRepository');
        $mock->shouldReceive('getCountries')->andReturn(null);
        $this->app->instance('App\\Repositories\\CountryRepository', $mock);

        $response = $this->getJson('/api/v1/list-countries');
        $response->assertStatus(404)
                 ->assertJson([
                     'status' => 'error',
                 ]);
    }
}
