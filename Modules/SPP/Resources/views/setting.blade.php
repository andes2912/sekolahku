@extends('layouts.backend.app')

@section('title')
    SPP Setting
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
                        <h2> SPP Setting</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('spp.update') }}" method="POST"></form>
                            @csrf
                            <label for="amount">Biaya SPP</label>
                            <input type="number" name="amount" id="rupiahInput" class="form-control mb-2" style="width: 50%;">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#rupiahInput').on('input', function() {
                // Ambil nilai input
                let value = $(this).val();

                // Hapus karakter non-digit
                value = value.replace(/\D/g, '');

                // Format sebagai Rupiah
                value = formatRupiah(value);

                // Perbarui nilai input
                $(this).val(value);
            });

            function formatRupiah(angka) {
                var reverse = angka.toString().split('').reverse().join('');
                var ribuan = reverse.match(/\d{1,3}/g);
                var formatted = ribuan.join('.').split('').reverse().join('');
                return 'Rp' + formatted;
            }
        </script>
    @endpush
@endsection
