<?php
session_start();
if (isset($_SESSION["login"])) {
    header('Location: index.php');
    exit;
};
require 'function.php';
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT `username` FROM `user` WHERE `id` = $id");
    $row = mysqli_fetch_assoc($result);
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION["login"] = true;
    }
};
$user = "";

if (isset($_POST["login"])) {
    $username = $_POST["usernameatauemail"];
    $password = $_POST["pw"];
    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' OR `email`= '$username'");
    if (mysqli_num_rows($result) === 1) {

        // cek apakah password sesuai
        $data = mysqli_fetch_assoc($result);
        if (password_verify($password, $data["password"])) {
            //buat session login
            $_SESSION["login"] = true;

            //cek remember me diceklist tidak
            if (isset($_POST["rememberme"])) {
                //jika diceklist buat cookie id dan key dengan value berdasarkan username didatabase
                setcookie('id', $data["id"], time() + 60 * 15);
                setcookie('key', hash('sha256', $data["username"]), time() + 60 * 15);
            }
            header("Location:index.php");
            exit;
        };
        $error2 = true;
        $user = $username;
    } else {
        $error = true;
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <script src="jsku/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lobster');

        body {
            background-color: #8e2de2;
            background: linear-gradient(to right, #D8B5FF, #1EAE98);

        }

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        .frm {
            background: linear-gradient(to right, #43cea2, #185a9d);
        }

        .fw-bold {
            font-family: 'Lobster', cursive;
            color: #66f297;
            text-shadow: 2px 2px #1542db;
        }

        .runded {
            border: 1px solid rgba(14, 30, 37, 0.12);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 5px 5px 3px 3px rgba(20, 30, 100, 0.5)
        }

        .username input {
            border: none;
            outline: none;
            box-shadow: none
        }

        .username {
            border: 2px solid #d8d8d8;
            border-radius: 8px;

        }

        .username:focus-within {
            box-shadow: 5px 5px 3px 3px rgba(20, 30, 100, 0.5);
        }

        /* .username input:focus >.username {
            border: 2px solid #d8d8d8;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px,
                rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        } */

        .username input:focus,
        textarea:focus,
        select:focus {
            outline: collapse;
            border: none;
            box-shadow: none
        }
    </style>
</head>


<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row shadow-lg runded" style="width:55%">
            <div class="col-lg-4 col-md-4 d-none d-md-none d-sm-none d-lg-inline col-sm-4 p-0">
                <img src="img/philipp-pilz-QZ2EQuPpQJs-unsplash.jpg" style="width:100%;height:100%" class="" alt="">
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 p-0 frm">
                <form action="" method="post">
                    <div class="container">
                        <h1 class="fw-bold text-center text-nowrap p-lg-2 m-lg-1 mb-lg-1">Demang Corp</h1>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger p-2 text-danger" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i> Username/Email Tidak Terdaftar!
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error2)) : ?>
                            <div class="alert alert-danger p-2 text-danger" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i> Password Yang Anda Masukkan Salah!
                            </div>
                        <?php endif; ?>
                        <label for="username" class="form-label text-white fw-bolder">Username / Email</label>
                        <div class="d-flex align-items-center input-field mb-2 username">
                            <span class="far fa-user p-2 ms-1"></span> <input type="text" id="usernameatauemail" name="usernameatauemail" placeholder="Masukkan Username/Email Anda" class="form-control input" value="<?= $user; ?>">
                        </div>
                        <label for="password" class="form-label text-white fw-bolder">Password</label>
                        <div class="d-flex align-items-center input-field mb-2 username">
                            <span class="fas fa-key p-2 ms-1"></span><input type="password" name="pw" class="form-control" placeholder="Masukkan Password Anda">
                        </div>
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" value="" name="rememberme" id="flexCheckDefault">
                            <label class="form-check-label text-white fw-bolder" for="flexCheckDefault">
                                Remember Me
                            </label>
                        </div>
                        <input type="submit" name="login" class="btn btn-info my-2 fw-bolder text-white" value="SIGN IN" style="width:100%">
                        <p class="text-white fw-bolder mb-5">Belum Punya Akun? <a href="registrasi.php" style="color:#66f297">Registrasi</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>

</script>

</html>