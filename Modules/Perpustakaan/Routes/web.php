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

Route::prefix('perpustakaan')->group(function() {
    Route::get('/', 'PerpustakaanController@index');
});

Route::prefix('perpus')->middleware('role:Perpustakaan')->group(function() {
  Route::resources([
    // Books
    '/books'  => BooksController::class,

    // Publisher
    '/publisher'  => PublisherController::class,

    // Author
    '/author' => AuthorController::class,

    // Kategori
    '/kategori' => CategoryController::class,

    // Peminjam
    '/peminjam' => PeminjamController::class,

    // Member
    '/member' => MemberController::class
  ]);
  Route::get('/update-peminjam','PeminjamController@updates'); // Update Peminjam Buku
  Route::get('/history-peminjam','PeminjamController@history'); // History Peminjam Buku

});
