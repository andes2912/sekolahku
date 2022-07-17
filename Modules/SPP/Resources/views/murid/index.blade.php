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
                                                        {{strtoupper($payments->payment->jan)}}
                                                      @elseif(Date('m') == 2)
                                                        {{strtoupper($payments->payment->feb)}}
                                                      @elseif(Date('m') == 3)
                                                        {{strtoupper($payments->payment->mar)}}
                                                      @elseif(Date('m') == 4)
                                                        {{strtoupper($payments->payment->apr)}}
                                                      @elseif(Date('m') == 5)
                                                        {{strtoupper($payments->payment->mei)}}
                                                      @elseif(Date('m') == 6)
                                                        {{strtoupper($payments->payment->jun)}}
                                                      @elseif(Date('m') == 7)
                                                        {{ strtoupper($payments->payment->jul) }}
                                                      @elseif(Date('m') == 8)
                                                        {{strtoupper($payments->payment->ags)}}
                                                      @elseif(Date('m') == 9)
                                                        {{strtoupper($payments->payment->sep)}}
                                                      @elseif(Date('m') == 10)
                                                        {{strtoupper($payments->payment->oct)}}
                                                      @elseif(Date('m') == 11)
                                                        {{strtoupper($payments->payment->nov)}}
                                                      @elseif(Date('m') == 12)
                                                        {{strtoupper($payments->payment->dec)}}
                                                      @endif
                                                    </td>
                                                    <td> {{$payments->payment->is_active == 1 ? 'ACTIVE' : 'SUSPEND'}} </td>
                                                    <td>
                                                        <a href="{{route('spp.murid.detail', $payments->payment->id)}}" class="btn btn-primary btn-sm">Update</a>
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