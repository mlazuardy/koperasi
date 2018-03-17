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

// user Loan
Route::get('/users','UserController@index');
//
Route::resource('blog','BlogController');

Route::group(['middleware' => ['auth']], function () {
    //Tampilkan seluruh pinjaman
    Route::get('loan', 'LoanController@index');
    //
    Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
    Route::resource('costumer', 'CostumerController');
    Route::post('costumer/search','CostumerController@searchCostumer');
    Route::get('costumer/{costumer}/create', 'LoanController@create');//buat pinjaman baru
    Route::post('costumer/{costumer}/create', 'LoanController@store');//simpan pinjaman baru
    Route::get('costumer/{costumer}/{loan}', 'LoanController@show');//tampilkan data pinjaman anggota
    Route::get('costumer/{costumer}/{loan}/print', 'LoanController@loanPrint');
    Route::get('costumer/{costumer}/{loan}/create', 'PaymentController@create');
    Route::get('costumer/{costumer}/{loan}/{payment}', 'PaymentController@show');
    Route::post('costumer/{costumer}/{loan}', 'PaymentController@store');
    Route::get('costumer/{costumer}/{loan}/{payment}/edit','PaymentController@edit');
    Route::patch('costumer/{costumer}/{loan}/{payment}','PaymentController@update');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
