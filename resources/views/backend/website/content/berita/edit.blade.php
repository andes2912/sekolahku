@extends('layouts.backend.app')

@section('title')
   Edit Berita
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
                    <h2> Berita</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Edit Berita</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{route('backend-berita.update', $berita->id)}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Title Berita</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value=" {{$berita->title}} " />
                                        @error('title')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Thumbnail</label> <span class="text-danger">*</span>
                                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail"/>
                                        <span class="text-danger" style="font-size: 10px">Kosongkan jika tidak ingin mengubah.</span>
                                        @error('thumbnail')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Kategori</label> <span class="text-danger">*</span>
                                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            @foreach ($kategori as $kategoris)
                                                <option value=" {{$kategoris->id}} " {{$berita->kategori_id == $kategoris->id ? 'selected' : ''}} > {{$kategoris->nama}} </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Status</label> <span class="text-danger">*</span>
                                        <select name="is_active" class="form-control @error('is_active') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            <option value="0" {{$berita->is_active == '0' ? 'selected' : ''}} >Publish</option>
                                            <option value="1" {{$berita->is_active == '1' ? 'selected' : ''}} >Draft</option>
                                        </select>
                                        @error('is_active')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Content</label> <span class="text-danger">*</span>
                                        <textarea name="content" class="form-control  @error('content') is-invalid @enderror" cols="30" rows="10">{{$berita->content}}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                              
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{route('backend-berita.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection