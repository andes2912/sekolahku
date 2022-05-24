<div class="disabled-backdrop-ex">
  <!-- Modal -->
  <div class="modal fade text-left modal-primary" id="modalPeminjam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel4">Update Peminjam Buku </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id_peminjam" id="id_peminjam">
                <div class="row">
                  <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">Kode Buku</label>
                          <input type="text" class="form-control" id="kode_buku" readonly>
                      </div>
                  </div>
                  <div div class="col-6">
                      <div class="form-group">
                          <label for="basicInput">Peminjam</label>
                          <input type="text" class="form-control" id="peminjam" readonly>
                      </div>
                  </div>
                  <div div class="col-12">
                      <div class="form-group">
                          <label for="basicInput">Judul Buku</label>
                          <input type="text" class="form-control" id="name" readonly>
                      </div>
                  </div>
                  <div div class="col-12">
                      <div class="form-group">
                          <label for="basicInput">Tanggal Kembali</label> <span class="text-danger">*</span>
                          <input type="date" class="form-control flatpickr-basic @error('lateness') is-invalid @enderror" id="lateness" name="lateness" />
                          @error('lateness')
                              <div class="invalid-feedback">
                              <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                      </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" id="updatePeminjam" class="btn btn-primary">Update</button>
              </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</div>