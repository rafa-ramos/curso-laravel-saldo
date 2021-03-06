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

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'],function(){
    Route::get('/', 'AdminController@index')->name('admin.home');

    //BALANCE
    Route::get('balance', 'BalanceController@index')->name('admin.balance');
    Route::get('deposit', 'BalanceController@deposit')->name('admin.deposit');
    Route::post('deposit', 'BalanceController@depositStore')->name('admin.store');

});
Route::get('/', 'Site\SiteController@index')->name('home');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
