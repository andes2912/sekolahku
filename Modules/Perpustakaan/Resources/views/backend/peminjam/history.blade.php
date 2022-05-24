@extends('layouts.backend.app')

@section('title')
    History Data Peminjam
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
                    <h2> History Data Peminjam</h2>
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
                                    <h4 class="card-title">History Data Peminjam <a href=" {{route('peminjam.create')}} " class="btn btn-primary">Tambah</a></h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Kode Pinjam</th>
                                                <th>Peminjam</th>
                                                <th>Judul Buku</th>
                                                <th>Tgl Pinjam</th>
                                                <th>Tgl Akhir</th>
                                                <th>Pengambilian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($HistoryPeminjam as $key => $HistoryPeminjams)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$HistoryPeminjams->borrow_code}} </td>
                                                    <td> {{$HistoryPeminjams->members->name}} </td>
                                                    <td> {{$HistoryPeminjams->books->name}} </td>
                                                    <td> {{$HistoryPeminjams->borrow_date}} </td>
                                                    <td> {{$HistoryPeminjams->return_date}} </td>
                                                    <td> {{$HistoryPeminjams->lateness}} </td>
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