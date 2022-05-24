@extends('layouts.backend.app')

@section('title')
    Data Penulis
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
                    <h2> Data Penulis</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Penulis</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama Penulis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($author as $key => $authors)
                                                <tr>
                                                    <td></td>
                                                    <td style="width: 10%"> {{$key+1}} </td>
                                                    <td> {{$authors->name}} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Tambah Penulis</h4>
                                </div>
                                <div class="card-body">
                                   <form action=" {{route('author.store')}} " method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="row">
                                          <div class="col-12">
                                              <div class="form-group">
                                                  <label for="basicInput">Name</label> <span class="text-danger">*</span>
                                                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{old('name')}} " placeholder="Nama" />
                                                  @error('name')
                                                      <div class="invalid-feedback">
                                                      <strong>{{ $message }}</strong>
                                                      </div>
                                                  @enderror
                                              </div>
                                          </div>
                                      </div>
                                      <button class="btn btn-primary" type="submit">Tambah</button>
                                      <button type="reset" class="btn btn-warning">Batal</button>
                                  </form>
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
