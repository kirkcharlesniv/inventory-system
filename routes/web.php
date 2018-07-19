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


Route::group(['middleware' => 'auth'], function() {
    Route::get('home', 'DashboardController@index')->name('home');

    Route::get('home/borrow/search', 'BorrowsController@search')->name('search');
    Route::get('home/borrow/employeerecords', 'BorrowsController@employeerecords')->name('search');
    Route::get('home/borrow/employeenames', 'BorrowsController@employeenames')->name('name_search');
    Route::get('home/items/decrement', 'ItemsController@decrement')->name('decrement');

    Route::resource('home/employees', 'EmployeesController');
    Route::resource('home/borrow', 'BorrowsController');
    Route::resource('home/items', 'ItemsController');

    Route::get('home/export', 'DashboardController@download');
});