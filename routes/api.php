<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegionController;
use App\Http\Controllers\API\VestigeController;
use App\Http\Controllers\API\IrrigationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {

    //Regions
    Route::prefix('regions')->group(function () {

        Route::get('/', [RegionController::class, 'index']);
        Route::get('/{id}', [RegionController::class, 'show']);
        Route::get('/search/{search}', [RegionController::class, 'search']);

    });

    //Regions
    Route::prefix('irrigations')->group(function () {

        Route::get('/', [IrrigationController::class, 'index']);
        Route::get('/{id}', [IrrigationController::class, 'show']);
        Route::get('/search/{search}', [IrrigationController::class, 'search']);

    });

    //Regions
    Route::prefix('vestiges')->group(function () {

        Route::get('/', [VestigeController::class, 'index']);
        Route::get('/{id}', [VestigeController::class, 'show']);
        Route::get('/search/{search}', [VestigeController::class, 'search']);

    });

});
