<?php

Route::domain('parent.parents.test')->group(function () {
    
    Route::redirect('/', '/home', 301);
    Route::get('/home', 'HomeController')->name('home');
    Route::post('/hire', 'HireController@store')->name('hire');
    
    Route::post('/children/add', 'ChildrenController@store')->name('children.add');
    
    Route::view('/profile', 'parent.pages.profile')->name('profile');
    Route::view('/profile/edit', 'parent.pages.profile-edit')->name('profile.edit');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile/delete/{parent}', 'ProfileController@destroy')->name('profile.delete');


    Route::get('/nannies', 'SearchController@nannies')->name('search.nannies');
    Route::get('/nannies/profile/{user}', 'ProfileController@nanny')->name('profile.nanny');
    
    
    Route::get('/tutors', 'SearchController@tutors')->name('search.tutors');
    Route::get('/tutors/profile/{user}', 'ProfileController@tutor')->name('profile.tutor');

    Route::get('/requests/store', 'RequestController@store')->name('requests.store');

});