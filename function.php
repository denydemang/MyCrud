<?php
$conn = mysqli_connect('localhost', 'root', '', 'databaseku') or die($conn);

function simpan($POST)
{
    global $conn;
    $nim = htmlspecialchars($POST['nim']);
    $nama = htmlspecialchars($POST['nama']);
    $kelas = htmlspecialchars($POST['kelas']);
    $email = htmlspecialchars($POST['email']);
    $jk = htmlspecialchars($POST['jk']);
    $jurusan = htmlspecialchars($POST['jurusan']);
    $prodi = htmlspecialchars($POST['prodi']);
    $gambar = uploadgambar();

    $query = "INSERT INTO `mahasiswa` (`Nim`, `Nama`, `Kelas`, `Email`, `Jenis_Kelamin`, `Prodi`,`Jurusan`,`Gambar`)
    VALUES ('$nim','$nama','$kelas','$email','$jk','$prodi','$jurusan','$gambar')";

    mysqli_query($conn, $query);
    $berhasil = mysqli_affected_rows($conn);
    return $berhasil;
};
function tampildata($query)
{
    global $conn;
    $data = mysqli_query($conn, $query);
    $tampungdata = [];
    while ($datas = mysqli_fetch_assoc($data)) {
        $tampungdata[] = $datas;
    }
    return $tampungdata;
}
function tampilsemuadata()
{
    global $conn;
    $data = mysqli_query($conn, 'SELECT * FROM mahasiswa');
    $tampungdata = [];
    while ($datas = mysqli_fetch_assoc($data)) {
        $tampungdata[] = $datas;
    }
    return $tampungdata;
};
function hapusdata($nim)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa where Nim='$nim'");
    return mysqli_affected_rows($conn);
};
function kodeotomatis()
{
    global $conn;
    $max = mysqli_query($conn, "SELECT max(Nim) as kodeterbesar FROM mahasiswa");
    $data = mysqli_fetch_assoc($max);
    $kodebarang = $data['kodeterbesar'];
    // $urutan =(int) substr($kodebarang, 5, 3);
    // $urutan++;

    if ($kodebarang ==  null) {
        $kodebarang = 44118001;
    } else {
        $kodebarang++;
    }
    echo $kodebarang;
    // $huruf ="BRG";
    // $kodebarang = $huruf. sprintf("%03s",$urutan);
    // echo $kodebarang;

};
function ubahdata($POST)
{
    global $conn;
    $nim = htmlspecialchars($POST['nim']);
    $nama = htmlspecialchars($POST['nama']);
    $kelas = htmlspecialchars($POST['kelas']);
    $email = htmlspecialchars($POST['email']);
    $jk = htmlspecialchars($POST['jk']);
    $jurusan = htmlspecialchars($POST['jurusan']);
    $prodi = htmlspecialchars($POST['prodi']);
    mysqli_query($conn, "UPDATE `mahasiswa` SET `Nama` = '$nama', `Kelas` = '$kelas', `Email` = '$email', `Jenis_Kelamin` = '$jk', `Prodi` = '$prodi', `Jurusan` = '$jurusan'  WHERE `mahasiswa`.`Nim` = '$nim'");
    return mysqli_affected_rows($conn);
};
function cari($keyword)
{
    global $conn;
    $query = "SELECT * FROM `mahasiswa` where 
    `Nim` LIKE '%$keyword%' OR
    `Nama` LIKE '%$keyword%' OR
    `Kelas` LIKE '%$keyword%' OR
    `Email` LIKE '%$keyword%' OR
    `Jenis_Kelamin` LIKE '%$keyword%' OR
    `Jurusan` LIKE '%$keyword%' OR
    `Prodi` LIKE '%$keyword%' ";
    $data = mysqli_query($conn, $query);
    $tampungdata = [];
    while ($datas = mysqli_fetch_assoc($data)) {
        $tampungdata[] = $datas;
    }
    return $tampungdata;
};

function uploadgambar()
{
    $namafile = $_FILES["gambar"]["name"];
    $tmpName = $_FILES["gambar"]["tmp_name"];
    $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);
    // generate ke nama baru
    $namabaru = uniqid();
    $namabaru .= '.';
    $namabaru .= $ekstensifile;

    // Pindah file ke directory yang kita inginkan
    move_uploaded_file($tmpName, 'img/' . $namabaru);
    //kembalikan nilai namabaru
    return $namabaru;
};
function tambahuser($data)
{
    global $conn;
    $nama = $data["namadepan"] . " " . $data["namabelakang"];
    $email = $data["email"];
    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["pw"]);
    $passwordacak = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO `user` (`id`,`nama`,`email`,`username`,`password`)
                VALUES ('','$nama','$email','$username','$passwordacak')

    ");

    return mysqli_affected_rows($conn);
}
