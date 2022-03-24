@extends('layouts.backend.app')

@section('title')
    Berita
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
                <section>
                    <div class="row">
                        @if ($kategori->count() > 0)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title">Berita <a href=" {{route('backend-berita.create')}} " class="btn btn-primary">Tambah</a> </h4>
                                    </div>
                                    <div class="card-datatable">
                                        <table class="dt-responsive table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>No</th>
                                                    <th>Title</th>
                                                    <th>Thumbnail</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                @foreach ($berita as $key => $beritas)
                                                    <tr>
                                                        <td></td>
                                                        <td> {{$key+1}} </td>
                                                        <td> {{$beritas->title}} </td>
                                                        <td> 
                                                            <img src="{{asset('storage/images/berita/' .$beritas->thumbnail)}}" class="img-responsive" style="max-width: 50px; max-height:50px"> 
                                                        </td>
                                                        <td> {{$beritas->kategori->nama}} </td>
                                                        <td> {{$beritas->is_active == '0' ? 'Publish' : 'Draft'}} </td>
                                                        <td>
                                                            <a href=" {{route('backend-berita.edit', $beritas->id)}} " class="btn btn-success btn-sm">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>                                   
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @else
                            <h3>Kategori Masih Kosong !</h3>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
