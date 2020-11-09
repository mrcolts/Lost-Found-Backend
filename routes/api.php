<?php

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
        Route::group('me', static function() {
            Route::get('', 'MeController@index');
            Route::group('items', static function() {
                Route::get('', 'MeController@items_index');
                Route::post('', 'MeController@items_store');
            });
            Route::group('posts', static function() {
                Route::get('', 'PostsController@user_index');
                Route::delete('{post_id}', 'PostsController@delete');
            });
        });

        Route::get('categories', 'CategoriesController@index');

        Route::group('posts', static function() {
            Route::get('PostsController@index');
            Route::post('PostsController@store');

        });
    });
});
