@extends('layouts.backend.app')

@section('title')
    Kategori Berita
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
                    <h2> Kategori Berita</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-7">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Kategori Berita <a href=" {{route('backend-berita.create')}} " class="btn btn-primary">Tambah</a> </h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                           @foreach ($kategori as $key => $kategoris)
                                               <tr>
                                                   <td></td>
                                                   <td> {{$key+1}} </td>
                                                   <td> {{$kategoris->nama}} </td>
                                                   <td> {{$kategoris->is_active == '0' ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                   <td>
                                                       <a href=" {{route('backend-kategori-berita.edit', $kategoris->id)}} " class="btn btn-success btn-sm">Edit</a>
                                                   </td>
                                               </tr>
                                           @endforeach
                                        </tbody>                                   
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card">
                                <div class="card-header header-bottom">
                                    <h4>Tambah Kategori Berita</h4>
                                </div>
                                <div class="card-body">
                                    <form action=" {{route('backend-kategori-berita.store')}} " method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Nama </label> <span class="text-danger">*</span>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value=" {{old('nama')}} "/>
                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Status </label> <span class="text-danger">*</span>
                                                    <select name="is_active" class="form-control @error('is_active') is-invalid @enderror">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="0" {{old('is_active') == '0' ? 'selected' : ''}} >Aktif</option>
                                                        <option value="1" {{old('is_active') == '1' ? 'selected' : ''}}>Tidak Aktif</option>
                                                    </select>
                                                    @error('is_active')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                        <a href="{{route('backend-kategori-berita.index')}}" class="btn btn-warning">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
