@extends('layouts.backend.app')

@section('title')
   Edit Kegiatan
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
                    <h2> Kegiatan</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Edit Kegiatan</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{route('backend-kegiatan.update', $kegiatan->id)}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Kegiatan</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value=" {{$kegiatan->nama}} " name="nama" placeholder="Nama Kegiatan" />
                                        @error('nama')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Status</label> <span class="text-danger">*</span>
                                        <select name="is_active" class="form-control  @error('is_active') is-invalid @enderror">
                                            <option value="0" {{$kegiatan->is_active == 0 ? 'selected' : ''}} >Aktif</option>
                                            <option value="1"  {{$kegiatan->is_active == 1 ? 'selected' : ''}}>Tidak Aktif</option>
                                        </select>
                                        @error('is_active')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="basicInput">Gambar</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="image" />
                                        @error('image')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Content</label> <span class="text-danger">*</span>
                                        <textarea name="content" class="form-control  @error('content') is-invalid @enderror" cols="30" rows="10"> {{$kegiatan->content}} </textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                              
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{route('backend-kegiatan.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection