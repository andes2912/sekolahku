@extends('layouts.backend.app')

@section('title')
    Settings
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

   @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">
            <strong>Gagal, Data yang dimasukan tidak valid !</strong>
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
    </div>
   @endif
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title mb-0">Settings</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left">
                            <!-- general -->
                            <li class="nav-item">
                                <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <i data-feather="user" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">Account Bank</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!--/ left menu section -->

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- general tab -->
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                      @if (Auth::user()->bank == NULL)
                                        <!-- form -->
                                        <form class="validate-form mt-2" action="{{{route('settings.add.bank')}}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-nama">Nama Bank</label>
                                                        <select name="bank_name" class="form-control select2">
                                                          <option>-- Pilih Bank --</option>
                                                          @foreach ($bank as $banks)
                                                            <option value="{{$banks->nama_bank}}">{{$banks->nama_bank}}</option>
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">Nomor Rekening</label>
                                                        <input type="number" class="form-control" name="account_number" placeholder="Nomor Rekening" value="" />
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">Nama Pemilik</label>
                                                        <input type="text" class="form-control" name="account_name" placeholder="Nama Pemilik" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                  <div class="form-group">
                                                      <label for="account-e-mail">Status</label>
                                                        <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="active" name="is_active" value="1" class="custom-control-input" />
                                                            <label class="custom-control-label" for="active">Aktif</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="notActive" name="is_active" value="0" class="custom-control-input" />
                                                            <label class="custom-control-label" for="notActive">Tidak Aktif</label>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1">Tambah</button>
                                                    <a href="/home" class="btn btn-outline-secondary mt-2">Batal</a>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                      @else
                                        <div class="row">
                                          @foreach (Auth::user()->banks as $bank)
                                            <div class="col-md-4">
                                              <a data-toggle="modal" data-target="#editpayment">
                                                <div class="card bg-danger">
                                                  <div class="card-body text-center">
                                                    <div class="card-title text-white">
                                                      {{$bank->bank_name}}
                                                    </div>
                                                    <span class="text-white">{{$bank->account_number}}</span> <br>
                                                    <small class="text-white">{{$bank->account_name}}</small>
                                                  </div>
                                                </div>
                                              </a>
                                            </div>
                                          @endforeach
                                          <div class="col-md-4">
                                            <a data-toggle="modal" data-target="#addBank">
                                              <div class="card bg-primary">
                                                <div class="card-body">
                                                  <div class="card-title text-white text-center">
                                                    Tambah Akun Bank<i data-feather='plus'></i>
                                                  </div>
                                                  <div class="text-center text-white">
                                                    <i data-feather='plus'></i>
                                                  </div> <br>
                                                </div>
                                              </div>
                                            </a>
                                          </div>
                                        </div>
                                      @endif
                                    </div>
                                    <!--/ general tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ right content section -->
                </div>
            </section>
            <!-- / account setting page -->
            @include('backend.settings.addBank')
        </div>
    </div>
@endsection