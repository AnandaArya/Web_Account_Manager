<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts/auth');
});


Route::get('/login', function () {
    return view('layouts/auth');
})->name('login');

// Route::get('/home', function() {
//     return view('layouts/main');
// });



Route::post('/postlogin', 'LoginController@postLogin')->name('postlogin');
Route::get('/daftar', 'LoginController@daftar');
Route::post('/daftar/store', 'LoginController@store');
Route::get('/logout', 'LoginController@logout')->name('logout');


// Authentikasi Login
Route::group(['middleware' => ['auth', 'CekLevel:user']], function () {
    Route::get('/home', 'LoginController@index');
    Route::get('/profiles', 'ProfilesController@index');
    

    // emails Route
    Route::get('/emails', 'EmailsController@index');
    Route::get('/emails/create', 'EmailsController@create');
    Route::post('/emails/store', 'EmailsController@store');
    Route::get('/emails/{email}/edit', 'EmailsController@edit');
    Route::get('/emails/{email}/detail', 'EmailsController@show');
    Route::put('/emails/{email}', 'EmailsController@update');
    Route::delete('/emails/{email}', 'EmailsController@destroy');
    Route::get('/emails/search', 'EmailsController@search');
    
    
    // Games Route
    Route::get('/games', 'GamesController@index');
    Route::get('/games/create', 'GamesController@create');
    Route::post('/games/store', 'GamesController@store');
    Route::get('/games/{game}/edit', 'GamesController@edit');
    Route::get('/games/{game}/detail', 'GamesController@show');
    Route::put('/games/{game}', 'GamesController@update');
    Route::delete('/games/{game}', 'GamesController@destroy');
    Route::get('/games/search', 'GamesController@search');
    
    
    // Webs Route
    Route::get('/webs', 'WebsController@index');
    Route::get('/webs/create', 'WebsController@create');
    Route::post('/webs/store', 'WebsController@store');
    Route::get('/webs/{web}/edit', 'WebsController@edit');
    Route::get('/webs/{web}/detail', 'WebsController@show');
    Route::put('/webs/{web}', 'WebsController@update');
    Route::delete('/webs/{web}', 'WebsController@destroy');
    Route::get('/webs/search', 'WebsController@search');
}); 


