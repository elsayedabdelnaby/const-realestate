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
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::get('/', 'Front\HomeController@index')->name('front.index'); // end of welcome

    Route::get('/agencies', 'Front\AgencyController@index')->name('front.agencies.index');
    Route::get('/agency/{id}', 'Front\AgencyController@show')->name('front.agencies.show');

    Route::get('/properties', 'Front\PropertyController@index')->name('front.properties.index');
    Route::get('/property/{id}', 'Front\PropertyController@show')->name('front.properties.show');

    Route::get('/blogs', 'Front\BlogController@index')->name('front.blogs.index');
    Route::get('/blog/{id}', 'Front\BlogController@show')->name('front.blogs.show');

});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
