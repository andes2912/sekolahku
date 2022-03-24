@extends('layouts.backend.app')

@section('title')
    Event
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
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Event <a href=" {{route('backend-event.create')}} " class="btn btn-primary">Tambah</a> </h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Thumbnail</th>
                                                <th>Lokasi</th>
                                                <th>Acara</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach ($event as $key => $events)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$events->title}} </td>
                                                    <td> 
                                                        <img src="{{asset('storage/images/event/' .$events->thumbnail)}}" class="img-responsive" style="max-width: 50px; max-height:50px"> 
                                                    </td>
                                                    <td> {{$events->lokasi}} </td>
                                                    <td> {{$events->acara}} </td>
                                                    <td> {{$events->is_active == '0' ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    <td>
                                                        <a href=" {{route('backend-event.edit', $events->id)}} " class="btn btn-success btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>                                   
                                    </table>
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