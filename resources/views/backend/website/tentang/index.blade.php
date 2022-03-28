@extends('layouts.backend.app')

@section('title')
    Profile Sekolah
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
                    <h2> Profile Sekolah</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header header-bottom">
                                    <h4>Profile Sekolah</h4>
                                </div>
                                <div class="card-body">
                                    @if ($profile == NULL)
                                        <form action=" {{route('backend-profile-sekolah.store')}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Title</label> <span class="text-danger">*</span>
                                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value=" {{old('title')}} " placeholder="Contoh : PROFILE SEKOLAH SMK NASIONAL" />
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Gambar</label> <span class="text-danger">*</span>
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
                                                        <textarea name="content" class="form-control  @error('content') is-invalid @enderror" rows="10"> {{old('content')}} </textarea>
                                                        @error('content')
                                                            <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <button class="btn btn-primary" type="submit">Tambah</button>
                                            <a href="{{route('backend-profile-sekolah.index')}}" class="btn btn-warning">Batal</a>
                                        </form>
                                    @else
                                        <form action=" {{route('backend-profile-sekolah.update', $profile->id)}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Title</label> <span class="text-danger">*</span>
                                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value=" {{$profile->title}} " placeholder="Contoh : PROFILE SEKOLAH SMK NASIONAL" />
                                                        @error('title')
                                                            <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="basicInput">Gambar</label> <span class="text-danger">*</span>
                                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="image" />
                                                        <span class="text-danger" style="font-size: 10px">Kosongkan jika tidak ingin diubah.</span>
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
                                                        <textarea name="content" class="form-control  @error('content') is-invalid @enderror" rows="10"> {{$profile->content}} </textarea>
                                                        @error('content')
                                                            <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            <a href="{{route('backend-profile-sekolah.index')}}" class="btn btn-warning">Batal</a>
                                        </form>
                                    @endif
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