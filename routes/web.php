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

Route::get('/', 'HomeController@index');
Route::get('/Users', 'UserController@view')->name('usersView');
Route::delete('/Users/delete/{user}', 'UserController@delete');
Route::get('/Product/{id}', 'ProductController@storeView')->name('addProduct');
Route::get('/Product/buy_view/{product}', 'ProductController@buy_view');
Route::post('/Product/store/{product}', 'ProductController@store');
Route::post('/Product/update/{product}', 'ProductController@update');
Route::get('/Roles', 'RoleController@view')->name('roleView');
Route::post('/Role/store', 'RoleController@store');
Route::delete('/Role/delete/{role}', 'RoleController@delete');
Route::post('/Role/update/{role}', 'RoleController@update');
Route::get('/Category', 'CategoryController@view')->name('categoryView');
Route::post('/Category/store', 'CategoryController@store');
Route::delete('/Category/delete/{category}', 'CategoryController@delete');
Route::post('/Category/update/{category}', 'CategoryController@update');
Route::get('/Index/{category}', 'CategoryController@index');

Auth::routes();
