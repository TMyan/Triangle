<?php




Route::post('/{lang?}/home', 'StartController@index')->name('home');
Route::post('/{lang?}/about', 'AboutController@index')->name('about');
Route::post('/{lang?}/contacts', 'ContactController@index')->name('contact');
Route::post('/{lang?}/services', 'ServiceController@index')->name('service');

Route::prefix('/{lang?}/products')->group(function () {
    Route::post('/{manufacturer}', 'ManufacturerController@index')->name('manufacturer');
    Route::post('/{category}', 'CategoryController@index')->name('category');
    Route::prefix('/{manufacturer}')->group(function () {
        Route::post('/phones', 'PhoneController@index')->name('phone');
        Route::post('/computers', 'ComputerController@index')->name('computer');
        Route::post('/tablets', 'TabletController@index')->name('tablet');
        Route::post('/smart_watches', 'SmartWatchesController@index')->name('smartWatch');
        Route::post('/accessories', 'AccessoriesController@index')->name('accessories');
    });
});
