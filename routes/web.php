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
Route::get('/Customer_table','CustomerController@Show_customer')->name('Show_customer');
Route::get('/Customer_delete/{id}','CustomerController@customer_delete')->name('customer_delete');
Route::get('/Customer_Edit/{id}','CustomerController@customer_Edit');
Route::post('/Edit-Customer/{id}','CustomerController@Edit_customer_db')->name('Edit_customer_db');


//collector

Route::get('/Collector','CollectorController@collector_form')->name('Addcollector');
Route::post('/insert-Collector','CollectorController@insert_collector')->name('insertcollector');
Route::get('/Collector_table','CollectorController@Show_collector')->name('Show_collector');
Route::get('/Collector_table','CollectorController@Show_collector')->name('Show_collector');
Route::get('/Collector_delete/{id}','CollectorController@collector_delete')->name('collector_delete');
Route::get('/Collector_Edit/{id}','CollectorController@collector_Edit');
Route::post('/Edit-Collector/{id}','CollectorController@Edit_collector_db')->name('Edit_collector_db');













//Api Route

Route::post('/login_account','ApiController@loginaccount');
Route::get('/get_all_customer','ApiController@get_all_customer');
Route::get('/get_all_collector','ApiController@get_all_collector');
Route::post('/get_customer_by_collector_id','ApiController@get_customer_by_collector_id');
Route::post('/update_customer_by_collector_id','ApiController@update_customer_by_collector_id');
Route::post('/get_all_customer_by_collector_id','ApiController@get_all_customer_by_collector_id');


