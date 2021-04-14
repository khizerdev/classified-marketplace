<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','as'=>'admin.'] , function(){

    Route::get('/profile', 'AdminController@index')->name('dashboard');

    Route::get('/ads/create', 'AdsController@create')->name('ad.create');
    Route::post('/ads/store', 'AdsController@store')->name('ad.store');
    Route::get('/ads', 'AdsController@index')->name('ads.index');
    Route::get('/ads/edit/{id}', 'AdsController@edit')->name('ad.edit');
    Route::get('/ads/delete/{id}', 'AdsController@destroy')->name('ad.destroy');
    Route::post('/ads/update/{id}', 'AdsController@update')->name('ad.update');
    Route::get('/ads/saved/', 'AdsController@saved')->name('saved.ads');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

    Route::get('/chat', 'ChatController@index')->name('chats');

    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');

    Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');
    Route::post('/user/profile/update/{id}', 'ProfilesController@update')->name('user.profile.update');
});
