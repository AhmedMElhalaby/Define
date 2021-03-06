<?php

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

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login','AuthController@login');
    Route::post('singup','AuthController@register');
    Route::post('forget_password','AuthController@forget_password');
    Route::post('check_reset_code','AuthController@check_reset_code');
    Route::post('reset_password','AuthController@reset_password');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('me','AuthController@show');
        Route::post('refresh','AuthController@refresh');
        Route::post('update','AuthController@update');
        Route::get('resend_verify', 'AuthController@resend_verify');
        Route::post('verify', 'AuthController@verify');
        Route::post('change_password','AuthController@change_password');
        Route::post('logout','AuthController@logout');
    });
});
Route::group([
    'middleware' => 'auth:api'
], function() {
    Route::group([
        'prefix' => 'notifications',
    ], function() {
        Route::get('/', 'NotificationController@index');
        Route::post('send', 'NotificationController@send');
        Route::post('read', 'NotificationController@read');
        Route::post('read/all', 'NotificationController@read_all');
    });
    Route::group([
        'prefix' => 'tickets',
    ], function() {
        Route::get('/','TicketController@index');
        Route::post('store','TicketController@store');
        Route::get('show','TicketController@show');
        Route::post('response','TicketController@response');
    });
    Route::group([
        'prefix' => 'transactions',
    ], function() {
        Route::get('/', 'TransactionController@index');
        Route::get('my_balance', 'TransactionController@my_balance');
        Route::post('generate_checkout', 'TransactionController@generate_checkout');
        Route::get('check_payment', 'TransactionController@check_payment');
        Route::post('request_refund', 'TransactionController@request_refund');
    });
    Route::group([
        'prefix' => 'payments',
    ], function() {
        Route::post('add_payment', 'PaymentController@add_payment');
        Route::get('cards_list', 'PaymentController@cards_list');
        Route::get('has_payment', 'PaymentController@has_payment');
    });
    Route::group([
        'prefix' => 'orders'
    ], function (){
        Route::get('/','OrderController@index');
        Route::get('show','OrderController@show');
        Route::post('store','OrderController@store');
        Route::post('update', 'OrderController@update');
    });

    Route::group([
        'prefix' => 'location'
    ], function (){
        Route::get('/','UserLocationController@index');
        Route::get('show','UserLocationController@show');
        Route::post('store','UserLocationController@store');
        Route::post('update', 'UserLocationController@update');
    });


});
Route::group([
    'prefix' => 'products'
], function (){
    Route::get('/','ProductController@index');
    Route::get('show','ProductController@show');
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::post('review','ProductController@review');
        Route::post('toggle_favourite', 'ProductController@toggle_favourite');
    });
});
Route::group([
        'prefix' => 'home',
    ], function() {
    Route::get('install','HomeController@install');
    Route::get('faqs','HomeController@faqs');
    Route::get('advertisements','HomeController@advertisements');
    Route::get('categories','HomeController@categories');
});



