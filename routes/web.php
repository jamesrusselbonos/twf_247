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
Route::get('/load_account', function () {
    return view('load-account');
});
Route::get('/va_profile', function () {
    return view('va-profile');
});
Route::get('/update_profile', function () {
    return view('update-profile');
});

Auth::routes();

/////IMPORT EXCEL/////////////
Route::get('/import_excel', 'ImportController@index');
Route::post('/import_excel/import', 'ImportController@import');

///////////////////////////////////

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('addproduct', 'AddproductController');
Route::resource('product', 'ProductController');
Route::resource('user', 'UserController');


Route::get('/import_excel', 'ImportController@index')->name('import.index');


Route::get('/product', 'ProductController@index')->name('product.index');
Route::post('/product/{id}', 'ProductController@update')->name('product.update');
Route::post('/update-product/{id}', 'ProductController@updateProduct')->name('product.updateProduct');
Route::post('/re-update/{id}', 'ProductController@reUpdate')->name('product.reUpdate');
Route::get('add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('remove-to-cart/{id}', 'ProductController@removeToCart')->name('product.removeCart');
Route::get('checkout', 'ProductController@getCheckout')->name('product.checkout');

Route::get('/admin', 'HomeController@admin')->name('admin');


Route::get('/addproduct', 'AddproductController@index')->name('addproduct');
Route::get('/product_details/{product}', 'ProductController@show');
Route::get('/test/{id}', 'TestController@show');

Route::post('/user/{id}', 'UserController@ajaxupdate')->name('user.prof');

Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
// Route::post('update', 'UserController@update');



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
