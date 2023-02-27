<?php

// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PasienVisitationController;


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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
       /*  Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform'); */

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {

        Route::get('/', 'HomeController@index')->name('home.index');
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        Route::resource('/pasien', PasienController::class);
        Route::resource('/pasien_visitation', PasienVisitationController::class);

        Route::post('/pasien_visitation/create', [App\Http\Controllers\PasienVisitationController::class, 'search'])->name('pasien_visitation.search');
        Route::get('/laporan_bulanan', [App\Http\Controllers\PasienVisitationController::class, 'laporan_bulanan'])->name('pasien_visitation.laporan_bulanan');
        Route::get('/laporan_pasien', [App\Http\Controllers\PasienController::class, 'laporan_pasien'])->name('pasien.laporan_pasien');

        Route::resource('/user', UserController::class);
    });
});
