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
    Route::post('logout', 'UserAPIController@logout')->middleware('jwt.verify');
});

Route::group(['middleware' => ['jwt.verify']], function()
{
    Route::resource('stores', 'StoreAPIController');
    Route::Post('stores/update/{id}', 'StoreAPIController@storeUpdate');

    Route::get('stores-meet-types/{id}', 'StoreAPIController@meettypes');  /* get meet types of any store on different request*/

    Route::get('my-own-stores', 'StoreAPIController@myOwnStore');

    Route::patch('store-deactivate/{id}', 'StoreAPIController@deactivate'); // Deactivate the store

    Route::resource('meet_types', 'MeetTypesAPIController');
    Route::post('meet_types/update/{id}', 'MeetTypesAPIController@meetUpdate');

    Route::resource('complaints', 'ComplaintAPIController');

    Route::resource('users', 'UserAPIController');

    Route::resource('user_stores', 'UserStoreAPIController');

    Route::resource('app_settings', 'AppSettingAPIController');
});

Route::resource('stores', 'StoreAPIController'); // Guest no Auth on home page
Route::get('stores-meet-types/{id}', 'StoreAPIController@meettypes');  // meetTypes for Guest

Route::get('settings/about', 'AppSettingAPIController@about');
Route::get('settings/term', 'AppSettingAPIController@term');
Route::get('settings/condation', 'AppSettingAPIController@appCondation');
Route::get('settings/review', 'AppSettingAPIController@review');
