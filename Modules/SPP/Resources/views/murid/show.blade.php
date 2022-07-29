@extends('layouts.backend.app')

@section('title')
    Detail Pembayaran Murid
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
                    <h2> Detail Pembayaran Murid <span style="color: black; font-weight:bold"> {{$payment->user->name}} - {{$payment->user->muridDetail->nisn}} </span> </h2>
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
                                    <h4 class="card-title">Data Pembayaran Murid Tahun {{$payment->year}} </h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Bulan</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                                <th>Diproses</th>
                                                <th>Diproses Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($payment->detailPayment as $key => $detail)
                                            <tr>
                                              <td></td>
                                              <td> {{$key+1}} </td>
                                              <td>{{$detail->month}}</td>
                                              <td>Rp {{number_format($detail->amount)}}</td>
                                              <td><span class="badge badge-{{$detail->status == 'paid' ? 'info' : 'warning'}}">{{$detail->status}}</span></td>
                                              <td>{{$detail->aprroveBy->name ?? '-'}}</td>
                                              <td>{{$detail->approve_date ?? '-'}}</td>
                                              <td>
                                                @if ($detail->file != null && $detail->status == 'unpaid')
                                                  <a href="" class="btn btn-success btn-sm" data-toggle="modal" id="klikModal" data-target="#modalPembayaran"
                                                  data-id="{{$detail->id}}"
                                                  data-name="{{$detail->user->name}}"
                                                  data-nisn="{{$detail->user->muridDetail->nisn}}"
                                                  data-month="{{$detail->month}}"
                                                  data-amount="Rp {{number_format($detail->amount)}}"
                                                  data-sender="{{$detail->sender}}"
                                                  data-banksender="{{$detail->bank_sender}}"
                                                  data-datefile="{{$detail->date_file}}"
                                                  data-destinationbank="{{$detail->destination_bank}}"
                                                  >Proses</a>
                                                  <a href="{{$detail->url_file}}" target="_blank" class="btn btn-info btn-sm">Bukti Bayar</a>
                                                @elseif($detail->status == 'paid')
                                                  <a href="{{$detail->url_file}}" target="_blank" class="btn btn-info btn-sm">Bukti Bayar</a>
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
     @include('spp::murid.update')
</div>
@endsection

@section('scripts')
  <script>
    // Tampilkan Data Pada Modal
    $(document).on('click','#klikModal', function(){
        var id = $(this).attr('data-id');
        var nisn = $(this).attr('data-nisn');
        var name = $(this).attr('data-name');
        var month = $(this).attr('data-month');
        var amount = $(this).attr('data-amount');
        var sender = $(this).attr('data-sender');
        var banksender = $(this).attr('data-banksender');
        var datefile = $(this).attr('data-datefile');
        var destinationbank = $(this).attr('data-destinationbank');
        $("#id_payment").val(id)
        $("#nisn").val(nisn)
        $("#name").val(name)
        $("#month").val(month)
        $("#amount").val(amount)
        $("#sender").val(sender)
        $("#banksender").val(banksender)
        $("#datefile").val(datefile)
        $("#destinationbank").val(destinationbank)
    });

    // Proses Update Data Peminjam
    $(document).on('click','#konfirmasiPembayaran', function(){
        var id_payment = $("#id_payment").val();
        $.get('{{Url("spp/murid/update-pembayaran")}}',{'_token': $('meta[name=csrf-token]').attr('content'),id_payment:id_payment}, function(resp){
          $("#id_payment").val('');
          location.reload();
        });
    });
  </script>
@endsection
