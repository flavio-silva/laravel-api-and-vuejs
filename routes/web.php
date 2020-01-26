<?php
Auth::routes();

Route::get('/{any}', 'AppController@index')->where('any', '.*');

Route::get('/home', 'HomeController@index')->name('home');
