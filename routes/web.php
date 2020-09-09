<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	//Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('user', 'UserController@index')->name('user.index');
	Route::get('user/create', 'UserController@create')->name('user.create');
	Route::post('user/store', 'UserController@store')->name('user.store');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	// Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	// Route::get('map', function () {return view('pages.maps');})->name('map');
	// Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	// Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	
	Route::get('calllogs','CalllogController@index')->name('calllog.index');
	Route::get('calllog/create','CalllogController@create')->name('calllog.create');
	Route::get('calllog/edit/{id}','CalllogController@edit')->name('calllog.edit');
	Route::post('calllog/store','CalllogController@store')->name('calllog.store');
	Route::post('calllog/update/{id}','CalllogController@update')->name('calllog.update');

	Route::get('companies','CompanyController@index')->name('company.index');
	Route::get('company/create','CompanyController@create')->name('company.create');
	Route::get('company/edit/{id}','CompanyController@edit')->name('company.edit');
	Route::post('company/store','CompanyController@store')->name('company.store');
	Route::post('company/update/{id}','CompanyController@update')->name('company.update');

});
