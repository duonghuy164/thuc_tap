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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'system-admin', 'namespace' => 'Admin' , 'middleware' => ['web','auth'] ], function () {
  
  Route::get('/', 'DashboardController@index')->name('system_admin.dashboard');
  Route::get('mails', 'MailController@index')->name('system_admin.email.index');
  /*
    Pagw Routes
  */
  Route::get('page','PageController@index')->name('system_admin.page.index');
  Route::get('page/create','PageController@create')->name('system_admin.page.create');
  Route::post('page/store','PageController@store')->name('system_admin.page.store');
  Route::get('page/{id}/edit', 'PageController@edit')->name('system_admin.page.edit');
  Route::put('page/{id}/update', 'PageController@update')->name('system_admin.page.update');
  Route::delete('page/destroy', 'PageController@destroy')->name('system_admin.page.destroy');
  Route::delete('page/destroyAll', 'PageController@destroyAll')->name('system_admin.page.destroyAll');
  Route::post('page/restore', 'PageController@restore')->name('system_admin.page.restore');

  /*
  |--------------------------------------------------------------------------
  | Post Routes
  |--------------------------------------------------------------------------
  */
  Route::get('posts', 'PostController@index')->name('system_admin.post.index');
  Route::get('posts/create', 'PostController@create')->name('system_admin.post.create');
  Route::post('posts/store', 'PostController@store')->name('system_admin.post.store');
  Route::get('posts/{id}/edit', 'PostController@edit')->name('system_admin.post.edit');
  Route::put('posts/{id}', 'PostController@update')->name('system_admin.post.update');
  Route::delete('posts/destroy', 'PostController@destroy')->name('system_admin.post.destroy');
  Route::delete('posts/destroyAll', 'PostController@destroyAll')->name('system_admin.post.destroyAll');
  Route::post('posts/restore', 'PostController@restore')->name('system_admin.post.restore');
  /*
  |--------------------------------------------------------------------------
  | Category (Post) Routes
  |--------------------------------------------------------------------------
  */
  Route::get('category', 'CategoryController@index')->name('system_admin.category.index');
  Route::get('category/create', 'CategoryController@create')->name('system_admin.category.create');
  Route::post('category/store', 'CategoryController@store')->name('system_admin.category.store');
  Route::get('category/{id}/edit', 'CategoryController@edit')->name('system_admin.category.edit');
  Route::put('category/{id}', 'CategoryController@update')->name('system_admin.category.update');
  Route::delete('category/destroy', 'CategoryController@destroy')->name('system_admin.category.destroy');
  Route::delete('category/destroyAll', 'CategoryController@destroyAll')->name('system_admin.category.destroyAll');
  Route::post('category/restore', 'CategoryController@restore')->name('system_admin.category.restore');
  // Timekeeping
  Route::get('timekeeping', 'TimekeepingController@index')->name('system_admin.timekeeping.index');
  Route::get('timekeeping/search', 'TimekeepingController@search')->name('system_admin.timekeeping.search');
  Route::get('timekeeping/export', 'ExportAdminController@export')->name('system_admin.timekeeping.export');

  //Staffs
  Route::get('staffs', 'StaffController@index')->name('system_admin.staffs.index');
  Route::get('staffs/create', 'StaffController@create')->name('system_admin.staffs.create');
  Route::post('staffs/store', 'StaffController@store')->name('system_admin.staffs.store');
  Route::get('staffs/{id}/edit', 'StaffController@edit')->name('system_admin.staffs.edit');
  Route::put('staffs/{id}', 'StaffController@update')->name('system_admin.staffs.update');

});