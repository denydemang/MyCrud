$(document).ready(function(){
    
    $(".card-body #BtnUbah").click(function(){
        //tampung data dari data di button edit
        let nim =$(this).data('nim');
        let nama =$(this).data('nama');
        let kelas =$(this).data('kelas');
        let email =$(this).data('email');
        let jk =$(this).data('jk');
        let jurusan = $(this).data('jurusan');
        let prodi = $(this).data('prodi');
        $("#form2 #nim2").val(nim);
        $("#form2 #nama2").val(nama);
        $("#form2 #kelas2").val(kelas);
        $("#form2 #email2").val(email);
        console.log(jk);
       
        //logika isi otomatis form dan option berdasarkan data yang ingin diedit user
        if (prodi =="Komputerisasi Akuntansi" && jurusan == "Akuntansi"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi" selected >Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled selected>Pilih Program Studi...</option><option value="Komputerisasi Akuntansi" selected >Komputerisasi Akuntansi</option><option value="Perbankan Syariah">Perbankan Syariah</option><option value="Akuntansi Manajerial">Akuntansi Manajerial</option><option value="Analis Keuangan">Analis Keuangan</option><option value="D3 Akuntansi">D3 Akuntansi</option>');
        }
        else if (prodi =="Perbankan Syariah" && jurusan == "Akuntansi"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi" selected >Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option><option selected value="Perbankan Syariah">Perbankan Syariah</option><option value="Akuntansi Manajerial">Akuntansi Manajerial</option><option value="Analis Keuangan">Analis Keuangan</option><option value="D3 Akuntansi">D3 Akuntansi</option>');
        }
        else if (prodi =="D3 Akuntansi" && jurusan == "Akuntansi"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi" selected >Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option><option value="Perbankan Syariah">Perbankan Syariah</option><option value="Akuntansi Manajerial">Akuntansi Manajerial</option><option value="Analis Keuangan">Analis Keuangan</option><option selected value="D3 Akuntansi">D3 Akuntansi</option>');
        }
        else if (prodi =="Akuntansi Manajerial" && jurusan == "Akuntansi"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi" selected >Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option><option value="Perbankan Syariah">Perbankan Syariah</option><option value="Akuntansi Manajerial" selected>Akuntansi Manajerial</option><option value="Analis Keuangan">Analis Keuangan</option><option selected value="D3 Akuntansi">D3 Akuntansi</option>');
        }
        else if (prodi =="Analis Keuangan" && jurusan == "Akuntansi"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi" selected >Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option><option value="Perbankan Syariah">Perbankan Syariah</option><option value="Akuntansi Manajerial" selected>Akuntansi Manajerial</option><option value="Analis Keuangan">Analis Keuangan</option><option selected value="D3 Akuntansi">D3 Akuntansi</option>');
        }
        else if (prodi =="Administrasi Bisnis Terapan" && jurusan == "Administrasi Bisnis"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis" selected>Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled >Pilih Program Studi...</option><option value="Administrasi Bisnis Terapan" selected>Administrasi Bisnis Terapan</option><option value="Manajemen Bisnis Internasional">Manajemen Bisnis Internasional</option><option value="Manajemen Pemasaran">Manajemen Pemasaran</option><option value="D3 Administrasi Bisnis">D3 Administrasi Bisnis</option>');
        }
        else if (prodi =="Manajemen Bisnis Internasional" && jurusan == "Administrasi Bisnis"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis" selected>Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled >Pilih Program Studi...</option><option value="Administrasi Bisnis Terapan">Administrasi Bisnis Terapan</option><option value="Manajemen Bisnis Internasional" selected>Manajemen Bisnis Internasional</option><option value="Manajemen Pemasaran">Manajemen Pemasaran</option><option value="D3 Administrasi Bisnis">D3 Administrasi Bisnis</option>');
        }
        else if (prodi =="Manajemen Pemasaran" && jurusan == "Administrasi Bisnis"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis" selected>Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled >Pilih Program Studi...</option><option value="Administrasi Bisnis Terapan">Administrasi Bisnis Terapan</option><option value="Manajemen Bisnis Internasional">Manajemen Bisnis Internasional</option><option value="Manajemen Pemasaran" selected>Manajemen Pemasaran</option><option value="D3 Administrasi Bisnis">D3 Administrasi Bisnis</option>');
        }
        else if (prodi =="D3 Administrasi Bisnis" && jurusan == "Administrasi Bisnis"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis" selected>Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled >Pilih Program Studi...</option><option value="Administrasi Bisnis Terapan">Administrasi Bisnis Terapan</option><option value="Manajemen Bisnis Internasional">Manajemen Bisnis Internasional</option><option value="Manajemen Pemasaran">Manajemen Pemasaran</option><option value="D3 Administrasi Bisnis" selected>D3 Administrasi Bisnis</option>');
        }
        else if (prodi =="D3 Teknik Mesin" && jurusan == "Mesin"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin" selected>Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="D3 Teknik Mesin" selected>D3 Teknik Mesin</option><option value="Teknik Mesin & Perawatan">Teknik Mesin & Perawatan</option><option value="Teknik Konversi Energi">Teknik Konversi Energi</option>');
        }
        else if (prodi =="Teknik Mesin & Perawatan" && jurusan == "Mesin"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin" selected>Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="D3 Teknik Mesin">D3 Teknik Mesin</option><option value="Teknik Mesin & Perawatan" selected>Teknik Mesin & Perawatan</option><option value="Teknik Konversi Energi">Teknik Konversi Energi</option>');
        }
        else if (prodi =="Teknik Konversi Energi" && jurusan == "Mesin"){
            $("#form2 #jurusan2").html(' <option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin" selected>Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="D3 Teknik Mesin">D3 Teknik Mesin</option><option value="Teknik Mesin & Perawatan">Teknik Mesin & Perawatan</option><option value="Teknik Konversi Energi" selected>Teknik Konversi Energi</option>');
        }
        else if (prodi =="Teknik Listrik" && jurusan == "Teknik Elektro"){
            $("#form2 #jurusan2").html('<option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro" selected>Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Teknik Listrik" selected>Teknik Listrik</option><option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option><option value="Teknik Informatika">Teknik Informatika</option>');
        }
        else if (prodi =="Teknik Telekomunikasi" && jurusan == "Teknik Elektro"){
            $("#form2 #jurusan2").html('<option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro" selected>Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Teknik Listrik">Teknik Listrik</option><option value="Teknik Telekomunikasi" selected>Teknik Telekomunikasi</option><option value="Teknik Informatika">Teknik Informatika</option>');
        }
        else if (prodi =="Teknik Informatika" && jurusan == "Teknik Elektro"){
            $("#form2 #jurusan2").html('<option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro" selected>Teknik Elektro</option><option value="Teknik Sipil">Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Teknik Listrik">Teknik Listrik</option><option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option><option value="Teknik Informatika" selected>Teknik Informatika</option>');
        }
        else if (prodi =="Perancangan Jalan & Jembatan" && jurusan == "Teknik Sipil"){
            $("#form2 #jurusan2").html('<option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil" selected>Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Perancangan Jalan & Jembatan" selected>Perancangan Jalan & Jembatan</option><option value="Teknik Perawatan & Perbaikan Gedung">Teknik Perawatan & Perbaikan Gedung</option><option value="D3-Konstruksi Sipil">D3-Konstruksi Sipil</option><option value="D3-Konstruksi Gedung">D3-Konstruksi Gedung</option>');
        }
        else if (prodi =="Teknik Perawatan & Perbaikan Gedung" && jurusan == "Teknik Sipil"){
            $("#form2 #jurusan2").html('<option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil" selected>Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Perancangan Jalan & Jembatan">Perancangan Jalan & Jembatan</option><option value="Teknik Perawatan & Perbaikan Gedung" selected>Teknik Perawatan & Perbaikan Gedung</option><option value="D3-Konstruksi Sipil">D3-Konstruksi Sipil</option><option value="D3-Konstruksi Gedung">D3-Konstruksi Gedung</option>');
        }
        else if (prodi =="D3-Konstruksi Sipil" && jurusan == "Teknik Sipil"){
            $("#form2 #jurusan2").html('<option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil" selected>Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Perancangan Jalan & Jembatan">Perancangan Jalan & Jembatan</option><option value="Teknik Perawatan & Perbaikan Gedung">Teknik Perawatan & Perbaikan Gedung</option><option value="D3-Konstruksi Sipil" selected>D3-Konstruksi Sipil</option><option value="D3-Konstruksi Gedung">D3-Konstruksi Gedung</option>');
        }
        else if (prodi =="D3-Konstruksi Gedung" && jurusan == "Teknik Sipil"){
            $("#form2 #jurusan2").html('<option disabled >Pilih Jurusan...</option><option value="Akuntansi">Akuntansi</option><option value="Administrasi Bisnis">Administrasi Bisnis</option><option value="Mesin">Mesin</option><option value="Teknik Elektro">Teknik Elektro</option><option value="Teknik Sipil" selected>Teknik Sipil</option>');
            $("#form2 #prodi2").html('<option disabled>Pilih Program Studi...</option><option value="Perancangan Jalan & Jembatan">Perancangan Jalan & Jembatan</option><option value="Teknik Perawatan & Perbaikan Gedung">Teknik Perawatan & Perbaikan Gedung</option><option value="D3-Konstruksi Sipil">D3-Konstruksi Sipil</option><option value="D3-Konstruksi Gedung" selected>D3-Konstruksi Gedung</option>');
        }
        if (jk == "Laki-laki"){
            $("#form2 #jkl").prop("checked",true);
        }
        else if (jk == "Perempuan"){
            $("#form2 #jkp").prop("checked",true);
        }
        
        
        
    });
    
});




