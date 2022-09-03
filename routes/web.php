<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\SiteIdentityController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\FrontEnd\HomeController::class, 'index']);

Route::group(['middleware' => 'auth'], static function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resources([
        'getHomeSlider' => HomeSliderController::class,
        'getAbout' => AboutController::class,
    ]);

    Route::get('system-info', [ExtraController::class, 'system_info'])->name('system-info');
    Route::get('optimize', [ExtraController::class, 'optimize'])->name('optimize');
    Route::get('optimize/applicationCache', [ExtraController::class, 'optimizeApplicationCache'])->name('applicationCache');
    Route::get('optimize/routeCache', [ExtraController::class, 'optimizeRouteCache'])->name('routeCache');
    Route::get('optimize/configCache', [ExtraController::class, 'optimizeConfigCache'])->name('configCache');
    Route::get('optimize/viewCache', [ExtraController::class, 'optimizeViewCache'])->name('viewCache');

    Route::resource('getSiteIdentity', SiteIdentityController::class)->only([
        'index', 'store', 'update'
    ]);
    Route::resource('getGeneralSetting', GeneralSettingController::class)->only([
        'index', 'store', 'update'
    ]);
    Route::resource('getSEO', SEOController::class)->only([
        'index', 'store', 'update'
    ]);
});

Auth::routes([
    'register' => true,
    'reset' => true
]); // Registration Routes...);
