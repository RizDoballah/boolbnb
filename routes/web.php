<?php

use Illuminate\Support\Facades\Route;



Route::namespace('Host')->middleware('auth')->group(function () {

    //Sponsorship
    Route::get('/host/sponsorships', 'SponsorshipController@index')->name('sponsorships.index');
    
    Route::resource('host', 'ApartmentController');

    

});



// AUTENTICAZIONE
Auth::routes();

// Messaggi
Route::get('/messages', 'MessageController@index')->name('messages.index');


// HOME
Route::get('/home', 'HomeController@index')->name('home');

// APPARTAMENTO
Route::get('/', 'ApartmentController@index')->name('home');
Route::get('/{id}', 'ApartmentController@show')->name('home.show');

// RICERCA APPARTAMENTI
Route::post('/apartment/search', 'SearchApartmentController@index')->name('apartment.search');

// Filtra appartamenti
Route::get('/apartment/search', 'SearchApartmentController@filter')->name('apartment.filter');



