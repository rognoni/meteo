<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\MeteoService;

/*
    php artisan make:test MeteoServiceTest --unit
*/
class MeteoServiceTest extends TestCase
{

    /*
        ./vendor/bin/phpunit --filter test_forecast tests/Unit/MeteoServiceTest.php
    */
    public function test_forecast(): void
    {
        $res = MeteoService::forecast(52.52, 13.41);
        //var_dump($res);

        $this->assertArrayHasKey('current', $res);
    }
}
