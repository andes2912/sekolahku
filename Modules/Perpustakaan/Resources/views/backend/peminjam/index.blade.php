@extends('layouts.backend.app')

@section('title')
    Data Peminjam
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
                    <h2> Data Peminjam</h2>
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
                                    <h4 class="card-title">Data Peminjam <a href=" {{route('peminjam.create')}} " class="btn btn-primary">Tambah</a></h4>
                                    <div class="dt-action-buttons text-right">
                                      <a href=" {{url('perpus/history-peminjam')}} " class="btn btn-dark">History Peminjam</a>
                                    </div>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($peminjam as $key => $peminjams)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$peminjams->borrow_code}} </td>
                                                    <td> {{$peminjams->members->name}} </td>
                                                    <td> {{$peminjams->books->name}} </td>
                                                    <td> {{$peminjams->borrow_date}} </td>
                                                    <td> {{$peminjams->return_date}} </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-id="{{$peminjams->id}}" data-name="{{$peminjams->books->name}}" data-kode="{{$peminjams->borrow_code}}"
                                                          data-peminjam="{{$peminjams->members->name}}"
                                                        id="klikModal" data-target="#modalPeminjam" style="color:white">Update</a>
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
    @include('perpustakaan::backend.peminjam.update')
</div>
@endsection
@section('scripts')
  <script>
    // Tampilkan Data Pada Modal
    $(document).on('click','#klikModal', function(){
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var kode = $(this).attr('data-kode');
        var peminjam = $(this).attr('data-peminjam');
        $("#id_peminjam").val(id)
        $("#name").val(name)
        $("#kode_buku").val(kode)
        $("#peminjam").val(peminjam)
    });

    // Proses Update Data Peminjam
    $(document).on('click','#updatePeminjam', function(){
        var id_peminjam = $("#id_peminjam").val();
        var lateness = $("#lateness").val();
        $.get('{{Url("perpus/update-peminjam")}}',{'_token': $('meta[name=csrf-token]').attr('content'),id_peminjam:id_peminjam,lateness:lateness}, function(resp){
          $("#id_peminjam").val('');
          $("#lateness").val('');
          location.reload();
        });
    });
  </script>
@endsection