@extends('layouts.Frontend.app')

@section('title')
    {{$event->title}}
@endsection

@section('content')
    @section('about')
        <div class="event-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="event-details-inner">
                            <div class="event-details-img">
                                {{-- <div class="countdown-content">
                                    <div id="countdown"></div>
                                </div> --}}
                                <a href="#"><img src="{{asset('storage/images/event/' .$event->thumbnail)}}" alt="event" class="img-responsive"></a>
                            </div>
                            <h2 class="title-default-left-bold-lowhight"><a href="#">{{$event->title}}</a></h2>
                            <ul class="event-info-inline title-bar-sm-high">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{Carbon\Carbon::parse($event->acara)->format('d F, Y')}}</li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$event->lokasi}}</li>
                            </ul>
                            <p> {{$event->content}} </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Event Lainnya</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
                                            @foreach ($eventOther as $events)
                                                <li>
                                                    <div class="latest-research-img">
                                                        <a href="{{route('detail.event', $events->slug)}}"><img src="{{asset('storage/images/event/' .$events->thumbnail)}}" class="img-responsive" alt="skilled"></a>
                                                    </div>
                                                    <div class="latest-research-content">
                                                        <h6>{{Carbon\Carbon::parse($events->acara)->format('d M, Y')}}</h6>
                                                        <p style="font-size: 12px">{{$events->title}}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

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
