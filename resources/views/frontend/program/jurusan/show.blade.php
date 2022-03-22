@extends('layouts.Frontend.app')
@section('title')
    Program Studi {{$jurusan->nama}}
@endsection

@section('content')
    @section('about')
    <div class="about-page1-area">
        <div class="container">
            <div class="row about-page1-inner">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="about-page-content-holder">
                        {{$jurusan->dataJurusan->content}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="about-page-img-holder">
                        <img src="{{asset('storage/images/jurusan/' .$jurusan->dataJurusan->image)}}" class="img-responsive" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection