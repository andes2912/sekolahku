<?php

namespace Modules\Perpustakaan\Http\Controllers;

use App\Helpers\GlobalHelpers;
use Carbon\Carbon;
use ErrorException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Perpustakaan\Entities\Author;
use Modules\Perpustakaan\Entities\Book;
use Modules\Perpustakaan\Entities\Category;
use Modules\Perpustakaan\Entities\Publisher;
use Modules\Perpustakaan\Http\Requests\BookRequest;

class BooksController extends Controller
{

  use GlobalHelpers;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $book = Book::with('publisher','author','category')->get();
        return view('perpustakaan::backend.books.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $publisher  = Publisher::get();
        $author     = Author::get();
        $category   = Category::get();
        if (empty($publisher) || empty($author) || empty($category)) {
          Session::flash('error','Data Publisher, Author atau Category Buku Belum Ada!');
          return view('perpustakaan::backend.books.index');
        }
        Session::flash('success','Buku berhasil ditambah.');
        return view('perpustakaan::backend.books.create', compact('publisher','author','category'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BookRequest $request)
    {
      try {
        $thumbnail = $request->file('thumbnail');
        $thumbnail_name = time()."_".$thumbnail->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/images/thumbnail';
        $thumbnail->storeAs($tujuan_upload,$thumbnail_name);

        $book = new Book;
        $book->book_code        = $this->generateNumber($book);
        $book->name             = $request->name;
        $book->description      = $request->description;
        $book->category_id      = $request->category_id;
        $book->publisher_id     = $request->publisher_id;
        $book->author_id        = $request->author_id;
        $book->publication_year = Carbon::parse($request->publication_year)->format('Y');
        $book->isbn             = $request->isbn;
        $book->stock            = $request->stock;
        $book->thumbnail        = $thumbnail_name;
        $book->save();

        $book->book_code        = $this->generateNumber($book);
        $book->save();

        Session::flash('success','Buku Berhasil di tambah,');
        return redirect()->route('books.index');
      } catch (\ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('perpustakaan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('perpustakaan::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
