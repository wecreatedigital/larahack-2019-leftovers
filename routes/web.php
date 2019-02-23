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
Route::get('/search/results', 'SearchController@getResults')->name('results');

Route::group(['middlewareGroups' => ['web', 'auth']], function () {

    /*
    |--------------------------------------------------------------------------
    | Profile Settings
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/settings', 'ProfileController@settings')->name('settings');

    // Profile functionality
    Route::post('/update-profile-settings', 'Auth\SettingsController@updateProfileSettings')->name('updateProfileSettings');
    Route::post('/update-basic-settings', 'Auth\SettingsController@updateBasicSettings')->name('updateBasicSettings');
    Route::post('/update-contact-settings', 'Auth\SettingsController@updateContactSettings')->name('updateContactSettings');
    Route::post('/update-security-settings', 'Auth\SettingsController@updateSecuritySettings')->name('updateSecuritySettings');
    Route::post('/update-avatar-settings', 'Auth\SettingsController@updateAvatarSettings')->name('updateAvatarSettings');
});

Auth::routes();
