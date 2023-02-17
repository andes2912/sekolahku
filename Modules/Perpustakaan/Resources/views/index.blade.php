@extends('layouts.backend.app')

@section('title')
    Dashboard
@endsection

@section('content')
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

            <div class="col-lg-3 col-sm-6 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <div>
                              <h2 class="font-weight-bolder mb-0">{{$book}}</h2>
                              <p class="card-text">Buku</p>
                          </div>
                          <div class="avatar bg-light-primary p-50 m-0">
                              <div class="avatar-content">
                                  <i data-feather="book" class="font-medium-5"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{$members}}</h2>
                                <p class="card-text">Members</p>
                            </div>
                            <div class="avatar bg-light-danger p-50 m-0">
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
                              <h2 class="font-weight-bolder mb-0">{{$borrow}}</h2>
                              <p class="card-text">Buku Dipinjam</p>
                          </div>
                          <div class="avatar bg-light-warning p-50 m-0">
                              <div class="avatar-content">
                                  <i data-feather="book" class="font-medium-5"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{$member}}</h2>
                                <p class="card-text">Members Aktif</p>
                            </div>
                            <div class="avatar bg-light-success p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="user-check" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>

        {{-- <div class="row">
          <div class="col-lg-8 col-sm-6 col-12">
              <div class="card">
                  <div class="card-header align-items-start">
                      <div>
                          <h4 class="card-title mb-25">Peminjam</h4>
                          <p class="card-text mb-0">2020 Total Sales: 12.84k</p>
                      </div>
                      <i data-feather="settings" class="font-medium-3 text-muted cursor-pointer"></i>
                  </div>
                  <div class="card-body pb-0">
                      <div id="sales-line-chart"></div>
                  </div>
              </div>
          </div>
        </div> --}}
    </div>
</div>
@endsection
