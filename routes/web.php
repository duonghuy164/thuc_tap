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
 Route::get('/', 'HomeController@index')->name('home');

Route::get('admin-login','Admin\LoginController@index')->name('admin.login');
Route::post('admin-handle-login','Admin\LoginController@handleLogin')->name('admin.handle.login');

Route::post('images-delete','HomeController@deleteImage')->name('images-delete');
Route::post('images-save','HomeController@saveImage')->name('images-save');



Route::group(['prefix' => 'system-admin', 'namespace' => 'Admin' , 'middleware' => 'adminLogin' ], function () {
  
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

  /*
  |--------------------------------------------------------------------------
  | Category
  |--------------------------------------------------------------------------
  */

  Route::get('category','CategoryController@index')->name('system_admin.category.index');
  Route::get('category/create','CategoryController@create')->name('system_admin.category.create');
  Route::get('category/edit/{id}','CategoryController@edit')->name('system_admin.category.edit');
  Route::put('category/update/{id}','CategoryController@update')->name('system_admin.category.update');
  Route::post('category/store','CategoryController@store')->name('system_admin.category.store');
  Route::delete('category/destroy','CategoryController@destroy')->name('system_admin.category.destroy');
  Route::delete('category/destroyAll','CategoryController@destroyAll')->name('system_admin.category.destroyAll');
  Route::post('category/restory','CategoryController@restore')->name('system_admin.category.restory');


  /*
  |--------------------------------------------------------------------------
  | Color
  |--------------------------------------------------------------------------
  */

  Route::get('color','ColorController@index')->name('system_admin.color.index');
  Route::get('color/create','ColorController@create')->name('system_admin.color.create');
  Route::post('color/store','ColorController@store')->name('system_admin.color.store');
  Route::get('color/edit/{id}','ColorController@edit')->name('system_admin.color.edit');
  Route::put('color/update/{id}','ColorController@update')->name('system_admin.color.update');

  /*
  |--------------------------------------------------------------------------
  | Brand
  |--------------------------------------------------------------------------
  */

  Route::get('brand','BrandController@index')->name('system_admin.brand.index');
  Route::get('brand/create','BrandController@create')->name('system_admin.brand.create');
  Route::post('brand/store','BrandController@store')->name('system_admin.brand.store');

  /*
  |--------------------------------------------------------------------------
  | CPU
  |--------------------------------------------------------------------------
  */

  Route::get('cpu','CpuController@index')->name('system_admin.cpu.index');
  Route::get('cpu/create','CpuController@create')->name('system_admin.cpu.create');
  Route::post('cpu/store','CpuController@store')->name('system_admin.cpu.store');

  /*
  |--------------------------------------------------------------------------
  | Hard Driver
  |--------------------------------------------------------------------------
  */

  Route::get('hard','HardController@index')->name('system_admin.hard.index');
  Route::get('hard/create','HardController@create')->name('system_admin.hard.create');
  Route::post('hard/store','HardController@store')->name('system_admin.hard.store');

  /*
  |--------------------------------------------------------------------------
  | Product
  |--------------------------------------------------------------------------
  */

  Route::get('product','ProductController@index')->name('system_admin.product.index');
  Route::get('product/create','ProductController@create')->name('system_admin.product.create');
  Route::post('product/store','ProductController@store')->name('system_admin.product.store');

  /*
  |--------------------------------------------------------------------------
  | Ram
  |--------------------------------------------------------------------------
  */

  Route::get('ram','RamController@index')->name('system_admin.ram.index');
  Route::get('ram/create','RamController@create')->name('system_admin.ram.create');
  Route::post('ram/store','RamController@store')->name('system_admin.ram.store');

  /*
  |--------------------------------------------------------------------------
  | Ram
  |--------------------------------------------------------------------------
  */

  Route::get('screen','ScreenController@index')->name('system_admin.screen.index');
  Route::get('screen/create','ScreenController@create')->name('system_admin.screen.create');
  Route::post('screen/store','ScreenController@store')->name('system_admin.screen.store');

  /*
  |--------------------------------------------------------------------------
  | Ram
  |--------------------------------------------------------------------------
  */

  Route::get('price','PriceController@index')->name('system_admin.price.index');
  Route::get('price/create','PriceController@create')->name('system_admin.price.create');
  Route::post('price/store','PriceController@store')->name('system_admin.price.store');
});


 /*
  |--------------------------------------------------------------------------
  | User
  |--------------------------------------------------------------------------
  */

  Route::get('login','LoginController@login')->name('login');
  Route::post('handle-login','LoginController@handleLogin')->name('handle.login');

  Route::get('register','LoginController@register')->name('register');
  Route::post('register','LoginController@handleRegister')->name('handle.register');

  Route::get('verification/{$id}','LoginController@verification')->name('verification.res');

  Route::get('check-code/{email}','LoginController@codeMail')->name('code.mail');

  Route::post('handle-code-mail','LoginController@handleCode')->name('handle.code');

  Route::get('forget/password','LoginController@forget')->name('forget.pass');

  Route::post('handle/forget/password','LoginController@handleForget')->name('handle.forget.pass');

  Route::get('confirm/mail/{id}','LoginController@confirmMail')->name('confirm.mail');
  Route::post('handle/confirm/mail','LoginController@hanldeConfirmMail')->name('handle.confirm.mail');