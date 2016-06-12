<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/', 'Frontend\HomeController@index');

/* Api Route */
Route::group(['prefix' => 'api'], function(){

	Route::put('user/update-profile/{id}', 'Api\Backend\UserController@updateProfile');
	Route::post('user/change-avatar/{id}','Api\Backend\UserController@changeAvatar');
	Route::post('user/change-password/{id}','Api\Backend\UserController@changePassword');
	Route::post('user/profile/check-email','Api\Backend\UserController@checkEmailProfile');
	Route::resource('user', 'Api\Backend\UserController');

	Route::post('category/create-image-category/{id}', 'Api\Backend\CategoryController@createImageCategory');
	Route::resource('category', 'Api\Backend\CategoryController');

	Route::post('product/create-image-product/{id}', 'Api\Backend\ProductController@createImageProduct');
	Route::resource('product', 'Api\Backend\ProductController');

	/* Route cart */
	Route::post('shopping-cart/{id}', 'Api\Frontend\CartController@addProductToCart');
	Route::resource('shopping-cart', 'Api\Frontend\CartController');

	/* Route customer */
	Route::post('customer/send-email/{id}', 'Api\Frontend\CustomerController@sendEmailToCustomerPurchase');
	Route::post('customer/login', 'Api\Frontend\CustomerController@postLogin');
	Route::post('customer/login-facebook', 'Api\Frontend\CustomerController@postLoginFacebook');
	Route::resource('customer', 'Api\Frontend\CustomerController');

	Route::resource('about', 'Api\Backend\AboutController');
	Route::resource('contact', 'Api\Backend\ContactController');

	Route::post('search-product', 'Api\Frontend\HomeController@searchProduct');
});

/* Admin route */
Route::group(['prefix' => 'admin'], function(){
	Route::resource('user', 'Backend\UserController');
	Route::resource('category', 'Backend\CategoryController');
	Route::resource('product', 'Backend\ProductController');
	Route::resource('about', 'Backend\AboutController');
	Route::resource('contact', 'Backend\ContactController');
});

Route::get('product/file/download/{id}','Backend\FileProductController@download');
Route::resource('product/file','Backend\FileProductController');

Route::get('category/file/download/{id}','Backend\FileCategoryController@download');
Route::resource('category/file','Backend\FileCategoryController');

/* Route user */
Route::get('user/profile/{id}', 'Backend\UserController@show');
Route::get('user/change-password', 'Backend\UserController@changePassword');

/* Route category detail */
Route::resource('category-detail', 'Frontend\CategoryController');

/* Route product detail */
Route::get('product-detail/show-modal/{id}', 'Frontend\ProductController@showModalProduct');
Route::resource('product-detail', 'Frontend\ProductController');

/* Route cart */
Route::resource('shopping-cart', 'Frontend\CartController');

// Route Customer
Route::get('customer/logout', 'Auth\AuthController@getLogout');
Route::post('customer/login', 'Auth\AuthController@postLogin');
Route::resource('customer', 'Frontend\CustomerController');

Route::get('product/search/{id}', 'Frontend\HomeController@getSearch');

Route::get('list-product/{type}', 'Frontend\ProductController@getProductWithType');

// Route about
Route::get('about', 'Frontend\AboutController@getAbout');

// Route contact
Route::get('contact', 'Frontend\ContactController@getContact');

Route::get('view-image/{id}', 'Frontend\ProductController@getImageProduct');