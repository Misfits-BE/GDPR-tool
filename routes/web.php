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

// Home routes 
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

// User management routes
Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/store', 'UsersController@store')->name('users.store');

// Account settings route
Route::get('/account-settings', 'Auth\SettingsController@index')->name('profile.settings');
Route::get('/account-settings/security', 'Auth\SettingsController@formSecurity')->name('profile.settings.security');
Route::patch('/account-settings/security', 'Auth\SettingsController@updateSecurity')->name('profile.settings.sec');
Route::patch('/account-settings/information', 'Auth\SettingsController@updateInformation')->name('profile.settings.info');
