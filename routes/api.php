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

Route::get('/category' , 'ApiController@getCategory');
Route::get('/subcategory' , 'ApiController@getSubCategory');
Route::get('/childcategory' , 'ApiController@getChildCategory');

Route::get('/country' , 'AddressController@getCountry');
Route::get('/state' , 'AddressController@getState');
Route::get('/city' , 'AddressController@getCity');
