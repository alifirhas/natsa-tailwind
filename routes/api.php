<?php

use App\Http\Controllers\API\RegionController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/search/{search}', [RegionController::class, 'search'])->name('region.search');
        Route::get('/filter', [RegionController::class, 'filter'])->name('region.filter');

    });

});
