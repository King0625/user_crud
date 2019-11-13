<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('register', 'UsersController@register');
Route::post('login', 'UsersController@login');
Route::get('user', 'UsersController@index')->middleware('check.user');
Route::get('user/{id}', 'UsersController@show')->middleware('check.user');
Route::put('user/{id}', 'UsersController@update')->middleware('check.user');
Route::delete('user/{id}', 'UsersController@destroy')->middleware('check.user');

Route::get('profile/{id}', 'ProfileController@show');
Route::put('profile/{id}', 'ProfileController@update')->middleware('check.user');

Route::get('product/search', 'SearchController@searchProducts');

Route::get('product' , 'ProductsController@index');
Route::get('product/{id}' , 'ProductsController@show');
Route::get('user/{user_id}/product', 'ProductsController@userProducts');
Route::post('product', 'ProductsController@store')->middleware('check.user');
Route::put('product/{id}', 'ProductsController@update')->middleware('check.user');
Route::delete('product/{id}', 'ProductsController@destroy')->middleware('check.user');


Route::get('product/{product}/rating', 'RatingController@productRatings');
Route::post('product/{product}/rating', 'RatingController@rateProduct')->middleware('check.user');

Route::get('transaction/{user}/history', 'TransactionController@index')->middleware('check.user');
Route::post('transaction/{product}', 'TransactionController@store')->middleware('check.user');

Route::get('user/{user}/wishlist', 'WishListController@index')->middleware('check.user');
Route::post('user/wishlist/product/{product}', 'WishListController@store')->middleware('check.user');
Route::delete('user/{user}/wishlist/{wishlist}', 'WishListController@destroy')->middleware('check.user');

Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}/products', 'CategoryController@productIndex');
Route::post('categories', 'CategoryController@store')->middleware('check.user');
