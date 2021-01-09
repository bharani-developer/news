<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/', 'HomePageController@index');
Route::get('/listing', 'ListingPageController@index');
Route::get('/details', 'DetailsPageController@index');

Route::group(['prefix' => 'back', 'middleware' => 'auth'], function () {

    //index

    Route::get('/', 'Admin\DashboardController@index');

    // Category

    Route::get('/category', 'Admin\categoryController@index');
    Route::get('/category/create', 'Admin\categoryController@create');
    Route::get('/category/edit', 'Admin\categoryController@edit');

    // Permission

    Route::get('/permission', 'Admin\PermissionController@index');
    Route::get('/permission/create', 'Admin\PermissionController@create');
    Route::post('/permission/store', 'Admin\PermissionController@store');
    Route::get('/permission/edit/{id}', ['uses' => 'Admin\PermissionController@edit', 'as' => 'permission-edit']);
    Route::put('/permission/edit/{id}', ['uses' => 'Admin\PermissionController@update', 'as' => 'permission-update']);
    Route::delete('/permission/delete/{id}', ['uses' => 'Admin\PermissionController@destroy', 'as' => 'permission-deelte']);

    // Role

    Route::get('/roles', 'Admin\RoleController@index');
    Route::get('/roles/create', 'Admin\RoleController@create');
    Route::post('/roles/store', 'Admin\RoleController@store');
    Route::get('/roles/edit/{id}', ['uses' => 'Admin\RoleController@edit', 'as' => 'role-edit']);
    Route::put('/roles/edit/{id}', ['uses' => 'Admin\RoleController@update', 'as' => 'role-update']);
    Route::delete('/roles/delete/{id}', ['uses' => 'Admin\RoleController@destroy', 'as' => 'role-delete']);

    // author


    Route::get('/author', 'Admin\AuthorController@index');
    Route::get('/author/create', 'Admin\AuthorController@create');
    Route::post('/author/store', 'Admin\AuthorController@store');
    Route::get('/author/edit/{id}', ['uses' => 'Admin\AuthorController@edit', 'as' => 'author-edit']);
    Route::put('/author/edit/{id}', ['uses' => 'Admin\AuthorController@update', 'as' => 'author-update']);
    Route::delete('/author/delete/{id}', ['uses' => 'Admin\AuthorController@destroy', 'as' => 'author-delete']);

    // categroies

    Route::get('/categroies', ['uses' => 'Admin\CategoryController@index', 'as' => 'category-list']);
    Route::get('/category/create', ['uses' => 'Admin\CategoryController@create', 'as' => 'category-create']);
    Route::post('/category/store', ['uses' => 'Admin\CategoryController@store', 'as' => 'category-store']);
    Route::put('/category/status/{id}', ['uses' => 'Admin\CategoryController@status', 'as' => 'category-status']);
    Route::get('/category/edit/{id}', ['uses' => 'Admin\CategoryController@edit', 'as' => 'category-edit',]);
    Route::put('/category/update/{id}', ['uses' => 'Admin\CategoryController@update', 'as' => 'category-update']);
    Route::delete('/category/delete/{id}', ['uses' => 'Admin\CategoryController@destroy', 'as' => 'category-delete']);

    // posts

    Route::get('/posts', ['uses' => 'Admin\PostController@index', 'as' => 'post-list']);
    Route::get('/posts/create', ['uses' => 'Admin\PostController@create', 'as' => 'post-create']);
    Route::post('/post/store', ['uses' => 'Admin\PostController@store', 'as' => 'post-store']);
    Route::put('/post/status/{id}', ['uses' => 'Admin\PostController@status', 'as' => 'post-status',]);
    Route::put('/post/hot/news/{id}', ['uses' => 'Admin\PostController@hot_news', 'as' => 'hot_news-status',]);
    Route::get('/post/edit/{id}', ['uses' => 'Admin\PostController@edit', 'as' => 'post-edit',]);
    Route::put('/post/update/{id}', ['uses' => 'Admin\PostController@update', 'as' => 'post-update',]);
    Route::delete('/post/delete/{id}', ['uses' => 'Admin\PostController@destroy', 'as' => 'post-delete',]);

    // comment


    Route::get('/comment/{id}', ['uses' => 'Admin\CommentController@index', 'as' => 'comment-list',]);
    Route::get('/comment/reply/{id}', ['uses' => 'Admin\CommentController@reply', 'as' => 'comment-view']);
    Route::post('/comment/reply', ['uses' => 'Admin\CommentController@store', 'as' => 'comment-reply']);
    Route::put('/comment/status/{id}', ['uses' => 'Admin\CommentController@status', 'as' => 'comment-status']);
    Route::get('/settings', ['uses' => 'Admin\SettingController@index', 'as' => 'setting']);
    Route::put('/settings/update', ['uses' => 'Admin\SettingController@update', 'as' => 'setting-update']);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
