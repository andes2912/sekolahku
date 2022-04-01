@extends('layouts.frontend.app')

@section('title')
    Berita
@endsection

@section('content')
    @section('about')
    <div class="news-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
                        @foreach ($berita as $beritas)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="news-box">
                                    <div class="news-img-holder">
                                        <img src="{{asset('storage/images/berita/' .$beritas->thumbnail)}}" class="img-responsive" alt="research">
                                        <ul class="news-date2">
                                            <li>{{Carbon\Carbon::parse($beritas->created_at)->format('d M')}}</li>
                                            <li>{{Carbon\Carbon::parse($beritas->created_at)->format('Y')}}</li>
                                        </ul>
                                    </div>
                                    <h3 class="title-news-left-bold"><a href="{{route('detail.berita', $beritas->slug)}}">{{$beritas->title}}</a></h3>
                                    <ul class="title-bar-high news-comments">
                                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> {{$beritas->user->name}}</a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>{{$beritas->kategori->nama}}</a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                        @endforeach
                        @if ($berita == NULL)
                            <img src="{{asset('Assets/Frontend/img/empty.svg')}}" class="img-responsive" style="object-fit:cover; margin-top:5% !important; display: block; margin: 0 auto;">
                        @endif
                      
                        {{ $berita->links('frontend.content.paginate') }}

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="sidebar">
                        <div class="sidebar-box">
                            <div class="sidebar-box-inner">
                                <h3 class="sidebar-title">Kategori</h3>
                                <ul class="sidebar-categories">
                                    @foreach ($kategori as $kategoris)
                                        <li><a href=""> {{$kategoris->nama}} </a></li>
                                    @endforeach
                                </ul>
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