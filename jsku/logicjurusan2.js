$(document).ready(function () {
    $("#form2 #jurusan2").change(function () {
            var val = $(this).val();
            if (val == "Akuntansi") {
                $("#form2 #prodi2").html('<option disabled selected>Pilih Program Studi...</option><option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option><option value="Perbankan Syariah">Perbankan Syariah</option><option value="Akuntansi Manajerial">Akuntansi Manajerial</option><option value="Analis Keuangan">Analis Keuangan</option><option value="D3 Akuntansi">D3 Akuntansi</option>');
            } else if (val == "Administrasi Bisnis") {
                $("#form2 #prodi2").html('<option disabled selected>Pilih Program Studi...</option><option value="Administrasi Bisnis Terapan">Administrasi Bisnis Terapan</option><option value="Manajemen Bisnis Internasional">Manajemen Bisnis Internasional</option><option value="Manajemen Pemasaran">Manajemen Pemasaran</option><option value="D3 Administrasi Bisnis">D3 Administrasi Bisnis</option>');
            } else if (val == "Mesin") {
                $("#form2 #prodi2").html('<option disabled selected>Pilih Program Studi...</option><option value="D3 Teknik Mesin">D3 Teknik Mesin</option><option value="Teknik Mesin & Perawatan">Teknik Mesin & Perawatan</option><option value="Teknik Konversi Energi">Teknik Konversi Energi</option>');
            } else if (val == "Teknik Elektro") {
                $("#form2 #prodi2").html('<option disabled selected>Pilih Program Studi...</option><option value="Teknik Listrik">Teknik Listrik</option><option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option><option value="Teknik Informatika">Teknik Informatika</option>');
            } else if(val== "Teknik Sipil"){
                $("#form2 #prodi2").html('<option disabled selected>Pilih Program Studi...</option><option value="Perancangan Jalan & Jembatan">Perancangan Jalan & Jembatan</option><option value="Teknik Perawatan & Perbaikan Gedung">Teknik Perawatan & Perbaikan Gedung</option><option value="D3-Konstruksi Sipil">D3-Konstruksi Sipil</option><option value="D3-Konstruksi Gedung">D3-Konstruksi Gedung</option>');
            }
        });
    });
    