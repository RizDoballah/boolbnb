<?php

use Illuminate\Support\Facades\Route;



Route::resource('host', 'ApartmentController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'ApartmentController@index')->name('home');
Route::get('/{id}', 'ApartmentController@show')->name('home.show');
