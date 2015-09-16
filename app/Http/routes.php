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

Route::get('/', 'FrontEnd\FrontEndController@index');

Route::get('home', 'FrontEnd\FrontEndController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/auth/facebook', [
    'as' => 'auth_fb',
    'uses' => 'Auth\AuthController@loginWithFacebook'
]);
//group admin
Route::group(['prefix' => 'admin'], function () {
    //user list
    get('users_list','Admin\AdminController@users_list');
    get('/','Admin\AdminController@index');

    //insert
    get('insert','Admin\AdminController@insert');
    post('insert','Admin\AdminController@store');

    //edit
    get('users_list/{id}/edit','Admin\AdminController@edit');
    post('users_list/{id}/edit','Admin\AdminController@update');
    //view
    get('users_list/{id}/profile','Admin\AdminController@profile');
    //delete
    get('users_list/{id}/delete','Admin\AdminController@delete');

    get('categories','Admin\CategoryController@index');

    get('categories_add','Admin\CategoryController@create');
    post('categories_add','Admin\CategoryController@store');

    get('product_add','Admin\ProductController@create');
    post('product_add','Admin\ProductController@store');

    get('product_list','Admin\ProductController@index');
    get('product/{id}/view', 'Admin\ProductController@view');
    
    get('product/{id}/edit', 'Admin\ProductController@edit');
    post('product/{id}/edit', 'Admin\ProductController@update');

    get('product/delete/{id}', 'Admin\ProductController@delete');

    get('categories/{id}/edit', 'Admin\CategoryController@edit');
    post('categories/{id}/edit', 'Admin\CategoryController@update');

    get('categories/delete/{id}', 'Admin\CategoryController@delete');

    get('orders_list','Admin\ManagedOrderController@index');
    get('order/{id}/view','Admin\ManagedOrderController@view');
    post('order/{id}/view','Admin\ManagedOrderController@updateOrder');

    get('chat','Admin\AdminController@chat');
});

Route::get('user/{id}/edit','User\UserController@edit');
Route::post('user/{id}/edit','User\UserController@update');

Route::get('user/{id}/edit_avatar','User\UserController@edit_avatar');
Route::post('user/{id}/edit_avatar','User\UserController@update_avatar');

Route::get('user/{id}/edit_password','User\UserController@edit_password');
Route::post('user/{id}/edit_password','User\UserController@update_password');

Route::get('profile/{id}', 'User\UserController@index');
Route::get('profile', function () {
    return view('users.pages.profile_account#tab_1_1');
});

Route::get('profile_password', function () {
    return view('users.pages.profile_account#tab_1_4');
});

Route::get('register', function () {
    return view('users.register');
});
Route::get('register/{username}/{key_active}', 'RegisterController@register');

Route::get('category', function () {
    return view('admin.categories.categories');
});

Route::get('bike', 'FrontEnd\FrontEndController@bike');

Route::get('product/{id}/view', 'FrontEnd\FrontEndController@view');

Route::get('MoutainBikes', 'FrontEnd\FrontEndController@mountainbikes');
Route::get('RoadBikes', 'FrontEnd\FrontEndController@roadbikes');

Route::get('SingleSpeedBikes', function () {
    return view('404');
});
Route::get('HybridBikes', function () {
    return view('404');
});
Route::get('BalanceBikes', function () {
    return view('404');
});
Route::get('FixieBikes', function () {
    return view('404');
});
Route::get('KidBikes', function () {
    return view('404');
});


Route::group(['prefix' => 'user'], function () {
    get('{id}/cart','FrontEnd\CartController@addToCart');
    get('cart','FrontEnd\CartController@showCart');

    get('cart/{rowid}/delete', 'FrontEnd\CartController@remove');
    get('cart/destroy', 'FrontEnd\CartController@destroy');

    post('cart/update/{id}','FrontEnd\CartController@update');

    get('cart/order', 'FrontEnd\CartController@order');
    post('cart/order', 'FrontEnd\CartController@saveOrder');

    post('comment/post/{id}', 'FrontEnd\CommentController@saveComment');
});

Route::get('thanksOrder', function () {
    return view('users.pages.cartOrder');
});

