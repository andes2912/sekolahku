@extends('layouts.backend.app')

@section('title')
    Data Pembayaran
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
                    <h2> Data Pembayaran</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Pembayaran</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Bulan</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payment as $key => $payments)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$payments->payment->year}} </td>
                                                    <td> {{$payments->month}} </td>
                                                    <td>Rp {{number_format($payments->amount)}} </td>
                                                    <td> <span class="badge badge-{{$payments->status == 'paid' ? 'info' : 'warning'}}">{{$payments->status}}</span> </td>
                                                    <td> {{$payments->date_file}} </td>
                                                    <td>
                                                        @if ($payments->status == 'paid')
                                                          <span class="badge badge-info">Pembayaran Diterima</span>
                                                        @else
                                                          <a href="{{route('pembayaran.edit', $payments->id)}}" class="btn btn-success btn-sm">{{$payments->file != null ? 'Pembayaran Diproses' : 'Bayar'}}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
  </div>
@endsection
