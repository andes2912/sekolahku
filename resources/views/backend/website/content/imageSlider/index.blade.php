@extends('layouts.backend.app')

@section('title')
    Image Slider
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
                    <h2> Image Slider</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Image Slider</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach ($image as $key => $images)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> <img src="{{asset('storage/images/slider/' .$images->image)}}" class="img-responsive" style="max-width: 50px; max-height:50px"> </td>
                                                    <td> {{$images->is_active == '0' ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    <td>
                                                        <a href=" {{route('backend-imageslider.edit', $images->id)}} " class="btn btn-success btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header header-bottom">
                                    <h4>Tambah Image Slider</h4>
                                </div>
                                <div class="card-body">
                                    <form action=" {{route('backend-imageslider.store')}} " method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="basicInput">Gambar Slider</label>
                                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="image" />
                                                    @error('image')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="basicInput">Urutan Gambar Slider</label>
                                                    <select name="urutan" class="form-control @error('urutan') is-invalid @enderror">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="0">Pertama</option>
                                                        <option value="1">Kedua</option>
                                                        <option value="2">Ketiga</option>
                                                    </select>
                                                    @error('urutan')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Title</label> <span class="text-danger">*</span>
                                                   <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
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
                                                    <textarea name="desc" class="form-control  @error('desc') is-invalid @enderror" rows="5"></textarea>
                                                    @error('desc')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <button class="btn btn-primary" type="submit">Tambah</button>
                                        <a href="{{route('backend-imageslider.index')}}" class="btn btn-warning">Batal</a>
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
