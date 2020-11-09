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

Route::group([
    'prefix' => 'v1'
], static function () {
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@login');

    Route::group([
        'middleware' => 'jwt.auth'
    ], static function () {
        Route::get('me', 'MeController@index');
        Route::get('me/items', 'MeController@items_index');
        Route::get('categories', 'CategoriesController@index');
//        Route::get('posts', 'MeController@index');
    });
});
