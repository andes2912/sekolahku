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

use Illuminate\Support\Facades\Route;

Route::prefix('spp')->middleware('role:Bendahara')->group(function() {
    Route::get('/', 'SPPController@index');

    Route::get('murid','SPPController@murid')->name('spp.murid.index');
    Route::get('murid/detail/{id}','SPPController@detail')->name('spp.murid.detail');
    Route::get('murid/update-pembayaran','SPPController@updatePembayaran')->name('spp.murid.update.pembayaran');
});
