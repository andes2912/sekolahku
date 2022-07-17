@extends('layouts.backend.app')

@section('title')
    Data Pembayaran Murid
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
                    <h2> Data Pembayaran Murid</h2>
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
                                    <h4 class="card-title">Data Pembayaran Murid</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Pembayaran Bulan {{Date('F')}} </th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payment as $key => $payments)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$payments->muridDetail->nisn}} </td>
                                                    <td> {{$payments->name}} </td>
                                                    <td> {{$payments->email}} </td>
                                                    <td>
                                                      @if (Date('m') == 1)
                                                        <span class="badge badge-{{$payments->payment->January == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->January)}}</span>
                                                      @elseif(Date('m') == 2)
                                                        <span class="badge badge-{{$payments->payment->Febuary == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->Febuary)}}</span>
                                                      @elseif(Date('m') == 3)
                                                       <span class="badge badge-{{$payments->payment->March == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->March)}}</span>
                                                      @elseif(Date('m') == 4)
                                                       <span class="badge badge-{{$payments->payment->April == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->April)}}</span>
                                                      @elseif(Date('m') == 5)
                                                        <span class="badge badge-{{$payments->payment->Mey == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->Mey)}}</span>
                                                      @elseif(Date('m') == 6)
                                                        <span class="badge badge-{{$payments->payment->Juny == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->Juny)}}</span>
                                                      @elseif(Date('m') == 7)
                                                        <span class="badge badge-{{$payments->payment->July == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->July)}}</span>
                                                      @elseif(Date('m') == 8)
                                                        <span class="badge badge-{{$payments->payment->August == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->August)}}</span>
                                                      @elseif(Date('m') == 9)
                                                        <span class="badge badge-{{$payments->payment->September == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->September)}}</span>
                                                      @elseif(Date('m') == 10)
                                                        <span class="badge badge-{{$payments->payment->October == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->October)}}</span>
                                                      @elseif(Date('m') == 11)
                                                        <span class="badge badge-{{$payments->payment->November == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->November)}}</span>
                                                      @elseif(Date('m') == 12)
                                                        <span class="badge badge-{{$payments->payment->December == 'paid' ? 'info' : 'warning'}}">{{strtoupper($payments->payment->December)}}</span>
                                                      @endif
                                                    </td>
                                                    <td> <span class="badge badge-info">{{$payments->payment->is_active == 1 ? 'ACTIVE' : 'SUSPEND'}}</span></td>
                                                    <td>
                                                        <a href="{{route('spp.murid.detail', $payments->payment->id)}}" class="btn btn-success btn-sm">Detail</a>
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