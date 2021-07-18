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
Route::get('/init-testing', 'FacebookMarketing\FacebookMarketingController@initTesting');
Route::get('/adAccount', 'FacebookMarketing\FacebookMarketingController@adAccount');
Route::get('/pageList', 'FacebookMarketing\FacebookMarketingController@getPageList');
Route::get('/pixelList', 'FacebookMarketing\FacebookMarketingController@getPixelList');
Route::get('/igList', 'FacebookMarketing\FacebookMarketingController@getInstagramList');
Route::get('/invitePeople', 'FacebookMarketing\FacebookMarketingController@InvitePeople');
Route::get('/grant/access/to/assets', 'FacebookMarketing\FacebookMarketingController@grantAccessToAssetsForAnotherBusinessManager');
Route::get('/getSystemUser', 'FacebookMarketing\FacebookMarketingController@getSystemUser');
Route::get('/createBusinessManager', 'FacebookMarketing\FacebookMarketingController@createBusinessManager');
Route::get('/clientAdAccount', 'FacebookMarketing\FacebookMarketingController@clientAdAccount');
Route::get('/claimClientPage', 'FacebookMarketing\FacebookMarketingController@claimClientPage');
Route::get('/claimAdAccount', 'FacebookMarketing\FacebookMarketingController@claimAdAccount');
Route::get('/fbLogin', 'FacebookMarketing\FacebookMarketingController@fbLogin');


