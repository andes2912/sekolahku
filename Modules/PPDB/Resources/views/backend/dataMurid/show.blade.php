@extends('layouts.backend.app')

@section('title')
    Detail Calon Siswa
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
                        <form action=" {{route('data-murid.update',$murid->id)}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h4>Data Murid</h4> <br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{$murid->name}} " placeholder="Nama Lengkap" disabled />                                       
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
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=" {{$murid->email}}" placeholder="Email Address" disabled />                                       
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
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value=" {{$murid->muridDetail->nis}} " />                                       
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
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value=" {{$murid->muridDetail->nisn}} " />                                       
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
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value=" {{$murid->muridDetail->tempat_lahir}} " disabled/>                                       
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
                                        <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value=" {{$murid->muridDetail->tgl_lahir}} " disabled/>                                       
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
                                        <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value=" {{$murid->muridDetail->telp}} "disabled/>                                       
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
                                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value=" {{$murid->muridDetail->whatsapp}} " disabled/>                                       
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
                                        <select name="agama" class="form-control @error('agama') is-invalid @enderror" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="Islam" {{$murid->muridDetail->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
                                            <option value="Krtisten Katolik" {{$murid->muridDetail->agama == 'Krtisten Katolik' ? 'selected' : ''}}>Krtisten Katolik</option>
                                            <option value="Kristen Protestan" {{$murid->muridDetail->agama == 'Kristen Protestan' ? 'selected' : ''}}>Kristen Protestan</option>
                                            <option value="Hindu" {{$murid->muridDetail->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                            <option value="Budha" {{$murid->muridDetail->agama == 'Budha' ? 'selected' : ''}}>Budha</option>
                                            <option value="Konghucu" {{$murid->muridDetail->agama == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
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
                                        <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" value=" {{$murid->muridDetail->asal_sekolah}} " disabled/>                                       
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
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="3" disabled> {{$murid->muridDetail->alamat}}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> <br>
                            <h4>Data Ayah</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Ayah</label>
                                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value=" {{$murid->dataOrtu->nama_ayah}} " placeholder="Nama Ayah" disabled />                                       
                                        @error('nama_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp Ayah</label>
                                        <input type="text" class="form-control @error('telp_ayah') is-invalid @enderror" name="telp_ayah" value=" {{$murid->dataOrtu->telp_ayah}} " placeholder="telp Ayah" disabled />                                       
                                        @error('telp_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pendidikan Ayah</label>
                                        <select name="pendidikan_ayah" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="SD" {{$murid->dataOrtu->pendidikan_ayah == 'SD' ? 'selected' : ''}} >SD</option>
                                            <option value="SMP" {{$murid->dataOrtu->pendidikan_ayah == 'SMP' ? 'selected' : ''}}>SMP</option>
                                            <option value="SMA/SMK" {{$murid->dataOrtu->pendidikan_ayah == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                            <option value="SI" {{$murid->dataOrtu->pendidikan_ayah == 'S1' ? 'selected' : ''}}>SI</option>
                                            <option value="S2" {{$murid->dataOrtu->pendidikan_ayah == 'S2' ? 'selected' : ''}}>S2</option>
                                            <option value="S3" {{$murid->dataOrtu->pendidikan_ayah == 'S3' ? 'selected' : ''}}>S3</option>
                                        </select>
                                        @error('pendidikan_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pekerjaan Ayah</label>
                                        <select name="pekerjaan_ayah" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="Wiraswasta" {{$murid->dataOrtu->pekerjaan_ayah == 'Wiraswasta' ? 'selected' : ''}} >Wiraswasta</option>
                                            <option value="Wirausaha" {{$murid->dataOrtu->pekerjaan_ayah == 'Wirausaha' ? 'selected' : ''}}>Wirausaha</option>
                                            <option value="ASN" {{$murid->dataOrtu->pekerjaan_ayah == 'ASN' ? 'selected' : ''}}>ASN</option>
                                            <option value="Buruh" {{$murid->dataOrtu->pekerjaan_ayah == 'Buruh' ? 'selected' : ''}}>Buruh</option>
                                        </select>
                                        @error('pendidiakn_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Lengkap</label>
                                        <textarea name="alamat_ayah" class="form-control @error('alamat_ayah') is-invalid @enderror" cols="30" rows="3" disabled> {{$murid->dataOrtu->alamat_ayah}} </textarea>
                                        @error('alamat_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> <br>
                            {{-- Data Ibu --}}
                            <h4>Data Ibu</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Ibu</label>
                                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value=" {{$murid->dataOrtu->nama_ibu}} " placeholder="Nama Ibu" disabled />                                       
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp Ibu</label>
                                        <input type="text" class="form-control @error('telp_ibu') is-invalid @enderror" name="telp_ibu" value=" {{$murid->dataOrtu->telp_ibu}} " placeholder="telp Ibu" disabled />                                       
                                        @error('telp_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pendidikan Ibu</label>
                                        <select name="pendidikan_ibu" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="SD" {{$murid->dataOrtu->pendidikan_ibu == 'SD' ? 'selected' : ''}} >SD</option>
                                            <option value="SMP" {{$murid->dataOrtu->pendidikan_ibu == 'SMP' ? 'selected' : ''}}>SMP</option>
                                            <option value="SMA/SMK" {{$murid->dataOrtu->pendidikan_ibu == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                            <option value="SI" {{$murid->dataOrtu->pendidikan_ibu == 'S1' ? 'selected' : ''}}>SI</option>
                                            <option value="S2" {{$murid->dataOrtu->pendidikan_ibu == 'S2' ? 'selected' : ''}}>S2</option>
                                            <option value="S3" {{$murid->dataOrtu->pendidikan_ibu == 'S3' ? 'selected' : ''}}>S3</option>
                                        </select>
                                        @error('pendidikan_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pekerjaan Ibu</label>
                                        <select name="pekerjaan_ibu" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="Ibu Rumah Tangga" {{$murid->dataOrtu->pekerjaan_ibu == 'Ibu Rumah Tangga' ? 'selected' : ''}}>Ibu Rumah Tangga</option>
                                            <option value="Wiraswasta" {{$murid->dataOrtu->pekerjaan_ibu == 'Wiraswasta' ? 'selected' : ''}} >Wiraswasta</option>
                                            <option value="Wirausaha" {{$murid->dataOrtu->pekerjaan_ibu == 'Wirausaha' ? 'selected' : ''}}>Wirausaha</option>
                                            <option value="ASN" {{$murid->dataOrtu->pekerjaan_ibu == 'ASN' ? 'selected' : ''}}>ASN</option>
                                            <option value="Buruh" {{$murid->dataOrtu->pekerjaan_ibu == 'Buruh' ? 'selected' : ''}}>Buruh</option>
                                        </select>
                                        @error('pendidiakn_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Lengkap</label>
                                        <textarea name="alamat_ibu" class="form-control @error('alamat_ibu') is-invalid @enderror" cols="30" rows="3" disabled> {{$murid->dataOrtu->alamat_ibu}} </textarea>
                                        @error('alamat_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Terima Murid</button>
                            <a href="/home" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection