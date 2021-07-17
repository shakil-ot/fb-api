<?php

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

Route::get('/demo', function () {
    return view('test');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/init-testing', 'FacebookMarketing\FacebookMarketingController@initTesting')->name('home');
Route::get('/adAccount', 'FacebookMarketing\FacebookMarketingController@AdAccount')->name('home');
Route::get('/pageList', 'FacebookMarketing\FacebookMarketingController@getPageList')->name('home');
Route::get('/pixelList', 'FacebookMarketing\FacebookMarketingController@getPixelList')->name('home');
Route::get('/igList', 'FacebookMarketing\FacebookMarketingController@getInstagramList')->name('home');
Route::get('/invitePeople', 'FacebookMarketing\FacebookMarketingController@InvitePeople')->name('home');
Route::get('/grantAccesstoAssets', 'FacebookMarketing\FacebookMarketingController@GrantAccesstoAssetsforAnotherBusinessManager')->name('home');
Route::get('/getSystemUser', 'FacebookMarketing\FacebookMarketingController@getSystemUser')->name('home');
Route::get('/createBusinessManager', 'FacebookMarketing\FacebookMarketingController@createBusinessManager')->name('home');
Route::get('/clientAdAccount', 'FacebookMarketing\FacebookMarketingController@clientAdAccount')->name('home');
Route::get('/claimClientPage', 'FacebookMarketing\FacebookMarketingController@claimClientPage')->name('home');
Route::get('/claimAdAccount', 'FacebookMarketing\FacebookMarketingController@claimAdAccount')->name('home');


