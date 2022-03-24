@extends('layouts.backend.app')

@section('title')
   Edit Event
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
                    <h2> Event</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Edit Event</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{route('backend-event.update', $event->id)}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Title Event</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value=" {{$event->title}} " placeholder="Title Event" />
                                        @error('title')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value=" {{$event->lokasi}} " placeholder="Lokasi Acara"/>
                                        @error('lokasi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Waktu Dimulai</label> <span class="text-danger">*</span>
                                        <input type="datetime-local" class="form-control @error('acara') is-invalid @enderror" value=" {{$event->acara}} " name="acara" placeholder="Waktu dimulai Acara"/>
                                        @error('acara')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Status</label> <span class="text-danger">*</span>
                                        <select name="is_Active" class="form-control @error('is_Active') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            <option value="0" {{$event->is_active == '0' ? 'selected' : ''}} >Aktif</option>
                                            <option value="1" {{$event->is_active == '1' ? 'selected' : ''}} >Tidak Aktif</option>
                                        </select>
                                        @error('is_Active')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"> <span class="text-danger">*</span>
                                        <label for="basicInput">Desripsi Singkat</label> <span class="text-danger">*</span>
                                        <textarea name="desc" class="form-control  @error('desc') is-invalid @enderror" rows="3"> {{old('desc')}} </textarea>
                                        @error('desc')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"> <span class="text-danger">*</span>
                                        <label for="basicInput">Content</label> <span class="text-danger">*</span>
                                        <textarea name="content" class="form-control  @error('content') is-invalid @enderror" cols="30" rows="10"> {{$event->content}} </textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
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
                              
                            </div>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <a href="{{route('backend-event.index')}}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection