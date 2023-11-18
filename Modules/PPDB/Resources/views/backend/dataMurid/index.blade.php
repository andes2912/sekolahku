@extends('layouts.backend.app')

@section('title')
    Calon Murid
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
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
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Calon Murid</h2>
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
                                    <h4 class="card-title">Calon Murid</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Pembayaran Registrasi</th>
                                                <th>Hak Akses</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($murid as $key => $murids)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$murids->name}} </td>
                                                    <td> {{$murids->email}} </td>
                                                    <td> {{$murids->muridDetail->proses}} </td>
                                                    <td> {{$murids->paymentRegis->status}} </td>
                                                    <td> {{$murids->role}} </td>
                                                    <td>
                                                        <a href=" {{route('data-murid.show', $murids->id)}}" class="btn btn-success btn-sm" >Detail</a>
                                                        <a href="{{asset('storage/images/payment_pendaftaran/' .$murids->paymentRegis->file)}}" class="btn btn btn-primary btn-sm" style="display: {{$murids->paymentRegis->file == null || $murids->paymentRegis->approve_date != null ? 'none' : ''}}">Bukti Pembayaran</a>

                                                         <a data-id="{{$murids->paymentRegis->id}}" id="updatePayment" class="btn btn btn-info btn-sm" style="display: {{$murids->paymentRegis->file == null || $murids->paymentRegis->approve_date != null ? 'none' : ''}}">konfirmasi Pembayaran</a>
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
@section('scripts')
<script type="text/javascript">
    $(document).on('click', '#updatePayment', function () {
        var id = $(this).attr('data-id');
        $.get('konfirm-payment-regis', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
            location.reload()
        });
    });
</script>
@endsection
