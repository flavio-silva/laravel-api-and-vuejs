<?php

Route::get('/{any}', 'AppController@index')->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
