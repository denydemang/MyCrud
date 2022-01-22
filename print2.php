<?php
require_once __DIR__ . '/vendor/autoload.php';
require 'function.php';
$mpdf = new \Mpdf\Mpdf();
$mahasiswas = tampilsemuadata();
$index = 1;

$html = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css"> -->
    <link rel="stylesheet" href="cssku/print.css">
    <title>Document</title>
</head>
';
$html .= '
<body>
';
$html .= '
<h1> DATA MAHASISWA </h1>
<table id="mahasiswa">
    <tr>
        <th>No</th>
        <th>Nim</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Prodi</th>
        <th>Jurusan</th>
    </tr>
';
foreach ($mahasiswas as $mahasiswa) {
    $html .= '
    <tr>
        <td>' . $index++ . '</td>
        <td>' . $mahasiswa["Nim"] . '</td>
        <td><img src="img/' . $mahasiswa["Gambar"] . '" alt="" style="width:50px;"></td>
        <td>' . $mahasiswa["Nama"] . '</td>
        <td>' . $mahasiswa["Kelas"] . '</td>
        <td>' . $mahasiswa["Email"] . '</td>
        <td>' . $mahasiswa["Jenis_Kelamin"] . '</td>
        <td>' . $mahasiswa["Prodi"] . '</td>
        <td>' . $mahasiswa["Jurusan"] . '</td>
    </tr>
';
};

$html .= '
</table>
</body>
';
$html .= '
</html>
';
$mpdf->WriteHTML($html);
$mpdf->Output();
