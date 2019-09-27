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

// Route::get('/', function () {
//     return view('home');
// });

Route::resource('contact','ContactController');
Route::get('/allcontact','ContactController@allcontact');
Route::get('/','CustomerController@home');
Route::post('add/customer/data','CustomerController@add');
Route::get('get/customer/data','CustomerController@getdata');
Route::get('view/customer/data','CustomerController@viewdata');
Route::get('delete/customer/data','CustomerController@deletedata');
Route::get('edit/customer/data','CustomerController@editdata');
Route::post('update/customer/data','CustomerController@updatedata');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
