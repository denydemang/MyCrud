<div class="modal fade" id="EditMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header" class="text-center" style="background: linear-gradient(to right ,#4a00e0,#8e2de2); color:white">
        <h5 class="modal-title" id="exampleModalLabel" class="text-center">EDIT DATA MAHASISWA</h5>
        <button type="button" class="btn-close" id="closemodal2" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background-color:whitesmoke">
        <form id="form2" method="post" action="editdata.php">
          <div class="mb-3">
            <label for="nim" class="form-label">Nim</label>
            <input type="text" class="form-control" name="nim" id="nim2" readonly value="">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama2" autocomplete="off" oninput="this.value = this.value.toUpperCase()">
          </div>
          <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" name="kelas" id="kelas2" autocomplete="off" oninput="this.value = this.value.toUpperCase()" />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" autocomplete="off" id="email2">
          </div>
          <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <div class="jeniskelamin">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="jkl" value="Laki-laki">
                <label class="form-check-label" for="jk">
                  Laki-laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="jkp" value="Perempuan">
                <label class="form-check-label" for="jk">
                  Perempuan
                </label>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select my-1 mr-sm-2" id="jurusan2" name="jurusan">
              <option disabled>Pilih Jurusan...</option>
              <option value="Akuntansi">Akuntansi</option>
              <option value="Administrasi Bisnis">Administrasi Bisnis</option>
              <option value="Mesin">Mesin</option>
              <option value="Teknik Elektro">Teknik Elektro</option>
              <option value="Teknik Sipil">Teknik Sipil</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <select class="form-select my-1 mr-sm-2" id="prodi2" name="prodi">

            </select>
          </div>

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Ubah">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
</script>