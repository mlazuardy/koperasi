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


Auth::routes();


Route::get('/','HomeController@index')->name('home')->middleware('auth');
Route::resource('costumer','CostumerController');
Route::get('costumer/{costumer}/create','LoanController@create');//buat pinjaman baru
Route::post('costumer/{costumer}/create','LoanController@store');//simpan pinjaman baru
Route::get('costumer/{costumer}/{Loan}','LoanController@show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
