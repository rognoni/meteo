<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
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

    /*
        ./vendor/bin/phpunit --filter test_forecast_db tests/Unit/MeteoServiceTest.php
    */
    public function test_forecast_db(): void
    {
        $res = MeteoService::forecast_db(52.52, 13.41);
        //var_dump($res);

        $this->assertArrayHasKey('current', $res);
    }
}
