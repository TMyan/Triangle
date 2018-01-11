<?php



Route::redirect('/', '/en/home');
Route::match(['get', 'post'],'/{lang}/home', 'StartController@index')->name('home');
Route::match(['get', 'post'],'/{lang}/about', 'AboutController@index')->name('about');
Route::match(['get', 'post'], '/{lang}/contacts', 'ContactController@index')->name('contact');
Route::match(['get', 'post'], '/{lang}/services', 'ServiceController@index')->name('service');

Route::prefix('/{lang}/products')->group(function () {
    Route::redirect('/', '/{lang}/products/phones');
    Route::match(['get', 'post'], '/phones/{manufacturer?}/{product_id?}', 'PhoneController@index')->name('phone');
    Route::match(['get', 'post'], '/computers/{manufacturer?}/{product_id?}', 'ComputerController@index')->name('computer');
    Route::match(['get', 'post'], '/tablets/{manufacturer?}/{product_id?}', 'TabletController@index')->name('tablet');
    Route::match(['get', 'post'], '/smart_watches/{manufacturer?}/{product_id?}', 'SmartWatchesController@index')->name('smartWatch');
    Route::match(['get', 'post'], '/accessories/{manufacturer?}/{product_id?}', 'AccessoriesController@index')->name('accessories');
});


Route::post('{lang}/navigation', 'NavigationController@index');
Route::post('{lang}/footer', 'FooterController@index');