<?php



Route::redirect('/', '/en/home');
Route::match(['get', 'post'],'/{lang}/home', 'StartController@index')->name('home');
Route::match(['get', 'post'],'/{lang}/about', 'AboutController@index')->name('about');
Route::match(['get', 'post'], '/{lang}/contacts', 'ContactController@index')->name('contact');
Route::match(['get', 'post'], '/{lang}/services', 'ServiceController@index')->name('service');

Route::prefix('/{lang}/products')->group(function () {
    Route::redirect('/', '/{lang}/products/phones');
    Route::match(['get', 'post'], '/phones/{product_id?}', 'PhoneController@index')->name('phone');
    Route::match(['get', 'post'], '/computers/{product_id?}', 'ComputerController@index')->name('computer');
    Route::match(['get', 'post'], '/tablets/{product_id?}', 'TabletController@index')->name('tablet');
    Route::match(['get', 'post'], '/smartWatches/{product_id?}', 'SmartWatchesController@index')->name('smartWatch');
    Route::match(['get', 'post'], '/accessories/{product_id?}', 'AccessoriesController@index')->name('accessories');
});


Route::post('{lang}/navigation', 'NavigationController@index');
Route::post('{lang}/footer', 'FooterController@index');