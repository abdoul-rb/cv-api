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

Route::get('/basics', 'ResumeController');
Route::post('/upload', 'UploadController');

Route::group(['prefix' => 'skills'], function () {
    Route::get('', 'SkillController@index');
    Route::post('', 'SkillController@store');
    Route::get('{skill}', 'SkillController@show');
    Route::patch('{skill}', 'SkillController@update');
    Route::delete('{skill}', 'SkillController@destroy');
});

Route::group(['prefix' => 'achieves'], function () {
    Route::get('', 'AchieveController@index');
    Route::post('', 'AchieveController@store');
    Route::get('{achieve}', 'AchieveController@show');
    Route::patch('{achieve}', 'AchieveController@update');
    Route::delete('{achieve}', 'AchieveController@destroy');
});

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('me', 'MeController');
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController');
    Route::post('register', 'RegisterController');
});
