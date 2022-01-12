<div class="modal fade" id="TambahMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header" class="text-center" style=" background: linear-gradient(to right ,#4a00e0,#8e2de2); color:white">
        <h5 class="modal-title" id="exampleModalLabel" class="text-center">TAMBAH MAHASISWA</h5>
        <button id="closemodal1" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="background-color:whitesmoke">
        <div class="container">
          <form id="form1" method="post" action="simpandata.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nim1" class="form-label">Nim</label>
              <input type="text" class="form-control" name="nim" style="width:60%" id="nim1" readonly value="<?php kodeotomatis() ?>">
            </div>
            <div class="mb-3">
              <label for="nama1" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama1" autocomplete="off" oninput="this.value = this.value.toUpperCase()" placeholder="Silakan Isikan Nama Mahasiswa">
            </div>
            <div class="mb-3">
              <label for="kelas1" class="form-label">Kelas</label>
              <input type="text" class="form-control" name="kelas" id="kelas1" autocomplete="off" oninput="this.value = this.value.toUpperCase()" placeholder="Silakan Masukkan Kelas" />
            </div>
            <div class="mb-3">
              <label for="email1" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" id="email1" autocomplete="off" placeholder="Silakan Isikan Email Yang Valid">
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label">Upload File</label>
              <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="mb-3">
              <label for="jk" class="form-label">Jenis Kelamin</label>
              <div class="jeniskelamin">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki-laki">
                  <label class="form-check-label" for="jk1">
                    Laki-laki
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jk" id="jk2" value="Perempuan">
                  <label class="form-check-label" for="jk2">
                    Perempuan
                  </label>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="jurusan1" class="form-label">Jurusan</label>
              <select class="form-select my-1 mr-sm-2" id="jurusan1" name="jurusan">
                <option disabled selected>Pilih Jurusan...</option>
                <option value="Akuntansi">Akuntansi</option>
                <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                <option value="Mesin">Mesin</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="prodi1" class="form-label">Prodi</label>
              <select class="form-select" id="prodi1" name="prodi">
                <option disabled selected>Pilih Program Studi...</option>
              </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      </div>
    </div>
  </div>

</div>