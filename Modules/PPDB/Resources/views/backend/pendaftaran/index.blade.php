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
                    <div class="card-body">
                        <form action=" {{url('ppdb/form-pendaftaran', Auth::id())}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{$user->name}} " placeholder="Nama Lengkap" />                                       
                                        @error('name')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=" {{$user->email}}" placeholder="Email Address" />                                       
                                        @error('email')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NIS</label>
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value=" {{$user->muridDetail->nis}} " disabled/>                                       
                                        @error('nis')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NISN</label>
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value=" {{$user->muridDetail->nisn}} " disabled/>                                       
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value=" {{$user->muridDetail->tempat_lahir}} "/>                                       
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value=" {{$user->muridDetail->tgl_lahir}} "/>                                       
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp</label>
                                        <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value=" {{$user->muridDetail->telp}} "/>                                       
                                        @error('telp')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No WhatsApp</label>
                                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value=" {{$user->muridDetail->whatsapp}} "/>                                       
                                        @error('whatsapp')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Agama</label>
                                        <select name="agama" class="form-control @error('agama') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            <option value="Islam" {{$user->muridDetail->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
                                            <option value="Krtisten Katolik" {{$user->muridDetail->agama == 'Krtisten Katolik' ? 'selected' : ''}}>Krtisten Katolik</option>
                                            <option value="Kristen Protestan" {{$user->muridDetail->agama == 'Kristen Protestan' ? 'selected' : ''}}>Kristen Protestan</option>
                                            <option value="Hindu" {{$user->muridDetail->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                            <option value="Budha" {{$user->muridDetail->agama == 'Budha' ? 'selected' : ''}}>Budha</option>
                                            <option value="Konghucu" {{$user->muridDetail->agama == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
                                        </select>
                                        @error('agama')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Asal Sekolah</label>
                                        <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" value=" {{$user->muridDetail->asal_sekolah}} "/>                                       
                                        @error('asal_sekolah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="3"> {{$user->muridDetail->alamat}}</textarea>
                                        @error('alamat')
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