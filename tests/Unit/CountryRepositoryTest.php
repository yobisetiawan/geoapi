<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\CountryRepository;

class CountryRepositoryTest extends TestCase
{
    public function test_get_countries_returns_array_or_null()
    {
        $repo = new CountryRepository();
        $result = $repo->getCountries();
        $this->assertTrue(is_array($result) || is_null($result));
    }
}
