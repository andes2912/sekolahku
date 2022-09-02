@extends('layouts.Frontend.app')
@section('title')
    Events
@endsection

@section('content')
    @section('about')
        <div class="event-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row event-inner-wrapper">

                            @foreach ($event as $events)
                                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-6">
                                    <div class="single-item">
                                        <div class="item-img">
                                            <a href="{{route('detail.event',$events->slug)}}"><img src="{{asset('storage/images/event/' .$events->thumbnail)}}" alt="event" class="img-responsive"></a>
                                        </div>
                                        <div class="item-content">
                                            <h3 class="sidebar-title"><a href="{{route('detail.event',$events->slug)}}">{{$events->title}}</a></h3>
                                            <p> {{$events->desc}} </p>
                                            <ul class="event-info-block">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{Carbon\Carbon::parse($events->acara)->format('d F, Y')}}</li>
                                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$events->lokasi}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Berita Terbaru</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
                                            @foreach ($berita as $beritas)
                                                <li>
                                                    <div class="latest-research-img">
                                                        <a href="{{route('detail.berita', $beritas->slug)}}"><img src="{{asset('storage/images/berita/' .$beritas->thumbnail)}}" class="img-responsive" alt="skilled"></a>
                                                    </div>
                                                    <div class="latest-research-content">
                                                        <h6>{{Carbon\Carbon::parse($beritas->created_at)->format('d M, Y')}}</h6>
                                                        <p style="font-size: 12px">{{$beritas->title}}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endsection
