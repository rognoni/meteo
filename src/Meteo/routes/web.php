<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MeteoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/Meteo')->group(function () {

    Route::get('/', function () {
        return redirect('/Meteo/forecast');
    });

    Route::get('/forecast', [MeteoController::class, 'forecast'])->name('forecast');
    Route::post('/forecast', [MeteoController::class, 'forecastSubmit']);

});
