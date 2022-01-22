<?php session_start();
if (!isset($_SESSION["login"])) {
    header('Location: Login.php');
};
?>
<?php
require 'function.php';
require 'formeditmahasiswa.php';
require 'tambahmahasiswa.php';

//manual searching
// if (!isset($_SESSION['keyword'])) {
//     $_SESSION['keyword'] = '';
// }
// if (isset($_POST['refresh'])) {
//     $_SESSION['keyword'] = '';
//     $halamanAktif = 1;
// }

// Manual Searching
// if (isset($_POST["search"])) {
//     $keyword = $_POST['keyword'];
//     $_SESSION['keyword'] = $keyword;
// } else {
//     $keyword = $_SESSION['keyword'];
// }
if (!isset($_SESSION['keywords'])) {
    $_SESSION['keywords'] = '';
}
$keyword = $_SESSION['keywords'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="jsku/jquery.min.js"></script>
    <script src="jsku/jquery.validate.min.js"></script>
    <script src="jsku/additional-methods.min.js"></script>
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <!-- <script src="jsku/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cssku/bootstrap.min.css"> -->

    <style>
        @import url('https://fonts.googleapis.com/css?family=Lobster');

        .brand {
            font-family: 'Lobster', cursive;
            font-size: 2rem;
        }

        .nav-link {
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
        }

        .error {
            color: red;
            font-style: italic;
        }

        body {
            background-color: #8e2de2;
            background: linear-gradient(to right, #4a00e0, #8e2de2);
        }

        th:last-child,
        td:last-child {
            position: sticky;
            right: -1px;
        }

        td:last-child {
            background-color: #E2E3E5;
        }

        th:last-child {
            background-color: #E2E3E5;
        }

        .flek {
            display: flex;
            justify-content: space-between;
        }

        .demang {
            background-color: blue;
        }
    </style>
    <title>WEB MAHASISWA DEMANG</title>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg relative-top shadow" style="background: linear-gradient(to right ,#4a00e0,#8e2de2);border-bottom:2px solid white">
        <div class="container">
            <a href="#" class="navbar-brand brand">Demang Corp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="#">Data Pembelian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <div class="container-fluid my-5">
        <div id="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                echo $_SESSION['info'];
                                            }
                                            unset($_SESSION['info']); ?>"></div>
        <div class="container" style="height:900px;">
            <div class="card">
                <div class="card-header text-center" style="background-color: #92359e">
                    <h1 class="fw-bold text-white">DATA MAHASISWA</h1>
                </div>
                <div class="ps-3" style="margin-bottom:-2px;"><i style="color:blue; font-size:20px;" class="fas fa-print"></i><a href="print2.php" style="color:blue; font-size:20px;">PRINT</a></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-5 col-lg-5 col-sm-2">
                            <button id="tambah" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#TambahMahasiswa">
                                <i class="fas fa-user-plus"></i>
                                <span class="text-nowrap d-none d-sm-none d-md-inline d-lg-inline">Tambah Data Mahasiswa</span>
                            </button>
                        </div>
                        <!-- Manual Searching -->
                        <!-- <//?php if (!$_SESSION['keyword'] == "") : ?>
                            <div style="margin-top:-10px;">
                                <span style="font-size:18px;font-weight:bold;">Menampilkan Kata Kunci "<//?= $_SESSION//['keyword'] ?>"</span>
                                <form action="index.php" method="post">
                                    <button type="submit" name="refresh">refresh</button>
                                </form>
                            </div>
                        <//?php endif; ?> -->
                        <div>
                            <form action="index.php" method="post">
                                <div class="d-flex">
                                    <input type="input" id="keywords" name="keyword" value="<?= $_SESSION['keywords']; ?>" class="form-control form-input" style="height:35px" placeholder="Cari..." autofocus autocomplete="off">
                                    <!-- <button type="submit" id="search" name="search" class="btn btn-white"><i class="fas fa-search form-input" style="color:#9ca3af"></i></button> -->
                                </div>
                            </form>
                        </div>
                        <!-- End Manual Searching -->
                    </div>
                    <div id="bungkus-table">
                        <?php
                        $jumlahDataPerHalaman = 4;
                        $jumlahSeluruhData = count(tampildata("SELECT * FROM `mahasiswa` 
                                                        where 
                                                            `Nim` LIKE '%$keyword%' OR
                                                            `Nama` LIKE '%$keyword%' OR
                                                            `Kelas` LIKE '%$keyword%' OR
                                                            `Email` LIKE '%$keyword%' OR
                                                            `Jenis_Kelamin` LIKE '%$keyword%' OR
                                                            `Jurusan` LIKE '%$keyword%' OR
                                                            `Prodi` LIKE '%$keyword%'"));
                        //menentukan jumlah keseluruhan halaman dengan dibulatkan nilainya keatas
                        $jumlahHalaman = ceil($jumlahSeluruhData / $jumlahDataPerHalaman);
                        $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        // menentukan index data awal setiap halamannya jika data perhal jmlhnya 4
                        //analoginya
                        //jika di halaman ke 1 , maka index data dimulai ke 0
                        //jika di halaman ke 2 , maka index data dimulai ke 4
                        //jika di halaman ke 3, maka index data dimulai ke 8
                        //maka hasilnya adalah
                        $indexawal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
                        $mahasiswas = tampildata("SELECT * FROM `mahasiswa` 
                                                    where 
                                                        `Nim` LIKE '%$keyword%' OR
                                                        `Nama` LIKE '%$keyword%' OR
                                                        `Kelas` LIKE '%$keyword%' OR
                                                        `Email` LIKE '%$keyword%' OR
                                                        `Jenis_Kelamin` LIKE '%$keyword%' OR
                                                        `Jurusan` LIKE '%$keyword%' OR
                                                        `Prodi` LIKE '%$keyword%'
                                                        LIMIT $indexawal,$jumlahDataPerHalaman");
                        ?>
                        <?php $index = $indexawal + 1; ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover text-nowrap">
                                <thead class="table-secondary">
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Prodi</th>
                                    <th>Jurusan</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php foreach ($mahasiswas as $mahasiswa) : ?>
                                        <tr>
                                            <td class="align-middle"><?= $index; ?></td>
                                            <td class="align-middle"><?= $mahasiswa["Nim"] ?></td>
                                            <td><img src="img/<?= $mahasiswa["Gambar"] ?>" alt="" style="width:100px;"></td>
                                            <td class="align-middle"><?= $mahasiswa["Nama"] ?></td>
                                            <td class="align-middle"><?= $mahasiswa["Kelas"] ?></td>
                                            <td class="align-middle"><?= $mahasiswa["Email"] ?></td>
                                            <td class="align-middle"><?= $mahasiswa["Jenis_Kelamin"] ?></td>
                                            <td class="align-middle"><?= $mahasiswa["Prodi"] ?></td>
                                            <td class="align-middle"><?= $mahasiswa["Jurusan"] ?></td>
                                            <td class="align-middle">
                                                <a href="hapus.php?nim=<?= $mahasiswa['Nim'] ?>" data-namaaa="<?= $mahasiswa['Nama']; ?>" data-nimmm="<?= $mahasiswa['Nim']; ?>" class="sm btn btn-danger tombol hapusdata">
                                                    <i class="fas fa-trash-alt"></i>
                                                    Hapus
                                                </a>
                                                <button class="sm btn btn-success tombol" data-bs-target="#EditMahasiswa" data-bs-toggle="modal" id="BtnUbah" data-nim="<?= $mahasiswa['Nim']; ?>" data-nama="<?= $mahasiswa['Nama']; ?>" data-kelas="<?= $mahasiswa['Kelas']; ?>" data-email="<?= $mahasiswa['Email']; ?>" data-jk="<?= $mahasiswa['Jenis_Kelamin']; ?>" data-prodi="<?= $mahasiswa['Prodi']; ?>" data-jurusan="<?= $mahasiswa['Jurusan']; ?>"><i class="fas fa-edit"></i>
                                                    <span class="d-none d-md-inline d-lg-inline">Edit</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $index++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="..." class="mt-3">
                            <?php $JumlahNomorHal = 3;
                            if ($halamanAktif > $JumlahNomorHal) {
                                $startNumber = $halamanAktif - $JumlahNomorHal;
                            } else {
                                $startNumber = 1;
                            }
                            if ($halamanAktif < ($jumlahHalaman - $JumlahNomorHal)) {
                                $end_number = $halamanAktif + $JumlahNomorHal;
                            } else {
                                $end_number = $jumlahHalaman;
                            }
                            ?>
                            <ul class="pagination">
                                <?php if ($halamanAktif == 1) : ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="?page=<?= ($halamanAktif) - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                <?php else : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= ($halamanAktif) - 1 ?>" tabindex="-1">Previous</a>
                                    </li>
                                <?php endif; ?>
                                <?php for ($i = $startNumber; $i <= $end_number; $i++) : ?>
                                    <?php if ($i == $halamanAktif) : ?>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i ?></a>
                                        </li>
                                    <?php else : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <?php if ($halamanAktif == $jumlahHalaman) : ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                                    </li>
                                <?php else : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= ($halamanAktif) + 1 ?>" tabindex="-1">Next</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center text-white p-1" style="background-color:#5917aa ;font-family:cursive">
            © 2021 Copyright:
            <span class="text-reset fw-bold">DMK CORP</span>
            <div class="fw-bold">MADE WITH <span class="text-danger"> &#10084;</span></div>
            <div class="my-3 me-2">
                <a href="https://www.facebook.com" target="_blank"><span style="font-size:25px;" class="mx-1 text-white"><i class="fab fa-facebook"></i></span></a>
                <a href="https://www.instagram.com" target="_blank"><span style="font-size:25px;" class="mx-1 my-3 text-white"><i class="fab fa-instagram"></i></span></a>
                <a href="https://www.whatsapp.com" target="_blank"><span style="font-size:25px;" class="mx-1 my-3 text-white"><i class="fab fa-whatsapp"></i></span></a>
            </div>
        </div>
    </footer>
</body>
<!-- <script src="jsku/searchajax.js"></script> -->
<script src="jsku/searchajaxjquery.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="jsku/sweetalert.js"></script>
<script src="jsku/logicjurusan1.js"></script>
<script src="jsku/logicjurusan2.js"></script>
<script src="jsku/logicisiform2.js"></script>
<script src="jsku/validasiform.js"></script>
<script>
    $("#closemodal2").click(function() {
        $("#form2").validate().resetForm();
    });
    $("#closemodal1").click(function() {
        $("#form1").validate().resetForm();
        document.getElementById("form1").reset()
    });
    $('#TambahMahasiswa').on('shown.bs.modal', function() {
        $("#form1 #nama1").focus();
    });
</script>

</html>