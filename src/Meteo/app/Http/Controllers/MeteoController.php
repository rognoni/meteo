<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MeteoService;

class MeteoController extends Controller
{
    public function home(Request $request) {
        $latitude = '';
        $longitude = '';

        return view('home', compact('latitude', 'longitude'));
    }

    public function forecast(Request $request) {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $res = MeteoService::forecast($latitude, $longitude);

        return view('home', compact('res', 'latitude', 'longitude'));
    }
}
