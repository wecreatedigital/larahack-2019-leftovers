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
Route::get('/about', 'HomeController@index')->name('about');
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

    //Recipes
    Route::get('/my-recipes', 'RecipeController@index')->name('my-recipes');
    Route::get('/add-recipe', 'RecipeController@create')->name('add-recipe');
    Route::post('/recipes-store', 'RecipeController@store');
    Route::get('/recipe/{id}/edit', 'RecipeController@edit');
    Route::post('/recipe/{id}/update', 'RecipeController@update');
    Route::get('/recipe/{id}/delete', 'RecipeController@destroy');
    Route::get('/recipes/{recipe}', 'RecipeController@show');
});

Auth::routes();
