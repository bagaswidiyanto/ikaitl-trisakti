<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: index.php');
}
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username  = $_POST['Username'];
    $password  = $_POST['Password'];
    // $p         = hash('sha1', $password);

    if ($username == "" || $password == "") {
        $error = true;
    } else {
        $data   = mysqli_query($konek, "SELECT * FROM admin WHERE Username ='" . $username . "' AND Password = '" . $password . "'");
        $dt     = mysqli_num_rows($data);
        $dta    = mysqli_fetch_assoc($data);

        if ($dt > 0) {
            // session_start();
            $_SESSION['login']    = true;
            $_SESSION['Username'] = $dta['Username'];
            $_SESSION['id']       = $dta['ID_User'];

            // cek jika user index sebagai Petugas
            if ($dta['Level'] == "Admin") {
                // buat session index dan Username
                $_SESSION['login']          =    true;
                $_SESSION['ID_User']        =    $dta['ID_User'];
                $_SESSION['Username']       =    $dta['Username'];
                $_SESSION['Level']          =    "Admin";
                $_SESSION['Password']       =    $dta['Password'];

                header("location:index.php");

                // cek jika user index sebagai Anggota
            }
            // else if ($dta['Level'] == "Anggota") {


            //     // buat session index dan Username
            //     $_SESSION['login']          =     true;
            //     $_SESSION['ID_User']        =    $dta['ID_User'];
            //     $_SESSION['Username']       =    $dta['Username'];
            //     $_SESSION['Level']          =    "Anggota";
            //     $_SESSION['Password']       =    $dta['Password'];
            //     $_SESSION['Nama_Lengkap']   =    $dta['Nama_Lengkap'];
            //     $_SESSION['Email']          =    $dta['Email'];


            //     header("location:index_anggota.php");
            // } else {
            //     header("location:login.php");
            //     exit; //selesai
            // }
        } else {
            $error = true;
        }
    }
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | IKAITL Trisakti</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/logo.png" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('img/Untitled-12.jpg');">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="index.html"><img src="img/logo.png" style="width: 200px; height: 200px; margin-left: -70px" alt=""></a>
                        </div>
                        <h3>Selamat Datang Admin</h3>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Username" placeholder="Username" required="">
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="Password" placeholder="Password" required="">
                                <i class="ik ik-lock"></i>
                            </div>
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong class="text-red">Username / Password salah</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ik ik-x"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="sign-btn text-center">
                                <button name="login" class="btn btn-theme">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="plugins/screenfull/dist/screenfull.js"></script>
    <script src="dist/js/theme.js"></script>
</body>

</html>