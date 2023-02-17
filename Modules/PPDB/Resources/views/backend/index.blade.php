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
    <div class="content-body">
        <div class="row">
           <div class="col-lg-6 col-md-12 col-sm-12">
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

           @if (Auth::user()->role == 'PPDB')
             <div class="col-lg-3 col-sm-6 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <div>
                              <h2 class="font-weight-bolder mb-0">{{$register}}</h2>
                              <p class="card-text">Pendaftar</p>
                          </div>
                          <div class="avatar bg-light-primary p-50 m-0">
                              <div class="avatar-content">
                                  <i data-feather="users" class="font-medium-5"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <div>
                              <h2 class="font-weight-bolder mb-0">{{$needVerif}}</h2>
                              <p class="card-text">Perlu Verifikasi</p>
                          </div>
                          <div class="avatar bg-light-warning p-50 m-0">
                              <div class="avatar-content">
                                  <i data-feather="user" class="font-medium-5"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
           @endif
        </div>
    </div>
</div>
@endsection
