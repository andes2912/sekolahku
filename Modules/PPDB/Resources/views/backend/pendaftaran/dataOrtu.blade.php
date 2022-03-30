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
                        <h4>Data Ayah</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{url('ppdb/form-data-orangtua', Auth::id())}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Ayah</label>
                                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value=" {{old('nama_ayah')}} " placeholder="Nama Ayah" />                                       
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
                                        <input type="text" class="form-control @error('telp_ayah') is-invalid @enderror" name="telp_ayah" value=" {{old('telp_ayah')}} " placeholder="telp Ayah" />                                       
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
                                        <select name="pendidikan_ayah" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="SD" {{old('pendidikan_ayah') == 'SD' ? 'selected' : ''}} >SD</option>
                                            <option value="SMP" {{old('pendidikan_ayah') == 'SMP' ? 'selected' : ''}}>SMP</option>
                                            <option value="SMA/SMK" {{old('pendidikan_ayah') == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                            <option value="SI" {{old('pendidikan_ayah') == 'S1' ? 'selected' : ''}}>SI</option>
                                            <option value="S2" {{old('pendidikan_ayah') == 'S2' ? 'selected' : ''}}>S2</option>
                                            <option value="S3" {{old('pendidikan_ayah') == 'S3' ? 'selected' : ''}}>S3</option>
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
                                        <select name="pekerjaan_ayah" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="Wiraswasta" {{old('pekerjaan_ayah') == 'Wiraswasta' ? 'selected' : ''}} >Wiraswasta</option>
                                            <option value="Wirausaha" {{old('pekerjaan_ayah') == 'Wirausaha' ? 'selected' : ''}}>Wirausaha</option>
                                            <option value="ASN" {{old('pekerjaan_ayah') == 'ASN' ? 'selected' : ''}}>ASN</option>
                                            <option value="Buruh" {{old('pekerjaan_ayah') == 'Buruh' ? 'selected' : ''}}>Buruh</option>
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
                                        <textarea name="alamat_ayah" class="form-control @error('alamat_ayah') is-invalid @enderror" cols="30" rows="3"> {{old('alamat_ayah')}} </textarea>
                                        @error('alamat_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{-- Data Ibu --}}
                            <h4>Data Ibu</h4> <br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Ibu</label>
                                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value=" {{old('nama_ibu')}} " placeholder="Nama Ibu" />                                       
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
                                        <input type="text" class="form-control @error('telp_ibu') is-invalid @enderror" name="telp_ibu" value=" {{old('telp_ibu')}} " placeholder="telp Ibu" />                                       
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
                                        <select name="pendidikan_ibu" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="SD" {{old('pendidikan_ibu') == 'SD' ? 'selected' : ''}} >SD</option>
                                            <option value="SMP" {{old('pendidikan_ibu') == 'SMP' ? 'selected' : ''}}>SMP</option>
                                            <option value="SMA/SMK" {{old('pendidikan_ibu') == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                            <option value="SI" {{old('pendidikan_ibu') == 'S1' ? 'selected' : ''}}>SI</option>
                                            <option value="S2" {{old('pendidikan_ibu') == 'S2' ? 'selected' : ''}}>S2</option>
                                            <option value="S3" {{old('pendidikan_ibu') == 'S3' ? 'selected' : ''}}>S3</option>
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
                                        <select name="pekerjaan_ibu" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="Ibu Rumah Tangga" {{old('pekerjaan_ibu') == 'Ibu Rumah Tangga' ? 'selected' : ''}}>Ibu Rumah Tangga</option>
                                            <option value="Wiraswasta" {{old('pekerjaan_ibu') == 'Wiraswasta' ? 'selected' : ''}} >Wiraswasta</option>
                                            <option value="Wirausaha" {{old('pekerjaan_ibu') == 'Wirausaha' ? 'selected' : ''}}>Wirausaha</option>
                                            <option value="ASN" {{old('pekerjaan_ibu') == 'ASN' ? 'selected' : ''}}>ASN</option>
                                            <option value="Buruh" {{old('pekerjaan_ibu') == 'Buruh' ? 'selected' : ''}}>Buruh</option>
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
                                        <textarea name="alamat_ibu" class="form-control @error('alamat_ibu') is-invalid @enderror" cols="30" rows="3"> {{old('alamat_ibu')}} </textarea>
                                        @error('alamat_ibu')
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