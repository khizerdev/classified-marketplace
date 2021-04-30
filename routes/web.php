<?php

use App\Http\Controllers\HomeController;
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


Route::get('/ad/{slug}', 'AdsController@show')->name('ad.show');

Route::get('/ads', 'FrontEndController@all')->name('ad.all');

Route::get('/ads/{categorySlug}', 'FrontEndController@byCategory')->name('by.category');

Route::get('/ads/{categorySlug}/{subcategorySlug}', 'FrontEndController@bysubcategory')->name('by.subcategory');


Route::get('/contact-us' , 'HomeController@contact')->name('contact');

Route::post('/contact' , 'HomeController@contactSubmit')->name('contact.store');


Route::post('/report-this-ad' , 'FrontEndController@reportAd')->name('report.ad');


// login with facebook

Route::get('auth/facebook' , 'SocialController@facebookRedirect');

Route::get('auth/facebook/callback' , 'SocialController@loginWithFacebook');




// MessageRoutes

Route::post('/send/message', 'SendMessageController@store')->name('send.message');





Route::get('/ads/{categorySlug}/{subcategorySlug}/{childcategorySlug}', 'FrontEndController@bychildcategory')->name('by.childcategory');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'auth'] , function(){

    Route::get('/chats', 'SendMessageController@index')->name('chats');
    Route::get('/users', 'SendMessageController@chatWithThisUser')->name('chat.user');
    Route::get('/chat/user/{id}', 'SendMessageController@showMessages')->name('chat.show');
    Route::post('/start-chat', 'SendMessageController@startChat')->name('chat.start');

    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    Route::get('/ads/create', 'AdsController@create')->name('ad.create');
    Route::post('/ads/store', 'AdsController@store')->name('ad.store');
    Route::get('/ads', 'AdsController@index')->name('ads.index');
    Route::get('/ad/{slug}', 'AdsController@show')->name('ad.show');
    Route::get('/ads/edit/{id}', 'AdsController@edit')->name('ad.edit');
    Route::get('/ads/delete/{id}', 'AdsController@destroy')->name('ad.destroy');
    Route::put('/ads/update/{id}', 'AdsController@update')->name('ad.update');
    Route::get('/active-ad/{id}', 'AdsController@active')->name('ad.active');
    Route::get('/disable-ad/{id}', 'AdsController@disable')->name('ad.disable');

    Route::get('/save/ad', 'AdsController@saveAd')->name('save.ad');
    Route::get('/saved/ads', 'AdsController@savedAds')->name('saved.index');
    Route::get('/ad/user/remove-save', 'AdsController@removeSaveAd')->name('save.ad.remove');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

    // Route::get('/chat', 'SendMessageController@chats')->name('chats');

    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');
   
   
    Route::get('/subcategory/create', 'SubCategoryController@create')->name('subcategory.create');
    Route::get('/subcategory', 'SubCategoryController@index')->name('subcategory.index');
    Route::post('/subcategory/store', 'SubCategoryController@store')->name('subcategory.store');
    Route::post('/subcategory/update/{id}', 'SubCategoryController@update')->name('subcategory.update');
    Route::get('/subcategory/edit/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
    Route::get('/subcategory/delete/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');

    Route::get('/childcategory/create', 'ChildcategoryController@create')->name('childcategory.create');
    Route::get('/childcategory', 'ChildcategoryController@index')->name('childcategory.index');
    Route::post('/childcategory/store', 'ChildcategoryController@store')->name('childcategory.store');
    Route::post('/childcategory/update/{id}', 'ChildcategoryController@update')->name('childcategory.update');
    Route::get('/childcategory/edit/{id}', 'ChildcategoryController@edit')->name('childcategory.edit');
    Route::get('/childcategory/delete/{id}', 'ChildcategoryController@destroy')->name('childcategory.destroy');

    Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');
    Route::put('/user/profile/update/{id}', 'ProfilesController@update')->name('user.profile.update');
});
