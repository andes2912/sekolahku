@extends('layouts.frontend.app')

@section('title')
    Profile Sekolah
@endsection

@section('content')
    @section('about')
        <div class="container">
            @if ($profile)
                <div style="margin-top: 5%; margin-bottom:3%">
                    <img src="{{asset('storage/images/profileSekolah/' .$profile->image)}}" class="img-responsive" style="max-height:500px; width:100%; object-fit:cover">
                </div>
                <h2 class="title-center">{{$profile->title}}</h2>
                <p class="sub-title-full-width">{{$profile->content}}</p>
            @else
                <img src="{{asset('Assets/Frontend/img/empty.svg')}}" class="img-responsive" style="object-fit:cover; margin-top:5% !important; display: block;
            margin: 0 auto;">
            @endif
        </div>
    @endsection

    {{-- Guru --}}
    @section('guru')
        @include('frontend.content.guru')
    @endsection
@endsection