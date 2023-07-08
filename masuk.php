<?php
// Start Sesi
session_start();

// Konek database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek      = mysqli_connect($servername, $username, $password, $database);
$err        = "";

// Cek tombol sudah ditekan
if (isset($_POST['masuk'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Cek form login
    if ($user == '' or $pass == '') {
        $err .= "Masukkan email dan password !";
    } else {
        // Ambil data dari tabel
        $ambil = mysqli_query($konek, "SELECT * FROM akun WHERE Username = '$user'");

        // Cek ketersediaan data
        if (mysqli_num_rows($ambil) === 1) {
            $data = mysqli_fetch_assoc($ambil);

            // Cek password
            if (md5($pass) == $data['Password']) {
                $_SESSION['masuk'] = true;

                // Pindah halaman
                header("location:beranda.php");
                exit();
            } else {
                $err .= "Password salah !";
            }
        } else {
            $err .= "Username <b>$user</b> belum terdaftar !";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Petani Digital</title>
    <link href="assets/farmer.png" rel="icon" type="image/png" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
</head>
<body class="text-center d-flex align-items-center" style="background-color: #f5f5f5;padding-bottom: 40px;padding-top:40px; height:100%;">
    <main class="form-signin" style="width: 100%; max-width: 330px; padding: 15px;   margin: auto;">
        <form action="" method="post">
            <img class="mb-4" src="assets/farmer.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Petani Digital</h1>

            <div class="form-floating" style="z-index: 2;">
                <input type="text" class="form-control rounded" name="user" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control rounded" name="pass" id="floatingPassword" placeholder="Password" style="margin-bottom: 10px;">
                <label for="floatingPassword">Password</label>
            </div>

            <?php if ($err) { ?>
                <div id="login-alert" class="alert alert-danger col-sm-12">
                    <?php echo $err ?>
                </div>
            <?php  } ?>

            <button class="w-100 btn btn-lg btn-primary" name="masuk" type="submit"
            style="background-color: rgba(76,132,222,1); border: 0;">Masuk</button>
        </form>
    </main>
</body>
</html>