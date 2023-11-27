<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MeteoService;

class MeteoController extends Controller
{
    public function home(Request $request) {


        return view('home');
    }

    public function forecast(Request $request) {
        $request->validate([
            'latitude' => 'required|max:100',
            'longitude' => 'required|max:100',
        ]);

        $res = MeteoService::forecast(
                    $request->input('latitude'), $request->input('longitude'));

        return view('home', compact('res'));
    }
}
