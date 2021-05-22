<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\VestigeController;
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
})->name('welcome')->middleware('guest');

//Admin
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('/user')->middleware('role:user')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('user.home');

    });

    Route::prefix('/admin')->middleware('role:admin')->group(function () {
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
        Route::get('/irrigations', [IrrigationController::class, 'index'])->name('admin.irrigations');
        Route::post('/irrigations', [IrrigationController::class, 'store']);
        Route::delete('/irrigations/{irrigation}', [IrrigationController::class, 'destroy'])->name('admin.irrigations.delete');
        Route::put('/irrigations/{irrigation}', [IrrigationController::class, 'put'])->name('admin.irrigations.update');
        Route::get('/irrigations/add', [IrrigationController::class, 'showStore'])->name('admin.irrigations.add');
        Route::get('/irrigations/put/{irrigation}', [IrrigationController::class, 'showPut'])->name('admin.irrigations.put');

        //vesitge -> bekas
        Route::get('/vestiges', [VestigeController::class, 'index'])->name('admin.vestiges');
        Route::post('/vestiges', [VestigeController::class, 'store']);
        Route::delete('/vestiges/{vestige}', [VestigeController::class, 'destroy'])->name('admin.vestiges.delete');
        Route::put('/vestiges/{vestige}', [VestigeController::class, 'put'])->name('admin.vestiges.update');
        Route::get('/vestiges/add', [VestigeController::class, 'showStore'])->name('admin.vestiges.add');
        Route::get('/vestiges/put/{vestige}', [VestigeController::class, 'showPut'])->name('admin.vestiges.put');

        //social media
        Route::get('/socialMedias', [SocialMediaController::class, 'index'])->name('admin.socialMedias');
        Route::post('/socialMedias', [SocialMediaController::class, 'store']);
        Route::delete('/socialMedias/{socialMedia}', [SocialMediaController::class, 'destroy'])->name('admin.socialMedias.delete');
        Route::put('/socialMedias/{socialMedia}', [SocialMediaController::class, 'put'])->name('admin.socialMedias.update');
        Route::get('/socialMedias/add', [SocialMediaController::class, 'showStore'])->name('admin.socialMedias.add');
        Route::get('/socialMedias/put/{socialMedia}', [SocialMediaController::class, 'showPut'])->name('admin.socialMedias.put');

        //social media
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::post('/users', [UserController::class, 'store']);
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');
        Route::put('/users/{user}', [UserController::class, 'put'])->name('admin.users.update');
        Route::get('/users/add', [UserController::class, 'showStore'])->name('admin.users.add');
        Route::get('/users/put/{user}', [UserController::class, 'showPut'])->name('admin.users.put');

        
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
