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
//Route::get('/', 'HomeController@index')->name('home');

Route::get('admin-login','Admin\LoginController@index')->name('admin.login');
Route::post('admin-handle-login','Admin\LoginController@handleLogin')->name('admin.handle.login');

Route::group(['prefix' => 'system-admin', 'namespace' => 'Admin' , 'middleware' => ['web'] ], function () {
  
  Route::get('/', 'DashboardController@index')->name('system_admin.dashboard');
  Route::get('mails', 'MailController@index')->name('system_admin.email.index');
  /*
    Pagw Routes
  */
  Route::get('staffs', 'StaffController@index')->name('system_admin.staffs.index');
  Route::get('staffs/create', 'StaffController@create')->name('system_admin.staffs.create');
  Route::post('staffs/store', 'StaffController@store')->name('system_admin.staffs.store');
  Route::get('staffs/{id}/edit', 'StaffController@edit')->name('system_admin.staffs.edit');
  Route::put('staffs/{id}', 'StaffController@update')->name('system_admin.staffs.update');

});


 /*
  |--------------------------------------------------------------------------
  | User
  |--------------------------------------------------------------------------
  */

  Route::get('login','LoginController@login')->name('login');
  //Route::post('handle-login','LoginController@handleLogin')->name('handle.login');

