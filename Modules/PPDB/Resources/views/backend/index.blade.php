@extends('layouts.backend.app')

@section('title')
    Dashboard
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
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
     
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary" role="alert">
                    <div class="alert-body">
                        <strong>Info:</strong> Dalam tahap pengembangan !
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection