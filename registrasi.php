<?php session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
?>
<?php
require 'function.php';

if (isset($_POST["submit"])) {
    $username = stripslashes($_POST["username"]);
    $email = stripslashes($_POST["email"]);
    $result = mysqli_query($conn, "SELECT `username` FROM `user` WHERE `username` = '$username' OR `email`= '$email'");
    if (mysqli_fetch_assoc($result)) {
        $error = true;
    } else {
        if (tambahuser($_POST) > 0) {
            echo "<script>
                    alert('AKUN TELAH DIBUAT');
                    document.location.href='Login.php';
                </script>";
        } else {
            echo "<script>
                alert('Akun Gagal Dibuat');
                </script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Form</title>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <script src="jsku/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Kalam:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Fjalla+One&family=Kalam:wght@700&display=swap');

        * {
            box-sizing: border-box;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .error {
            color: white;
            font-weight: bold;
            font-size: 10px;
            margin-top: 2px;
            margin-left: 1px;
            padding: 2px;
        }
    </style>
</head>

<body>
    <div class="container d-lg-flex justify-content-center align-items-center vh-100">
        <div class="container row p-0 shadow-lg" style="width:58%;">
            <div class="col-lg-5 p-0">
                <img src="img/minh-pham-lB9ylP8e9Sg-unsplash.jpg" class="img-fluid" style="height:100%" alt="">
            </div>
            <div class="col-lg-7 p-0" style=" background: linear-gradient(to right, #43cea2, #185a9d);">
                <div class=" container">
                    <h3 class="py-2 mt-1 mb-1 text-white fw-bolder"> Buat Akun</h3>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger p-1 text-danger" role="alert">
                            Username Atau Email Sudah Terdaftar!
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="row mb-3 p-0">
                            <div class="col-lg">
                                <label for="namadepan" class="form-label ms-1 text-white fw-bolder">Nama Depan</label>
                                <input type="text" name="namadepan" id="namadepan" class="form-control rounded-pill">
                            </div>
                            <div class=" col-lg">
                                <label for="namabelakang" class="form-label ms-1 text-white fw-bolder">Nama Belakang</label>
                                <input type="text" name="namabelakang" id="namabelakang" class="form-control rounded-pill">
                            </div>
                        </div>
                        <div class="mb-3 p-0">
                            <label for="email" class="form-label ms-1 text-white fw-bolder">Email</label>
                            <input type="text" name="email" id="email" class="form-control rounded-pill">
                        </div>
                        <div class="mb-3 p-0">
                            <label for="username" class="form-label ms-1 text-white fw-bolder">Username</label>
                            <input type="text" name="username" id="username" class="form-control rounded-pill" oninput="this.value = this.value.toLowerCase()">
                        </div>
                        <div class=" row mb-3 p-0">
                            <div class="col-lg">
                                <label for="pw" class="form-label ms-1 text-white fw-bolder">Password</label>
                                <input type="password" name="pw" id="pw" class="form-control rounded-pill">
                            </div>
                            <div class=" col-lg">
                                <label for="konfirmpw" class="form-label ms-1 text-white fw-bolder">Ulangi Password</label>
                                <input type="password" name="konfirmpw" id="konfirmpw" class="form-control rounded-pill">
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-danger fw-bolder" for="flexCheckDefault">
                                <a href="#" style="font-family:cursive;color:chartreuse">Saya Menyetujui Layanan Kebijakan dan Privasi</a>
                            </label>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary mb-3" value="Registrasi !">
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="jsku/jquery.validate.min.js"></script>
<script src="jsku/additional-methods.min.js"></script>
<script src="jsku/validasiregistrasi.js"></script>


</html>