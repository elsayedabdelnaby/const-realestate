<?php

define('PAGINATION_COUNT', 10);

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function (){
        Route::get('/', 'AdminController@index')->name('index');
        /* users routes */
        Route::resource('/users', 'UserController')->except('show');
        /* features routes */
        Route::resource('/features', 'FeatureController')->except('show');
        /* property types routes */
        Route::resource('/property_types', 'PropertyTypeController')->except('show');
        /* property status routes */
        Route::resource('/property_statuses', 'PropertyStatusController')->except('show');
        /* currencies routes */
        Route::resource('/currencies', 'CurrencyController')->except('show');
        /* agencies routes */
        Route::resource('/agencies', 'AgencyController');
        /* countries routes */
        Route::resource('/countries', 'CountryController')->except('show');
        /* cities routes */
        Route::resource('/cities', 'CityController')->except('show');
        /* properties routes */
        Route::resource('/properties', 'PropertyController')->except('show');
        Route::get('/property/{id}/features', 'PropertyController@getFeatures')->name('property.feature');
        Route::post('/property/{id}/features/store', 'PropertyController@postFeatures')->name('property.feature.store');

        /* blogs routes */
        Route::resource('/blogs', 'BlogController')->except('show');

        /** Parnters */
        Route::resource('partners', 'PartnerController');
        
        /* tags routes */
        Route::resource('/tags', 'TagController')->except('show');

        /* categories routes */
        Route::resource('/categories', 'CategoryController')->except('show');

        /* Concat Us Info Routes */
        Route::get('contact_us_info/{id}', 'ContactUsInfoController@edit')->name('contactusinfo.edit');
        Route::put('contact_us_info/{id}', 'ContactUsInfoController@update')->name('contactusinfo.update');

        /* Site Settings Routes */
        Route::get('site_settings/{id}', 'SiteSettingController@edit')->name('sitesettings.edit');
        Route::put('site_settings/{id}', 'SiteSettingController@update')->name('sitesettings.update');

        /**Why Choose Us Routes */
        Route::resource('/whychooseus', 'WhyChooseUsController')->except('show');

    });
});
