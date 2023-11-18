@extends('layouts.backend.app')

@section('title')
  Pembayaran Registrasi
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
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Pembayaran Registrasi</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Lakukan Konfirmasi Pembayaran</h4>
                        <h6>Silahkan lakukan konfirmasi ketika Anda sudah melakukan transfer.</h6>
                        <hr>
                        <form action="{{url('ppdb/payment-pendaftaran', $user->paymentRegis->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Atas Nama">Pembayaran Untuk Calon Murid</label>
                                <input type="text" name="sender" class="form-control" value="{{$user->name}}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="Atas Nama">Nama Pengirim</label>
                                <input type="text" name="sender" class="form-control @error('sender') is-invalid @enderror" placeholder="Atas Nama" autocomplete="off">
                                @error('sender')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Bank Tujuan">Bank Tujuan</label>
                                <select name="destination_bank" class="form-control select2 @error('destination_bank') is-invalid @enderror">
                                    <option value="">-- Pilih Bank --</option>
                                    @foreach ($accountbanks->banks as $banks)
                                        <option value="{{$banks->bank_name}}">{{$banks->bank_name}}</option>
                                    @endforeach
                                </select>
                                @error('destination_bank')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">File Bukti Transfer</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">
                                @error('file')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">{{@$payment->file != null ? 'Update Pembayaran' : 'Konfirmasi'}}</button>
                                <a href="{{route('pembayaran.index')}}" class="btn btn-warning">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow">
                <div class="card-body">
                    <h6>Mohon untuk mentransfer sesuai dengan jumlah yang ditentukan.</h6>
                </div>
                </div>
                <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        @php
                            $p = new NumberFormatter("id", NumberFormatter::SPELLOUT);
                            $result = preg_replace("/\..+/", "", $user->paymentRegis->amount);
                        @endphp
                    <span>
                        Jumlah :
                        <span style="font-weight: bold">Rp {{number_format($user->paymentRegis->amount)}}</span>
                        <small style="font-style: italic; font-size:10px; color:brown">{{ ucwords($p->format($result))}} Rupiah</small>
                    </span>
                    <span style="font-size: 21px">
                        <i class="feather icon-credit-card"></i>
                    </span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                    <span>
                        @foreach ($accountbanks->banks as $bank)
                        <ul>
                            <li style="color:cadetblue; font-weight:bold">{{$bank->bank_name}}</li>
                            <li>{{$bank->account_name}}</li>
                            <li>{{$bank->account_number}}</li>
                        </ul>
                        @endforeach
                    </span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                    <span>
                        Pembayaran Registrasi {{@$payment->month}}
                    </span>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
