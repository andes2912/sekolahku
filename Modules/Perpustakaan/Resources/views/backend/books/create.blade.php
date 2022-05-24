@extends('layouts.backend.app')

@section('title')
   Tambah Buku
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Buku</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Tambah Buku</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{route('books.store')}} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Judul</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{old('name')}} " placeholder="Nama" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kategori</label> <span class="text-danger">*</span>
                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($category as $categorys)
                                              <option value=" {{$categorys->id}} "> {{$categorys->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Penerbit</label> <span class="text-danger">*</span>
                                        <select name="publisher_id" class="form-control @error('publisher_id') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($publisher as $publishers)
                                              <option value=" {{$publishers->id}} "> {{$publishers->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('publisher_id')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Penulis</label> <span class="text-danger">*</span>
                                        <select name="author_id" class="form-control @error('author_id') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($author as $authors)
                                              <option value=" {{$authors->id}} "> {{$authors->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('author_id')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tahun Terbit</label>  <span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('publication_year') is-invalid @enderror" name="publication_year"/>
                                        @error('publication_year')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nomor ISBN</label>  <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn"/>
                                        @error('isbn')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Stok</label>  <span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock"/>
                                        @error('stock')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Thumbnail</label>  <span class="text-danger">*</span>
                                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail"/>
                                        @error('thumbnail')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>  <span class="text-danger">*</span>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3"></textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div

                            </div>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <a href="{{route('books.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection