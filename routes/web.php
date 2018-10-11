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

//Route::get('/', function () {
//    return view('welcome');
//});

///Login Route
Route::get('/','LoginController@index')->name('loginview');
Route::get('/Signup','LoginController@Signupview')->name('Sighup');
Route::post('/register','LoginController@Signup')->name('register');
Route::post('/Login','LoginController@Login')->name('login');

// Customer Route
Route::get('/Customer','CustomerController@customer_form')->name('Addcustomer');
Route::post('/insert-Customer','CustomerController@insert_customer')->name('insertcustomer');








//Api Route

Route::post('/login_account','ApiController@loginaccount');
Route::get('/get_all_customer','ApiController@get_all_customer');
Route::get('/get_all_collector','ApiController@get_all_collector');
Route::post('/get_customer_by_collector_id','ApiController@get_customer_by_collector_id');


