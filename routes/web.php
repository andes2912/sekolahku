<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// ======= FRONTEND ======= \\

Route::get('/','Frontend\IndexController@index');

    ///// MENU \\\\\
    //// PROGRAM STUDI \\\\
    Route::get('program/{slug}', [App\Http\Controllers\Frontend\ProgamController::class, 'programStudi']);

Auth::routes();


// ======= BACKEND ======= \\
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    ///// WEBSITE \\\\\
    Route::prefix('/')->group( function (){
        Route::resources([
            //// PROGRAM STUDI \\\\
            'program-studi' =>  Backend\Website\ProgramController::class
        ]);
            
    });
});