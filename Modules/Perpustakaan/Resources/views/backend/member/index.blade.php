@extends('layouts.backend.app')

@section('title')
    Data Member
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
                    <h2> Data Member</h2>
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
                                    <h4 class="card-title">Data Member <button type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="false" data-target="#addMember">Tambah</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Member Sejak</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($member as $key => $members)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$members->name}} </td>
                                                    <td> {{$members->is_active == 0 ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    <td> {{$members->created_at}} </td>
                                                    <td>
                                                        <a href="" class="btn btn-success btn-sm">edit</a>
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
        <div class="disabled-backdrop-ex">
          <!-- Modal -->
          <div class="modal fade text-left modal-primary" id="addMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel4">Tambah Member</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <form action=" {{route('member.store')}} " method="post">
                          @csrf
                          <div class="col-12">
                              <div class="form-group">
                                  <select name="user_id" class="select2 form-control @error('user_id') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($user as $users)
                                      <option value=" {{$users->id}} "> {{$users->name}} </option>
                                    @endforeach
                                  </select>
                                  @error('user_id')
                                      <div class="invalid-feedback">
                                      <strong>{{ $message }}</strong>
                                      </div>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Tambah</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
      @if (count($errors) > 0)
          $('#addMember').modal('show');
      @endif
    </script>
@endsection