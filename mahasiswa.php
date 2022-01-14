<?php session_start();
require 'function.php';

$keywords = $_GET['keyword'];
$_SESSION['keywords'] = $keywords;

$keyword = $_SESSION['keywords'];
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
                        <a href="hapus.php?nim=<?= $mahasiswa["Nim"] ?>" onclick="return confirm('Yakin Menghapus Data Dengan Nim <?= $mahasiswa["Nim"]; ?> yang bernama <?= $mahasiswa["Nama"]; ?> ?')">
                            <button class="sm btn btn-danger tombol"><i class="fas fa-trash-alt"></i>
                                <span class="d-none d-md-inline d-lg-inline"> Hapus</span>
                            </button>
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