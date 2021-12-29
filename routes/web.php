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
Route::get('/Users/role', 'UserController@role');

Route::group(['middleware' => 'role:admin'], function() {
    Route::post('/Users/update/{user}/{role}', 'UserController@update');
    Route::delete('/Users/delete/{user}', 'UserController@delete');
    Route::get('/Users', 'UserController@view')->name('usersView');
});

Route::group(['prefix' => 'Category','middleware' => 'role:admin'], function() {
    Route::get('/', 'CategoryController@view')->name('categoryView');
    Route::post('/store', 'CategoryController@store');
    Route::delete('/delete/{category}', 'CategoryController@delete');
    Route::post('/update/{category}', 'CategoryController@update');
});

Route::group(['prefix' => 'Role','middleware' => 'role:admin'], function() {
    Route::get('/', 'RoleController@view')->name('roleView');
    Route::post('/store', 'RoleController@store');
    Route::delete('/Role/delete/{role}', 'RoleController@delete');
    Route::post('/update/{role}', 'RoleController@update');
});

Route::group(['prefix' => 'Product','middleware' => 'role:user|admin'], function() {
    Route::get('/view', 'ProductController@productsView')->name('productsView');
    Route::get('/buy_view/{product}', 'ProductController@buyView');
    Route::post('/store', 'ProductController@store');
    Route::post('/update/{product}', 'ProductController@update');
    Route::delete('/delete/{product}', 'ProductController@delete');
});

Route::group(['middleware' => 'role:user|admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/Index/{category}', 'CategoryController@index');
    Route::get('/MyProducts', 'UserController@myProducts')->name('userProducts');
});

Auth::routes();
