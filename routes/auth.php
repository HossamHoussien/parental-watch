<?php

Route::domain('parent.parents.test')->namespace('App\Http\Controllers\Parent\Auth')->name('parent.')->group(function () {
    
    // Authentication routes
    Route::any('/logout', 'LoginController@logout')->name('logout');

    
    Route::get('/login', 'LoginController@showLoginForm')->name('login.get');
    Route::post('/login', 'LoginController@login')->name('login.post');


    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register.get');
    Route::post('/register', 'RegisterController@register')->name('register.post');

    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset,token');
});


Route::domain('tutor.parents.test')->namespace('App\Http\Controllers\Tutor\Auth')->name('tutor.')->group(function () {
    // Authentication routes
        Route::any('/logout', 'LoginController@logout')->name('logout');

    
    Route::get('/login', 'LoginController@showLoginForm')->name('login.get');
    Route::post('/login', 'LoginController@login')->name('login.post');


    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register.get');
    Route::post('/register', 'RegisterController@register')->name('register.post');

    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset,token');
});


Route::domain('nanny.parents.test')->namespace('App\Http\Controllers\Nanny\Auth')->name('nanny.')->group(function () {
    // Authentication routes
       Route::any('/logout', 'LoginController@logout')->name('logout');

    
    Route::get('/login', 'LoginController@showLoginForm')->name('login.get');
    Route::post('/login', 'LoginController@login')->name('login.post');


    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register.get');
    Route::post('/register', 'RegisterController@register')->name('register.post');

    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset,token');
});