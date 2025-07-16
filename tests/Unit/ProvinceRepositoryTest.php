<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\ProvinceRepository;

class ProvinceRepositoryTest extends TestCase
{
    public function test_get_provinces_returns_array_or_null()
    {
        $repo = new ProvinceRepository();
        $result = $repo->getProvinces('USA');
        $this->assertTrue(is_array($result) || is_null($result));
    }

    public function test_get_provinces_with_invalid_iso3_returns_null()
    {
        $repo = new ProvinceRepository();
        $result = $repo->getProvinces('INVALID');
        $this->assertNull($result);
    }
}
