<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\IrrigationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

//Admin
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('/user')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('user.home');

    });

    Route::prefix('/admin')->group(function () {
        //dashboard
        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        //region
        Route::get('/regions', [RegionController::class, 'index'])->name('admin.regions');
        Route::post('/regions', [RegionController::class, 'store']);
        Route::delete('/regions/{region}', [RegionController::class, 'destroy'])->name('admin.regions.delete');
        Route::put('/regions/{region}', [RegionController::class, 'put'])->name('admin.regions.update');
        Route::get('/regions/add', [RegionController::class, 'showStore'])->name('admin.regions.add');
        Route::get('/regions/put/{region}', [RegionController::class, 'showPut'])->name('admin.regions.put');

        //irrigation
        Route::get('/irrigations', [irrigationController::class, 'index'])->name('admin.irrigations');
        Route::post('/irrigations', [irrigationController::class, 'store']);
        Route::delete('/irrigations/{irrigation}', [irrigationController::class, 'destroy'])->name('admin.irrigations.delete');
        Route::put('/irrigations/{irrigation}', [irrigationController::class, 'put'])->name('admin.irrigations.update');
        Route::get('/irrigations/add', [irrigationController::class, 'showStore'])->name('admin.irrigations.add');
        Route::get('/irrigations/put/{irrigation}', [irrigationController::class, 'showPut'])->name('admin.irrigations.put');



        Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
            // Route::view('dashboard', 'dashboard')->name('dashboard');
            Route::view('admin.forms', 'admin.forms')->name('forms');
            Route::view('admin.cards', 'admin.cards')->name('cards');
            Route::view('admin.charts', 'admin.charts')->name('charts');
            Route::view('admin.buttons', 'admin.buttons')->name('buttons');
            Route::view('admin.modals', 'admin.modals')->name('modals');
            Route::view('admin.tables', 'admin.tables')->name('tables');
            Route::view('admin.calendar', 'admin.calendar')->name('calendar');
        });
    });

});
