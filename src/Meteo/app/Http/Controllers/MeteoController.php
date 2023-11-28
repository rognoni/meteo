<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MeteoService;

class MeteoController extends Controller
{
    public function forecast(Request $request) {
        $latitude = '';
        $longitude = '';

        return view('forecast', compact('latitude', 'longitude'));
    }

    public function forecastSubmit(Request $request) {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $res = MeteoService::forecast($latitude, $longitude);

        return view('forecast', compact('res', 'latitude', 'longitude'));
    }
}
