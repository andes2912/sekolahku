<div class="disabled-backdrop-ex">
  <!-- Modal -->
  <div class="modal fade text-left modal-primary" id="modalPembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel4">Konfirmasi Pembayaran </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id_payment" id="id_payment">
                <div class="row">
                  <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">NISN</label>
                          <input type="text" class="form-control" id="nisn" readonly>
                      </div>
                  </div>
                  <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">NAMA</label>
                          <input type="text" class="form-control" id="name" readonly>
                      </div>
                  </div>
                  <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">Pembayaran Bulan</label>
                          <input type="text" class="form-control" id="month" readonly>
                      </div>
                  </div>
                  <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">Jumlah</label>
                          <input type="text" class="form-control" id="amount" readonly>
                      </div>
                  </div>

                   <div class="col-12">
                     <h5>Detail Pembayaran</h5>
                   </div>
                    <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">Nama Pengirim</label>
                          <input type="text" class="form-control" id="sender" readonly>
                      </div>
                    </div>
                    <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">Bank Pengirim</label>
                          <input type="text" class="form-control" id="banksender" readonly>
                      </div>
                    </div>
                    <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">Tanggal Transfer</label>
                          <input type="text" class="form-control" id="datefile" readonly>
                      </div>
                    </div>
                    <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">Bank Tujuan</label>
                          <input type="text" class="form-control" id="destinationbank" readonly>
                      </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" id="konfirmasiPembayaran" class="btn btn-primary">Konfirmasi</button>
              </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</div>
