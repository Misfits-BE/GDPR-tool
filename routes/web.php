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

// Domain routes
Route::get('/domains', 'DomainController@index')->name('domains.index');
Route::get('/domains/create', 'DomainController@create')->name('domains.create');
Route::post('/domains/create', 'DomainController@store')->name('domains.store');

// Concern routes 
Route::get('/concerns', 'ConcernController@index')->name('concern.index');
Route::get('/concerns/create', 'ConcernController@create')->name('concern.create');
Route::post('/concerns/create', 'ConcernController@store')->name('concern.store');

// Support Routes
Route::get('support', 'SupportController@index')->name('support.index');

// Privacy Category routes 
Route::get('/categories', 'Categories\CategoryController@index')->name('privacy.categories.index');
Route::get('/categories/create', 'Categories\CategoryController@create')->name('categories.create');
Route::post('/categories/store', 'Categories\CategoryController@store')->name('categories.store');

// API keys routes
Route::get('/account-settings/api', 'ApiKeysController@index')->name('apikeys.index');
Route::get('/api-tokens-delete/{id}', 'ApiKeysController@destroy')->name('apikeys.delete');
Route::get('/api-tokens-regenerate/{id}', 'ApiKeysController@regenerate')->name('apikeys.regenerate');
Route::get('/api-tokens/undo/{id}', 'ApiKeysController@undo')->name('apikeys.undo');
Route::post('/api-tokens-store', 'ApiKeysController@store')->name('apikeys.store');

// Account settings route
Route::get('/account-settings', 'Auth\SettingsController@index')->name('profile.settings');
Route::get('/account-settings/security', 'Auth\SettingsController@formSecurity')->name('profile.settings.security');
Route::patch('/account-settings/security', 'Auth\SettingsController@updateSecurity')->name('profile.settings.sec');
Route::patch('/account-settings/information', 'Auth\SettingsController@updateInformation')->name('profile.settings.info');
