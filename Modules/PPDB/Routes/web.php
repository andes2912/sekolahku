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

//// ROLE GUEST \\\\
Route::prefix('/ppdb')->middleware('role:Guest')->group( function (){

    /// DATA MURID \\
    Route::get('form-pendaftaran','PendaftaranController@index')->name('ppdb.form-pendaftaran');
    Route::put('form-pendaftaran/{id}','PendaftaranController@update');


    /// DATA ORANG TUA \\
    Route::get('form-data-orangtua','PendaftaranController@dataOrtuView');
    Route::put('form-data-orangtua/{id}','PendaftaranController@updateOrtu');
});


//// ROLE PPDB \\\\
Route::prefix('/ppdb')->middleware('role:PPDB')->group( function (){


    /// DATA MURID \\\
    Route::resource('data-murid','DataMuridController');
});