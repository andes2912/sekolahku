<div class="disabled-backdrop-ex">
  <!-- Modal -->
  <div class="modal fade text-left modal-primary" id="addBank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel4">Tambah Akun Bank </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form action="{{route('settings.add.bank')}}" method="POST">
                @csrf
                  <div class="row">
                    <div div class="col-6">
                      @php
                          $bank = App\Models\Bank::get();
                      @endphp
                        <div class="form-group">
                            <label for="basicInput">Nama Bank</label>
                            <select name="bank_name" class="form-control select2">
                              <option>-- Pilih Bank --</option>
                              @foreach ($bank as $banks)
                                <option value="{{$banks->nama_bank}}">{{$banks->nama_bank}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div div class="col-6">
                        <div class="form-group">
                          <label for="account-username">Nomor Rekening</label>
                          <input type="number" class="form-control" name="account_number" placeholder="Nomor Rekening" value="" />
                        </div>
                    </div>
                    <div div class="col-6">
                        <div class="form-group">
                            <label for="account-e-mail">Nama Pemilik</label>
                            <input type="text" class="form-control" name="account_name" placeholder="Nama Pemilik" value="" />
                        </div>
                    </div>
                    <div div class="col-6">
                        <div class="form-group">
                          <label for="basicInput">Jumlah</label>
                          <div class="demo-inline-spacing">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="active" name="is_active" value="1" class="custom-control-input" />
                                <label class="custom-control-label" for="active">Aktif</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="notActive" name="is_active" value="0" class="custom-control-input" />
                                <label class="custom-control-label" for="notActive">Tidak Aktif</label>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
              </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</div>