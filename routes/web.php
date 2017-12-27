<?php



Route::redirect('/', '/en/home');
Route::get('/{lang?}/home', 'StartController@index')->name('home');
Route::get('/{lang?}/about', 'AboutController@index')->name('about');
Route::match(['get', 'post'], '/{lang?}/contacts', 'ContactController@index')->name('contact');
Route::match(['get', 'post'], '/{lang?}/services', 'ServiceController@index')->name('service');

Route::prefix('/{lang?}/products')->group(function () {
    Route::match(['get', 'post'], '/{manufacturer}', 'ManufacturerController@index')->name('manufacturer');
    Route::match(['get', 'post'], '/{category}', 'CategoryController@index')->name('category');
    Route::prefix('/{manufacturer}')->group(function () {
        Route::match(['get', 'post'], '/phones', 'PhoneController@index')->name('phone');
        Route::match(['get', 'post'], '/computers', 'ComputerController@index')->name('computer');
        Route::match(['get', 'post'], '/tablets', 'TabletController@index')->name('tablet');
        Route::match(['get', 'post'], '/smart_watches', 'SmartWatchesController@index')->name('smartWatch');
        Route::match(['get', 'post'], '/accessories', 'AccessoriesController@index')->name('accessories');
    });
});



Route::get('{lang?}/navigation', 'NavigationController@index');
Route::get('{lang?}/footer', 'FooterController@index');