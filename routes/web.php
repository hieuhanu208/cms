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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/admin','AdminController@login')->name('admin');

Route::get('/logout', 'AdminController@logout')->name('logout');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard','AdminController@dashboard')->name('admin-dashboard');  
    Route::get('/admin/settings','AdminController@settings')->name('admin-settings');
//Category Route
    Route::match(['get', 'post'], '/admin/add-category','CategoryController@addCategory');
    Route::match(['get', 'post'], '/admin/edit-category/{id}','CategoryController@editCategory');
    Route::get('/admin/view-categories', 'CategoryController@viewCategory');
});

Route::get('/home', 'HomeController@index')->name('home');
