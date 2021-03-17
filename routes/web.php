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

$prefixAdmin = config('tattoo.url.prefix_admin');

Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin', ], function () {
    $prefix = 'slider';
    Route::get( $prefix.'/change-status', 'SliderController@changeStatus');
    Route::resource($prefix, 'SliderController');

    $prefix = 'category';
    Route::get( $prefix.'/change-status', 'CategoryController@changeStatus');
    Route::resource($prefix, 'CategoryController');

    $prefix = 'project';
    Route::get( $prefix.'/change-status', 'ProjectController@changeStatus');
    Route::resource($prefix, 'ProjectController');

    $prefix = 'team';
    Route::get( $prefix.'/change-status', 'TeamController@changeStatus');
    Route::resource($prefix, 'TeamController');

    $prefix = 'feedback';
    Route::get( $prefix.'/change-status', 'FeedbackController@changeStatus');
    Route::resource($prefix, 'FeedbackController');

    $prefix = 'booknow';
    Route::get( $prefix.'/change-status', 'BooknowController@changeStatus');
    Route::resource($prefix, 'BooknowController');

    $prefix = 'faq';
    Route::get( $prefix.'/change-status', 'FAQController@changeStatus');
    Route::resource($prefix, 'FAQController');

    $prefix = 'category-product';
    Route::get( $prefix.'/change-status', 'CategoryProductController@changeStatus');
    Route::resource($prefix, 'CategoryProductController');
});





$prefixUser = config('tattoo.url.prefix_user');

Route::group(['prefix' => $prefixUser, 'namespace' => 'User', ], function () {
    Route::get('/', 'UserController@index');
});
