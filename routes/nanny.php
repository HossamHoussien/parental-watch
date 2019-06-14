<?php

Route::domain('nanny.parents.test')->group(function () {
    

    Route::redirect('/', '/home', 301);
    
    Route::view('/home', 'nanny.home')->name('home');

    Route::get('/profile/{user}', 'ProfileController@show')->name('profile');
    Route::post('/profile/update/{user}', 'ProfileController@update')->name('profile.update');
    Route::get('/profile/edit/{user}', 'ProfileController@edit')->name('profile.edit');
    Route::delete('/profile/delete/{user}', 'ProfileController@destroy')->name('profile.delete');

    Route::get('/requests', 'RequestController@index')->name('requests.index');
    Route::get('/requests/accept/{id}', 'RequestController@accept')->name('requests.accept');
    Route::get('/requests/decline/{id}', 'RequestController@decline')->name('requests.decline');


});