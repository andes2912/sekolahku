@extends('layouts.backend.app')

@section('title')
    Video
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
                    <h2> Video</h2>
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
                                    <h4>Edit Video</h4>
                                </div>
                                <div class="card-body">
                                    <form action=" {{route('backend-video.update', $video->id)}} " method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="basicInput">URL Video</label>
                                                    <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value=" {{$video->url}} " placeholder="URL Video" />
                                                    <span class="text-danger" style="font-size: 10px">Kosongkan jika tidak ingin mengubah serta Salin dan paste url video dari Youtube.
                                                    </span>
                                                    @error('url')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="basicInput">Status</label>
                                                    <select name="is_active" class="form-control @error('is_active') is-invalid @enderror">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="0" {{$video->is_active == '0' ? 'selected' : ''}} >Aktif</option>
                                                        <option value="1" {{$video->is_active == '1' ? 'selected' : ''}}>Tidak Aktif</option>
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
                                                    <label for="basicInput">Title</label> <span class="text-danger">*</span>
                                                   <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value=" {{$video->title}} ">
                                                    @error('title')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Description</label> <span class="text-danger">*</span>
                                                    <textarea name="desc" class="form-control  @error('desc') is-invalid @enderror" rows="5"> {{$video->desc}} </textarea>
                                                    @error('desc')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a href="{{route('backend-video.index')}}" class="btn btn-warning">Batal</a>`
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
