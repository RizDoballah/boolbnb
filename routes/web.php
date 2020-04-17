<?php

use Illuminate\Support\Facades\Route;



Route::namespace('Host')->middleware('auth')->group(function () {

  Route::resource('host', 'ApartmentController');

});





// AUTENTICAZIONE
Auth::routes();
// HOME
Route::get('/home', 'HomeController@index')->name('home');
// APPARTAMENTO
Route::get('/', 'ApartmentController@index')->name('home');
Route::get('/{id}', 'ApartmentController@show')->name('home.show');
// RICERCA APPARTAMENTI
Route::post('/apartment/search', 'SearchApartmentController@index')->name('apartment.search');
