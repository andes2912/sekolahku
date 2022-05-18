@extends('layouts.backend.app')

@section('title')
    Form Pendaftaran
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Form Pendaftaran PPDB SMK Yadika Natar</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Berkas Pendaftaran</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{url('ppdb/form-berkas', $berkas->id)}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kartu Keluarga</label>
                                        <input type="file" class="form-control @error('kartu_keluarga') is-invalid @enderror" name="kartu_keluarga" />
                                        @error('kartu_keluarga')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Akte Kelahiran</label>
                                        <input type="file" class="form-control @error('akte_kelahiran') is-invalid @enderror" name="akte_kelahiran" />
                                        @error('akte_kelahiran')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Surat Kelakuan Baik</label>
                                        <input type="file" class="form-control @error('surat_kelakuan_baik') is-invalid @enderror" name="surat_kelakuan_baik" />
                                        <small class="text-danger">Surat Kelakuan Baik dari sekolah asal.</small>
                                        @error('surat_kelakuan_baik')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Surat Sehat</label>
                                        <input type="file" class="form-control @error('surat_sehat') is-invalid @enderror" name="surat_sehat" />
                                        <small class="text-danger">Surat Sehat dari RS/Puskesmas atau Klinik.</small>
                                        @error('surat_sehat')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Surat Tidak Buta Warna</label>
                                        <input type="file" class="form-control @error('surat_tidak_buta_warna') is-invalid @enderror" name="surat_tidak_buta_warna" />
                                        <small class="text-danger">Surat Tidak Buta Warna dari RS/Puskesmas atau Klinik.</small>
                                        @error('surat_tidak_buta_warna')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Rapor</label>
                                        <input type="file" class="form-control @error('rapor') is-invalid @enderror" name="rapor" />
                                        <small class="text-danger">Rapor Semester 1-4, harap satukan pada 1 file .pdf.</small>
                                        @error('rapor')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Foto</label>
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" />
                                        <small class="text-danger">Pas Foto ukuran 3x4 dengan latar belakang merah dan memakai baju sekolah.</small>
                                        @error('foto')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Ijazah</label>
                                        <input type="file" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah" />
                                        <small class="text-danger">Dapat menyusul.</small>
                                        @error('ijazah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="/home" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection