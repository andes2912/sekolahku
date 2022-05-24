@extends('layouts.backend.app')

@section('title')
   Tambah Peminjam
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Peminjam</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Tambah Peminjam</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{route('peminjam.store')}} " method="post">
                            @csrf
                            <div class="row">
                              <div div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Judul / Kode Buku</label> <span class="text-danger">*</span>
                                        <select name="book_id" class="select2 form-control @error('book_id') is-invalid @enderror" required>
                                          <option value="">-- Pilih --</option>
                                          @foreach ($book as $books)
                                            <option value="{{$books->id}}" {{old('book_id') == $books->id ? 'selected' : ''}} > {{$books->name}} </option>
                                          @endforeach
                                        </select>
                                        @error('book_id')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Peminjam</label>  <span class="text-danger">*</span>
                                        <select name="member_id" class="select2 form-control @error('member_id') is-invalid @enderror" required>
                                          <option value="">-- Pilih --</option>
                                          @foreach ($member as $members)
                                            <option value="{{$members->id}}" {{old('member_id') == $members->id ? 'selected' : ''}} > {{$members->name}} </option>
                                          @endforeach
                                        </select>
                                        @error('member_id')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Pinjam</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control flatpickr-basic @error('borrow_date') is-invalid @enderror" id="fp-default" name="borrow_date" value=" {{old('borrow_date')}} " placeholder="Nama" />
                                        @error('borrow_date')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Kembali</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control flatpickr-basic @error('return_date') is-invalid @enderror" id="fp-default" name="return_date" value=" {{old('return_date')}} " placeholder="Nama" />
                                        @error('return_date')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <a href="{{route('peminjam.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection