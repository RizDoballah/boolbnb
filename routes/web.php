<?php

use Illuminate\Support\Facades\Route;



Route::namespace('Host')
->middleware('auth')
->group(function () {
  Route::resource('host', 'ApartmentController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'ApartmentController@index')->name('home');
Route::get('/{id}', 'ApartmentController@show')->name('home.show');
