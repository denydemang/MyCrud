<?php session_start();
require 'function.php';

$nim = $_GET["nim"];

if (hapusdata($nim) > 0) {
    $_SESSION['info'] = 'Dihapus';
    echo
    '<script>
        document.location.href="index.php";
    </script>';
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo
    '<script>
        document.location.href="index.php";

    </script>';
}
