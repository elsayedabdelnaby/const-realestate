<?php

use App\Http\Middleware\FrontEnd;
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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [FrontEnd::class, 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/', 'Front\HomeController@index')->name('front.index'); // end of welcome

    Route::get('/agencies', 'Front\AgencyController@index')->name('front.agencies.index');
    Route::get('/agency/{id}', 'Front\AgencyController@show')->name('front.agencies.show');

    Route::get('/properties', 'Front\PropertyController@index')->name('front.properties.index');
    Route::get('/property/{slug}', 'Front\PropertyController@show')->name('front.properties.show');
    Route::get('/cities/{id}', 'Front\CityController@show')->name('front.city.show');

    Route::get('/projects', 'Front\ProjectController@index')->name('front.projects.index');
    Route::get('/project/{id}', 'Front\ProjectController@show')->name('front.projects.show');

    Route::get('/blogs', 'Front\BlogController@index')->name('front.blogs.index');
    Route::get('/blogs/{slug}', 'Front\BlogController@show')->name('front.blogs.show');
    Route::get('/contact-us', 'Front\ContactUsController@create')->name('front.create.contact-us');
    Route::post('/contact-us', 'Front\ContactUsController@store')->name('front.store.contact-us');

    Route::post('/subscriber', 'Front\HomeController@addSubscriber')->name('front.subscriber.create');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
