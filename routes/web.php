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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('addproduct', 'AddproductController');
Route::resource('product', 'ProductController');
Route::resource('user', 'UserController');

Route::get('/addproduct', 'AddproductController@index')->name('addproduct');
Route::get('/product', 'ProductController@index')->name('product');
Route::post('/user/{user}', 'UserController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
