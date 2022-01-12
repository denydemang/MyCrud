
<?php 
require "function.php";
?>

<?php if (ubahdata($_POST) > 0) : // memanggil function simpan?>
        <script>
        document.location.href="index.php"
        alert("Data Berhasil Diubah")
        </script>
<?php elseif (ubahdata($_POST)=== 0)  :?>
        <script>
        alert("Tidak Ada Data Yang Diubah")
        document.location.href="index.php"
        </script>
<?php else :?>
        <script>
        alert("Data Gagal Diubah Cek Query")
        document.location.href="index.php"
        </script>
       
<?php endif;?>
