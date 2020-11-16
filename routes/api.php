<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('register','UserAPIController@register');
    Route::post('login', 'UserAPIController@authenticate');
    Route::post('forget-password', 'UserAPIController@forgetPassword');
    Route::post('set-password', 'UserAPIController@setPassword');

});

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::resource('stores', 'StoreAPIController');

    Route::resource('meet_types', 'MeetTypesAPIController');

    Route::resource('complaints', 'ComplaintAPIController');

    Route::resource('users', 'UserAPIController');

    Route::resource('user_stores', 'UserStoreAPIController');

    Route::resource('app_settings', 'AppSettingAPIController');

});
Route::get('settings/about', 'AppSettingAPIController@about');
Route::get('settings/term', 'AppSettingAPIController@term');
Route::get('settings/condation', 'AppSettingAPIController@appCondation');
Route::get('settings/review', 'AppSettingAPIController@review');
