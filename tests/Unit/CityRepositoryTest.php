<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\CityRepository;

class CityRepositoryTest extends TestCase
{
    public function test_get_cities_returns_array_or_null()
    {
        $repo = new CityRepository();
        $result = $repo->getCities('USA');
        $this->assertTrue(is_array($result) || is_null($result));
    }

    public function test_get_cities_with_invalid_iso3_returns_null()
    {
        $repo = new CityRepository();
        $result = $repo->getCities('INVALID');
        $this->assertNull($result);
    }
}
