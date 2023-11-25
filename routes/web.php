<?php

use App\Http\Controllers\ExtraController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\SiteIdentityController;
use App\Livewire\About\AboutIndex;
use App\Livewire\HomeIndex;
use App\Livewire\HomeSlider\HomeSliderCreate;
use App\Livewire\HomeSlider\HomeSliderIndex;
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

    Route::get('/home', HomeIndex::class);

    Route::get('/getAbout', AboutIndex::class);

    Route::get('/getHomeSlider', HomeSliderIndex::class)->name('getHomeSlider.index');
    Route::get('/getHomeSlider/create', HomeSliderCreate::class)->name('getHomeSlider.create');

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
