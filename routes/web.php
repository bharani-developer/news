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



Route::get('/','HomePageController@index');
Route::get('/listing','ListingPageController@index');
Route::get('/details','DetailsPageController@index');

Route::group(['prefix'=>'back','middleware'=>'auth'],function(){

    //index
    
    Route::get('/','Admin\DashboardController@index');

    // Category

    Route::get('/category','Admin\categoryController@index');
    Route::get('/category/create','Admin\categoryController@create');
    Route::get('/category/edit','Admin\categoryController@edit');

    // Permission

    Route::get('/permission','Admin\PermissionController@index');
    Route::get('/permission/create','Admin\PermissionController@create');
    Route::get('/permission/edit','Admin\PermissionController@edit');
    Route::post('/permission/store','Admin\PermissionController@store');
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
