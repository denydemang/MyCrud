
<?php 
require 'function.php';
?>
<?php if (simpan($_POST) > 0) : // memanggil function simpan?>
        <script>
        alert("Data Berhasil Disimpan")
        document.location.href="index.php"
        </script>
<?php else: ?>
        <script>
        alert("Data Gagal Tersimpan")
        document.location.href="index.php"
        </script>
       
<?php endif;?>



