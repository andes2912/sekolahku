@extends('layouts.backend.app')

@section('title')
  Pembayaran
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
                    <h2>Pembayaran</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                  <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Silahkan Upload Bukti Pembayaran</h4>
                                </div>
                                <div class="card-body">
                                   <form action=" {{route('pembayaran.update', $payment->id)}} " method="post" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                      <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="basicInput">NISN</label>
                                                <input type="text" class="form-control" value="{{$payment->user->muridDetail->nisn}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                              <label for="basicInput">Nama</label>
                                              <input type="text" class="form-control" value="{{$payment->user->name}}" readonly/>
                                          </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                              <label for="basicInput">Jumlah</label>
                                              <input type="text" class="form-control" value="Rp {{number_format($payment->amount)}}" readonly/>
                                          </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                              <label for="basicInput">Bukti Bayar</label> <span class="text-danger">*</span>
                                              <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required/>
                                              @error('file')
                                                  <div class="invalid-feedback">
                                                  <strong>{{ $message }}</strong>
                                                  </div>
                                              @enderror
                                          </div>
                                        </div>
                                      </div>
                                      <button class="btn btn-primary" type="submit">{{$payment->file != null ? 'Update Pembayaran' : 'Bayar'}}</button>
                                      <a href="{{route('pembayaran.index')}}" class="btn btn-warning">Batal</a>
                                  </form>
                                </div>
                            </div>
                </section>
            </div>
        </div>
    </div>
  </div>
@endsection
