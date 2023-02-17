@extends('layouts.backend.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="{{asset('Assets/Backend/images/pages/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                        <img src="{{asset('Assets/Backend/images/pages/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">Welcome {{Auth::user()->name}},</h1>
                            <p class="card-text m-auto w-75">
                                Have fun your day :)
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5">
              <div class="card card-congratulation-medal">
                  <div class="card-body">
                      <h5>Selamat 🎉 {{Auth::user()->name}}!</h5>
                      <p class="card-text font-small-3">Kamu Peringkat Pertama</p>
                      <h3 class="mb-75 mt-4">
                          <a href="javascript:void(0);">Rangking 1</a>
                      </h3>
                      <button type="button" class="btn btn-primary">Lihat Semua Peringkat</button>
                      <img src="{{asset('Assets/Backend/images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
                  </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="{{asset('Assets/Backend/images/illustration/email.svg')}}" alt="Meeting Pic" height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            <div class="meetup-day">
                                <h6 class="mb-0">{{Carbon\Carbon::parse($event->acara ?? 0)->format('l')}}</h6>
                                <h3 class="mb-0">{{Carbon\Carbon::parse($event->acara ?? 0)->format('d')}}</h3>
                            </div>
                            <div class="my-auto">
                                <h4 class="card-title mb-25">{{$event->title ?? 'Belum Ada Acara'}}</h4>
                                <p class="card-text mb-0">{{$event->desc ?? 'Belum Ada Acara'}}</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                                <div class="avatar-content">
                                    <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="mb-0">{{Carbon\Carbon::parse($event->acara ?? 0)->format('d F, Y')}}</h6>
                                <small>{{Carbon\Carbon::parse($event->acara ?? 0)->format('H:i:s')}}</small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                                <div class="avatar-content">
                                    <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="mb-0">{{$event->lokasi ?? 'Belum Ada Acara'}}</h6>
                                <small>Manhattan, New york City</small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-6 col-12">
              <div class="row">
                <div class="col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Perpustakaan</h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text font-small-2 mr-25 mb-0">Updated 1 day ago</p>
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                              <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="users" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{strtoupper(Auth::user()->username)}}</h4>
                                            @if (Auth::user()->member)
                                              <p class="card-text font-small-1 mb-0">Member sejak {{Carbon\carbon::parse(Auth::user()->member->created_at)->format('d F Y')}} </p>
                                            @else
                                              <p class="card-text font-small-1 mb-0 text-warning"> Belum menjadi member Perpustakaan</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="book-open" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{$pinjam}}</h4>
                                            <p class="card-text font-small-3 mb-0">Buku Dipinjam</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="book" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{$lateness}}</h4>
                                            <p class="card-text font-small-3 mb-0">Belum Dikembalikan</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

              </div>
            </div>

        </div>
    </div>
</div>
@endsection
