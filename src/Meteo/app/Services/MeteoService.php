<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Forecast;

class MeteoService
{
    public static function forecast($latitude, $longitude)
    {
        $client = new Client();
        
        try {
            $res = $client->request('GET', 'https://api.open-meteo.com/v1/forecast',
                                            ['query' => ['latitude' => $latitude,
                                                        'longitude' => $longitude,
                                                        'current' => 'temperature_2m,wind_speed_10m']]);

            $json = json_decode($res->getBody(), true);

        } catch (\Exception $e) {
            $json = MeteoService::forecast_db($latitude, $longitude);

            if ($json == null) {
                $json = ['error' => true, 'reason' => $e->getMessage()];
            }
        }
        
        if ($json == null) {
            $json = ['error' => true, 'reason' => 'Wrong request paramters']; 
        }

        // Response:
        // {"latitude":52.52,"longitude":13.419998,"generationtime_ms":0.028967857360839844,"utc_offset_seconds":0,"timezone":"GMT","timezone_abbreviation":"GMT","elevation":38.0,"current_units":{"time":"iso8601","interval":"seconds","temperature_2m":"°C","wind_speed_10m":"km/h"},"current":{"time":"2023-11-27T20:30","interval":900,"temperature_2m":-0.2,"wind_speed_10m":14.9}}
        
        Forecast::create(['latitude' => $latitude, 'longitude' => $longitude, 'response' => json_encode($json)]);

        return $json;
    }

    public static function forecast_db($latitude, $longitude)
    {
        $forecast = Forecast::where('latitude', $latitude)->where('longitude', $longitude)->orderByDesc('created_at')->first();

        if ($forecast == null) {
            return null;
        }

        $json = json_decode($forecast->response, true);
        return $json;
    }
}