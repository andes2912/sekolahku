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

Route::prefix('ppdb')->group(function() {
    Route::get('/', 'PPDBController@index');

    /// REGISTER \\\
    Route::get('/register','AuthController@registerView')->name('register');
    Route::post('/register','AuthController@registerStore')->name('register.store');
});
