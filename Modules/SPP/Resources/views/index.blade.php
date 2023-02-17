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
                              <h2 class="font-weight-bolder mb-0">{{@$month}}</h2>
                              <p class="card-text">Bulan Ini</p>
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
                                <h2 class="font-weight-bolder mb-0">{{@$paid}}</h2>
                                <p class="card-text">Sudah Lunas</p>
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
                              <h2 class="font-weight-bolder mb-0">{{@$year}}</h2>
                              <p class="card-text">Tahun Ini</p>
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
                                <h2 class="font-weight-bolder mb-0">{{@$unpaid}}</h2>
                                <p class="card-text">Belum Lunas</p>
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
    </div>
</div>
@endsection
