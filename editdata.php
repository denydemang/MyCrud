<?php session_start();
require "function.php";
?>

<?php if (ubahdata($_POST) > 0) : // memanggil function ubahdata
?>
    <?php $_SESSION['info'] = 'Diubah'; ?>
    <script>
        document.location.href = "index.php"
    </script>
<?php elseif (ubahdata($_POST) === 0) : ?>
    <?php $_SESSION['info'] = 'Tidak Ada Yang Diubah'; ?>
    <script>
        document.location.href = "index.php"
    </script>
<?php else : ?>
    <?php $_SESSION['info'] = 'Gagal Diubah'; ?>
    <script>
        document.location.href = "index.php"
    </script>

<?php endif; ?>