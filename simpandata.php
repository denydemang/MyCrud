<?php session_start();
require 'function.php';
?>
<?php if (simpan($_POST) > 0) : // memanggil function simpan
?>
        <?php $_SESSION['info'] = 'Disimpan'; ?>
        <script>
                document.location.href = "index.php"
        </script>
<?php else : ?>
        <?php $_SESSION['info'] = 'Gagal Disimpan'; ?>
        <script>
                document.location.href = "index.php"
        </script>

<?php endif; ?>